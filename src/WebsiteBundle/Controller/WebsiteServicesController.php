<?php

namespace WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * Services controller.
 *
 * @Route("/service")
 */
class WebsiteServicesController extends Controller {

    /**
     * Busca Parceiros por Cidade e Atividade.
     *
     * @Route("/partner/find", name="partner_find")
     * @Method("GET")
     */
    public function parnerFindAction(Request $request) {
        $em = $this->getDoctrine()->getManager();   
        
        $query = $em->createQueryBuilder()
                    ->addSelect('partner.id id')
                    ->addSelect('partner.slug')
                    ->addSelect('partner.status status')
                    ->addSelect('pessoa.nome nome')
                    ->addSelect('endereco.logradouro enderecoCompleto')
                    ->addSelect('municipio.nome cidade')
                    ->addSelect('unif.sigla uf')
                ->from("WebsiteBundle:Partner", 'partner')
                    ->join('partner.servicos', 'servicos')
                    ->join('partner.pessoa', 'pessoa')
                    ->join('pessoa.enderecos', 'endereco')
                    ->join('endereco.municipio', 'municipio')
                    ->join('municipio.uf', 'unif');
        
        if( $request->get('uf') ){
            $query->andWhere('unif.sigla = :uf')
                    ->setParameter('uf', $request->get('uf'));
        }
        if( $request->get('cidade') ){
            $query->andWhere('municipio.nome = :cidade')
                    ->setParameter('cidade', $request->get('cidade'));
        }
        if( $request->get('servico') ){
            $query->andWhere('servicos.id = :servico')
                ->setParameter('servico', $request->get('servico'));
        }
        
        $query->andWhere('partner.ativo = 1');
        
        $test = $query->getQuery();
        $result = $query->getQuery()->getResult();
        
        $response = new JsonResponse();
        return $response->setData($result)->setStatusCode(Response::HTTP_ACCEPTED);
    }
    
    /**
     * Busca por uma Atividade do Professional Services Wtis PSW.
     *
     * @Route("/psw/atividades/{id}", name="psw_atividade")
     * @Method("GET")
     */
    public function atividadeAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();   
        
        $query = $em->createQueryBuilder()
                    ->addSelect('a.id')
                    ->addSelect('a.codigo')
                    ->addSelect('a.atividade')
                    ->addSelect('a.descricao')
                    ->addSelect('a.descricaoHtml')
                ->from("WebsiteBundle:ProfessionalServiceAtividade", 'a')
                ->andWhere('a.id = :id')
                ->setParameter('id', $id);
        
        $result = $query->getQuery()->getResult();
        
        if(count($result)>0){
            if( $request->get('field') ){
                $field = htmlspecialchars(addslashes(stripslashes($request->get('field'))));
                return new Response($result[0][$field]);
            }
        }
        
        $response = new JsonResponse();
        return $response->setData($result)->setStatusCode(Response::HTTP_ACCEPTED);
    }
    
    /**
     * Lista o whois da empresa.
     *
     * @Route("/empresa/whois", name="empresa_whois")
     * @Method("GET")
     */
    public function whoisAction() {
        $em = $this->getDoctrine()->getManager();   

        /* Exemplo. Implementar com integração ao ERP */
        $result = array(
            'nClientes' => 5379,
            'nClientesMes' => 129,
            'nSites' => 189,
            'nHospedagem' => 234,
            'nRedesSociais' => 12,
            'nServidores' => 37,
            'nEmkt' => 3023089,
            'nSms' => 3247
        );
        
        $response = new JsonResponse();
        return $response->setData($result)->setStatusCode(Response::HTTP_ACCEPTED);
    }

    private function get_file_contents($url) {

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

    /**
     * @return Response
     *
     * @Route("/mautictest", name="mautic_test")
     * @Method("GET")
     */
//    public function testMauticAction(){
//        $mapi = $this->get('app.marketing_api');
//        #dump($mapi->enviaEmail(4,1));
//        $result = $mapi->listaCampanhas();
//        return new Response(json_encode($result));
//    }

}
