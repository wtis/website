<?php

namespace WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WebsiteBundle\Entity\Contato;
use WebsiteBundle\Entity\MeLigue;
use WebsiteBundle\Form\ContatoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Contato controller.
 *
 * @Route("/service/contato")
 */
class ContatoController extends Controller
{

    /**
     * Creates a new Contato entity.
     *
     * @Route("/", name="contato_create")
     * @Method("GET")
     */
    public function createAction(Request $request)
    {
        sleep(2);
        $meLigue = $request->get('meLigue');
        if (intval($meLigue) > 0) {
            $entity = new MeLigue();
            $entity->setStatus2(0); //Wait for operator
        } else {
            $entity = new Contato();
        }
        $response = new JsonResponse();
        $em = $this->getDoctrine()->getManager();

        $validator = $this->get('validator');

        //Obrigatory childs
        $entity->setData(new \DateTime('now'));
        $entity->setNome($request->get('nome'));
        $entity->setEmail($request->get('email'));

        if ($request->get('telefone-ddd')) {
            $entity->setTelefone('(' . $request->get('telefone-ddd') . ') ' . $request->get('telefone'));
        } else {
            $entity->setTelefone($request->get('telefone'));
        }

        if ($request->get('celular-ddd')) {
            $entity->setCelular('(' . $request->get('celular-ddd') . ') ' . $request->get('celular'));
        } else {
            $entity->setCelular($request->get('celular'));
        }

        //Aditional childs
        $entity->setNewsletter((bool)intval($request->get('newsletter')));
        $entity->setMensagem($request->get('mensagem'));

        $entity->setIp($request->getClientIp());
        $url = 'http://ipinfo.io/' . $request->getClientIp() . '/json';
        $clientLocale = $this->get_file_contents($url);
        $entity->setLocalidade($clientLocale);
        $entity->setDadosNavegador(serialize($_SERVER));

        $extras = $request->get('extras');
        #$extraNome = $request->get('extra_nome');
        #$extraSigla = $request->get('extra_sigla');
        #$extraTexto = $request->get('extra_texto');
        #$extraValor = $request->get('extra_valor');
        if (isset($extras)) {
            foreach ($extras as $key => $v) {
                $extra = new \WebsiteBundle\Entity\ContatoExtra();
                $extra->setNome($v['extra_nome']);
                $extra->setSigla($v['extra_sigla']);
                $extra->setTexto($v['extra_texto']);
                $extra->setValor((bool)$v['extra_valor']);
                $extra->setContato($entity);
                $entity->addExtras($extra);
            }
        }

        //Status
        $status = $em->getRepository("WebsiteBundle:ContatoTipoStatus")->findByUrn('aberto');
        $entity->setStatus($status[0]);

        /* $form = $this->createForm(new ContatoType(), $entity, array(
          'action' => $this->generateUrl('contato_create'),
          'method' => 'GET',
          ));
          $form->add('submit', 'submit', array('label' => 'Create'));
          $formName = $form->getName();
          $getName = $request->request->get($formName);
          $form->submit($getName); */

        $errors = $validator->validate($entity);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging
             */
            $error = array();
            foreach ($errors as $erro) {
                $error[] = ($erro->getMessage());
            }
            #$errorsString = (string) $errors;

            $response->setData($error);
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        }

        $em->persist($entity);
        $em->flush();

        $produtoInteresse = $entity->getExtras()->filter(function ($entry) {
            return in_array($entry->getSigla(), array('produto-interesse'));
        })->first();

        if(method_exists($produtoInteresse, 'getTexto')){
            $produtoInteresse = $produtoInteresse->getTexto();
        } else{
            $produtoInteresse = '';
        }

        if (count($entity->getExtras()) > 0) {
            $adicionais = '';
            foreach ($entity->getExtras() as $e) {
                $adicionais .= $e->getNome() . ": " . $e->getTexto() . "\n";
            }
        }

        //Slack
        $this->slack($entity, $adicionais);
        //Mautic
        $this->mautic($entity, $produtoInteresse);

        //Envia e-mail
        #$obj = print_r($entity, true);
        /*
         * Devido ao Slack, desativei o email
         *
        $content = '';
        if (intval($meLigue) <= 0) {
            $content .= "SOLICITOU UMA LIGAÇÃO\r\n";
        }
        $content .= "Nome: " . $entity->getNome();
        $content .= "\r\n";
        $content .= "E-mail: " . $entity->getEmail();
        $content .= "\r\n";
        $content .= "Telefone: " . $entity->getTelefone();
        $content .= "\r\n";
        $content .= "Celular: " . $entity->getCelular();
        $content .= "\r\n";
        $content .= "\r\n";
        $content .= $entity->getMensagem();
        $content .= "\r\n";
        $content .= "\r\n";
        $content .= "Adicionais:\r\n\r\n" . $adicionais;
        $content .= "\r\n";
        $content .= "\r\n";
        $content .= "Assinar newsletter: " . $entity->getNewsletter();
        $content .= "\r\n";
        $content .= $entity->getIp();
        $content .= "\r\n";
        $content .= "ID: " . $entity->getId();
        $send = $this->sendmail('contato@wtis.com.br', 'Contato via site', $entity->getEmail(), $content);*/

        $response->setData(array("status" => "0", "id" => $entity->getId()));
        $response->setStatusCode(Response::HTTP_CREATED);
        return $response;
    }

    /**
     * @param $entity
     * @param $adicionais
     */
    public function slack($entity, $adicionais)
    {
        $slackTextTemplate = <<<EOF
E-mail: *{email}* \n
Telefone: *{telefone}* \n
Celular: *{celular}* \n\n
=================================== \n
Mensagem: \n\n
{mensagem} \n
=================================== \n
Adicionais: \n\n
{adicionais} \n\n
{geoip}
EOF;

        function _slackfilter($v)
        {
            return trim($v);
        }

        ;

        $slackTextReplace = array(
            "{email}" => _slackfilter($entity->getEmail()),
            "{telefone}" => _slackfilter($entity->getTelefone()),
            "{celular}" => _slackfilter($entity->getCelular()),
            "{mensagem}" => _slackfilter($entity->getMensagem()),
            "{adicionais}" => _slackfilter($adicionais),
            "{geoip}" => _slackfilter($entity->getIp())
        );

        $slackText = strtr($slackTextTemplate, $slackTextReplace);

        $slackMsg = array(
            "username" => "robovendas",
            "attachments" => [
                [
                    'pretext' => "*UM NOVO CONTATO SOLICITOU UMA LIGAÇÃO*",
                    "title" => $entity->getNome(),
                    'text' => $slackText,
                    "thumb_url" => "https://www.wtis.com.br/images/slack/1.png",
                    "mrkdwn_in" => [
                        "text",
                        "pretext"
                    ]
                ]
            ]
        );


        $slack = $this->get('app.slack_api');
        $send = $slack->enviaMensagem(json_encode($slackMsg), 'financeiro', false);
    }

    /**
     * @param $entity
     * @param $produtoInteresse
     */
    public function mautic($entity, $produtoInteresse)
    {

        $data = array(
            'firstname' => $entity->getNome(),
            'email' => $entity->getEmail(),
            'ipAddress' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
        );
        if (strlen($entity->getTelefone()) > 8) {
            $data['phone'] = $entity->getTelefone();
        }
        if (strlen($entity->getCelular()) > 8) {
            $data['mobile'] = $entity->getCelular();
        }

        $mapi = $this->get('app.marketing_api');

        //Verifica se o contato já existe
        $lista = $mapi->listaContatos($entity->getEmail());
        $acao = 'novo';
        if( count(@$lista['contacts'])>0){
            //Existe
            $contato = array();
            $contato['contact'] = array_shift($lista['contacts']); //retira o primeiro elemento do array. Como estamos buscando diretamente pelo e-mail, a probabilidade de dois contatos é bem baixa.
            $acao = 'update';
        } else{
            //Não existe
            $contato = $mapi->criaContato($data);
        }

        if (isset($contato['contact'])) {
            $contactid = $contato['contact']['id'];

            if($acao=='novo'){
                //Envia e-mail de auto-resposta do contato qualificado
                $mapi->enviaEmail(11, $contactid);
            } else{
                $mapi->enviaEmail(12, $contactid);
            }

            $contactProdutosInteresse = isset($contato['contact']['produtos_de_interesse']) ? $contato['contact']['produtos_de_interesse'] : '';
            $contactProdutosInteresseNew = $produtoInteresse . ',';
            $contactProdutosInteresse = str_replace($contactProdutosInteresseNew, '', $contactProdutosInteresse);
            $contactProdutosInteresse .= $contactProdutosInteresseNew;
            $contato = $mapi->atualizaContato($contactid, $data = array_merge($data, array(
                'produtos_de_interesse' => $contactProdutosInteresse,
                'ipAddress' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
            )), false);

            //Adiciona o contato ao segmento padrão
            $mapi->adicionaContatoSeguimento(7, $contactid);
        }

    }

    /**
     * Creates a form to create a Contato entity.
     *
     * @param Contato $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Contato $entity)
    {
        $form = $this->createForm(new ContatoType(), $entity, array(
            'action' => $this->generateUrl('contato_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Check MeLigue status.
     *
     * @Route("/meligue/status/{id}", name="contato_meligue_status")
     * @Method("GET")
     */
    public function meLigueStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //sleep(20);        
        $entity = $em->getRepository("WebsiteBundle:MeLigue")->find($id);
        $response = new JsonResponse();
        return $response->setData(array("status" => $entity->getStatus2(), "id" => $entity->getId()))->setStatusCode(Response::HTTP_ACCEPTED);
    }

    private function get_file_contents($url)
    {

        if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $url);
            $contents = curl_exec($curl);
            curl_close($curl);
            if ($contents)
                return $contents;
            else
                return false;
        } else {
            return file_get_contents($url);
        }
    }

    private function sendmail($to, $subject, $from, $content)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setReplyTo($from)
            ->setTo($to)
            ->setBody($content, 'text/plain');
        $this->get('mailer')->send($message);
    }

}
