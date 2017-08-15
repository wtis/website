<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="home")
     * @Template("WebsiteBundle:Home:index.html.twig")
     */
    public function homeAction() {
        return array();
    }
    
    /**
     * @Route("/consultoria", name="consultoria")
     * @Route("/consultoria/")
     * @Template("WebsiteBundle:Servicos:consultoria.html.twig")
     */
    public function consultoriaAction() {
        return array();
    }
    
    /**
     * @Route("/google-adwords", name="google-adwords")
     * @Route("/google-adwords")
     * @Template("WebsiteBundle:Servicos:adwords.html.twig")
     */
    public function adwordsAction() {
        return array();
    }
    
    /**
     * @Route("/cloud-storage", name="cloud-storage")
     * @Route("/cloud-storage")
     * @Template("WebsiteBundle:Servicos:cloudstorage.html.twig")
     */
    public function cloudStorageAction() {
        return array();
    }
    
    /**
     * @Route("/governo", name="governo")
     * @Route("/governo/")
     * @Template("WebsiteBundle:Servicos:governo.html.twig")
     */
    public function governoAction() {
        return array();
    }

    /**
     * @Route("/governo/servicos.html", name="governo_PR")
     * @Template("WebsiteBundle:Servicos:governo.html.twig")
     */
    public function governoRedirectAction() {
        return $this->redirectToRoute("governo", array(), 301);
    }
    
    /**
     * @Route("/governo/ecidade.html", name="ecidade")
     * @Template("WebsiteBundle:Servicos:ecidade.html.twig")
     */
    public function ecidadeAction() {
        return array();
    }
    
    /**
     * @Route("/email-marketing", name="email-marketing")
     * @Route("/email-marketing/")
     * @Template("WebsiteBundle:Servicos:email-marketing.html.twig")
     */
    public function emailMarketingAction() {
        return array();
    }
    
    /**
     * @Route("/sms-marketing", name="sms-marketing")
     * @Route("/sms-marketing/")
     * @Template("WebsiteBundle:Servicos:sms-marketing.html.twig")
     */
    public function smsMarketingAction() {
        return array();
    }
    
    /**
     * @Route("/email-profissional", name="email-profissional")
     * @Route("/email-profissional/")
     * @Route("/email-colaborarivo")
     * @Route("/email-colaborarivo/")
     * @Template("WebsiteBundle:Servicos:emailpro.html.twig")
     */
    public function emailProfissionalAction() {
        return array();
    }
    
    /**
     * @Route("/fabrica-de-software", name="fabrica-software")
     * @Route("/fabrica-de-software/")
     * @Template("WebsiteBundle:Servicos:fabrica.html.twig")
     */
    public function fabricaSoftwareAction() {
        $contatoForm = array();
        $contatoForm['modalidade'] = array(
            "Aplicação Web", "Mobile", "Desktop", "Não sei dizer"
        );
        $contatoForm['plataforma'] = array(
            "Aplicação Web" => array('PHP', 'Python', 'Ruby', 'Java', 'Asp.NET', 'Outra'),
            "Mobile" => array("iOS", "Android", "Windows Phone")
        );
        return array(
            'contatoForm'=>$contatoForm
                );
    }
    
    /**
     * @Route("/pagina-no-facebook", name="facebook")
     * @Route("/pagina-no-facebook/")
     * @Template("WebsiteBundle:Servicos:facebook.html.twig")
     */
    public function facebookAction() {
        return array();
    }

    /**
     * @Route("/facebook/")
     * @Route("/facebook")
     */
    public function facebookRAAction() {
        return $this->redirectToRoute('facebook');
    }
    
    /**
     * @Route("/gerenciamento-redes-sociais", name="gerenciamento-redes-sociais")
     * @Route("/gerenciamento-redes-sociais/")
     * @Template("WebsiteBundle:Servicos:gerenciamento-redes-sociais.html.twig")
     */
    public function gerenciamentoRedesSociaisAction() {
        return array();
    }
    
    /**
     * @Route("/gerenciamento-servidores", name="gerenciamento-servidor")
     * @Route("/gerenciamento-servidores/")
     * @Route("/gerenciamento-servidor")
     * @Route("/gerenciamento-servidor/")
     * @Template("WebsiteBundle:Servicos:gerenciamento-servidor.html.twig")
     */
    public function gerenciamentoServidorAction() {
        #$produtos = $em->getRepository('WebsiteBundle:ProdutoServico')->findBy(array("codigo"=>"2-GES-%"), array('id'=>'ASC'));
        $repository = $this->getDoctrine()->getRepository('WebsiteBundle:ProdutoServico');

        $query = $repository->createQueryBuilder('p')
        ->where('p.codigo LIKE :codigo')
        ->andWhere('p.ativo = 1')
        ->setParameter('codigo', '2-GES-%')
        ->orderBy('p.id', 'ASC')
        ->getQuery();

        $produtos = $query->getResult();
        return array(
            "produtos" => $produtos
        );
    }
    
    /**
     * @Route("/presenca-na-web", name="presenca-web")
     * @Route("/presenca-na-web/")
     * @Template("WebsiteBundle:Servicos:presenca-web.html.twig")
     */
    public function presencaWebAction() {
        $em = $this->getDoctrine()->getManager();
        //$servicos = $em->getRepository('WebsiteBundle:ProfessionalServiceAtividade')->findBy(array("principal"=>true), array('atividade'=>'ASC'));
        $depoimentos = array(
            array("nome"=>"Auiri Tiago - Frigo. Maisa","texto"=>"Tínhamos um site do Frigorífico  Maísa porém nunca conseguimos dar andamento em sua manutenção. Contratamos a Wtis para fazer todo o trabalho da Presença Digital e estão de parabéns, resolveram nossos problemas."),
            array("nome"=>"Ellen - PP Mulher","texto"=>"A Wtis fez um ótimo trabalho com o novo portal do PP Mulher. O serviço de gerenciamento da página no Facebook é perteiro, todo dia acompanho novas publicações e interações de usuários."),
            array("nome"=>"Juliano - Montenet","texto"=>"Profissionais altamente qualificados. Somente reclamo do número 0800 da empresa não poder atender ligações de celular, mas recomendo perfeitamente esta emrpesa.")
        );
        return array(
            "depoimentos" => $depoimentos
        );
    }
    
    /**
     * @Route("/pos-venda", name="pos-venda")
     * @Route("/pos-venda/")
     * @Template("WebsiteBundle:Servicos:pos-venda.html.twig")
     */
    public function posVendaAction() {
        return array();
    }
    
    /**
     * @Route("/professional-services", name="psw")
     * @Route("/professional-services/")
     * @Template("WebsiteBundle:Servicos:professional-services.html.twig")
     */
    public function professionalServicesAction() {
        $em = $this->getDoctrine()->getManager();
        $servicos = $em->getRepository('WebsiteBundle:ProfessionalServiceAtividade')->findBy(array("principal"=>true), array('atividade'=>'ASC'));
        $depoimentos = array(
            array("nome"=>"Juliano Freire. Connections","texto"=>"Brilhante ideia! Eu precisava de uma pessoa para fazer a atualização do meu site, cheguei a contratar três e não deu certo. Com o profissional da WTIS meus problemas acabaram."),
            array("nome"=>"Yuri Castro. Íntegra","texto"=>"Precisei de um analista de redes para projetar minha rede interna, contratei o profissional da WTIS por 60 dias, ele projetou minha rede e configurou os servidores e também treinou meu pessoal para mantê-la. Obrigado."),
            array("nome"=>"Ellen. FMC","texto"=>"Contratei dois técnicos em informática para suporte e manutenção dos computadores da minha empresa, a agilidade e eficiência é impressionante. Estão de parabéns!")
        );
        return array(
            "servicos" => $servicos,
            "depoimentos" => $depoimentos
        );
    }
    
    /**
     * @Route("/central-do-design", name="central-design")
     * @Route("/central-do-design/")
     * @Template("WebsiteBundle:Servicos:central-design.html.twig")
     */
    public function centralDesignAction() {
        return array();
    }
    
    /**
     * @Route("/criacao-de-sites", name="desenvolvimento-sites")
     * @Route("/criacao-de-sites/")
     * @Route("/desenvolvimento-de-sites/")
     * @Route("/desenvolvimento-de-sites")
     * @Template("WebsiteBundle:Promocao:site.html.twig") #"WebsiteBundle:Servicos:desenvolvimento-sites.html.twig"
     */
    public function desenvolvimentoSitesAction() {
        return array();
    }
    /**
     * @Route("/sites/")
     * @Route("/sites")
     * @Route("/site/")
     * @Route("/site")
     */
    public function desenvolvimentoSitesRAAction() {
        return $this->redirectToRoute('desenvolvimento-sites');
    }
    
    /**
     * @Route("/optimizacao-seo", name="optimizacao-seo")
     * @Route("/optimizacao-seo/")
     * @Template("WebsiteBundle:Servicos:optimizacao-seo.html.twig")
     */
    public function optimizacaoSeoAction() {
        return array();
    }
    
    /**
     * @Route("/streaming", name="streaming")
     * @Route("/streaming/")
     * @Template("WebsiteBundle:Servicos:streaming.html.twig")
     */
    /*public function streamingAction() {
        return array();
    }*/
    
    /**
     * @Route("/suporte", name="suporte")
     * @Route("/suporte/")
     * @Route("/contato/")
     * @Route("/contato")
     * @Template("WebsiteBundle:Suporte:index.html.twig")
     */
    public function suporteAction() {
        return array();
    }
    
    /**
     * @Route("/contato", name="contato")
     * @Route("/contato/")
     * @Template("WebsiteBundle:Contato:index.html")
     */
    public function contatoAction() {
        return array();
    }
    
    /* Produtos */
    
    /**
     * @Route("/hospedagem", name="hospedagem")
     * @Route("/hospedagem/")
     * @Template("WebsiteBundle:Produtos:hospedagem.linux.html")
     */
    public function hospedagemAction() {
        return array();
    }

    /**
     * @Route("/hospedagem-inteligente", name="hospedagem_inteligente")
     * @Route("/hospedagem-inteligente/")
     * @Template("WebsiteBundle:Produtos:hospedagem.inteligente.twig")
     */
    public function hospedagemInteligenteAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/windows", name="hospedagem_windows")
     * @Route("/hospedagem/windows/")
     * @Template("WebsiteBundle:Produtos:hospedagem.windows.html")
     */
    public function hospedagemWindowsAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/recursos", name="hospedagem_recursos")
     * @Route("/hospedagem/recursos/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.html")
     */
    public function hospedagemRecursosAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/php", name="hospedagem_php")
     * @Route("/hospedagem/php/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.php.html")
     */
    public function hospedagemPHPAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/asp", name="hospedagem_asp")
     * @Route("/hospedagem/asp/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.asp.html")
     */
    public function hospedagemASPAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/instaladores", name="hospedagem_instaladores")
     * @Route("/hospedagem/instaladores/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.instaladores.html")
     */
    public function hospedagemInstaladoresAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/email", name="hospedagem_email")
     * @Route("/hospedagem/email/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.email.html")
     */
    public function hospedagemEmailAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/criador", name="hospedagem_criador")
     * @Route("/hospedagem/criador/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.criador.html")
     */
    public function hospedagemCriadorAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/painel", name="hospedagem_painel")
     * @Route("/hospedagem/painel/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.painel.html")
     */
    public function hospedagemPainelAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/backup", name="hospedagem_backup")
     * @Route("/hospedagem/backup/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.backup.html")
     */
    public function hospedagemBackupAction() {
        return array();
    }
    
    /**
     * @Route("/certificadossl", name="certificadossl")
     * @Route("/certificadossl/")
     * @Template("WebsiteBundle:Produtos:certificadossl.html")
     */
    public function certificadoSSLAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/email-marketing", name="hospedagem_marketing_email")
     * @Route("/hospedagem/email-marketing/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.emailmkt.html")
     */
    public function hospedagemMarketingEmailAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/sms", name="hospedagem_marketing_sms")
     * @Route("/hospedagem/sms/")
     * @Template("WebsiteBundle:Produtos:hospedagem.recursos.sms.html")
     */
    public function hospedagemMarketingSMSAction() {
        return array();
    }
    
    /**
     * @Route("/hospedagem/revenda", name="revenda_hospedagem")
     * @Route("/hospedagem/revenda/")
     * @Template("WebsiteBundle:Produtos:hospedagem.revenda.html")
     */
    public function revendaHospedagemAction() {
        return array();
    }
    
    /**
     * @Route("/servidores-dedicados", name="dedicado")
     * @Route("/servidores-dedicados/")
     * * @Route("/dedicado")
     * * @Route("/dedicados/")
     * @Template("WebsiteBundle:Produtos:dedicado.escolha.html")
     */
    public function servidoresDedicadosAction() {
        return array();
    }
    
    /**
     * Route("/servidores-dedicados-classicos", name="dedicado_classico")
     * Route("/servidores-dedicados-classicos/")
     * Template("WebsiteBundle:Produtos:dedicado.classico.html")
     */
    public function servidoresDedicadosClassicosAction() {
        
        $planos = array(
            array(
                'id' => 1,
                'servidor' => 'Intel® Core2™',
                'cpu' => 'Duo/Quad - E7500 / Q6600',
                'ram' => '4GB',
                'storage' => '1 × 320GB SATA2 3Gbps',
                'trafego' => '12TB',
                'preco' => '79'
            ),
            array(
                'id' => 2,
                'servidor' => 'Intel® Core™ i3/i5',
                'cpu' => 'i3-540 / I5-760',
                'ram' => '4GB',
                'storage' => '1 × 320GB SATA2 3Gbps',
                'trafego' => '12TB',
                'preco' => '99'
            ),
            array(
                'id' => 3,
                'servidor' => 'Intel® Core™ i3-2100 2nd Gen',
                'cpu' => 'i3-2120 3.3GHz',
                'ram' => '4GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '12TB',
                'preco' => '129'
            ),
            array(
                'id' => 4,
                'servidor' => 'Intel® Xeon® E3-1200 V2',
                'cpu' => 'E3-1230V2 3.3GHz',
                'ram' => '8GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '149'
            ),
            array(
                'id' => 5,
                'servidor' => 'Intel® Xeon® E5-2600',
                'cpu' => 'E5-2609 2.4GHz',
                'ram' => '8GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '249'
            ),
            array(
                'id' => 6,
                'servidor' => 'Dual Intel® Xeon® E5500 or E5600',
                'cpu' => '2 x E55xx or E56xx',
                'ram' => '8GB',
                'storage' => '1 × 500GB SATA2 3Gbps',
                'trafego' => '30TB',
                'preco' => '269'
            ),
            array(
                'id' => 7,
                'servidor' => 'Dual Intel® Xeon® E5-2600',
                'cpu' => '2 x E5-2609 2.4GHz',
                'ram' => '16GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '369'
            ),
            array(
                'id' => 8,
                'servidor' => 'Dual Intel® Xeon® E5-2600',
                'cpu' => '2 x E5-2620 2.0GHz',
                'ram' => '16GB',
                'storage' => '3 × 300GB SAS2 6Gbps',
                'trafego' => '30TB',
                'preco' => '559'
            )
        );
        
        return array(
            "planos"=>$planos
            );
    }
    
    /**
     * Route("/server-virtualization", name="dedicado_virtualization")
     * Route("/server-virtualization/")
     * Template("WebsiteBundle:Produtos:dedicado.virtualization.html")
     */
    public function servidoresDedicadosVirtualizationAction() {
        return array();
    }
    
    /**
     * Route("/servidores-dedicados-windows", name="dedicado_windows")
     * Route("/servidores-dedicados-windows/")
     * Template("WebsiteBundle:Produtos:dedicado.windows.html")
     */
    public function servidoresDedicadosWindowsAction() {
        $planos = array(
            array(
                'id' => 1,
                'servidor' => 'Intel® Core2™',
                'cpu' => 'Duo/Quad - E7500 / Q6600',
                'ram' => '4GB',
                'storage' => '1 × 320GB SATA2 3Gbps',
                'trafego' => '12TB',
                'preco' => '79'
            ),
            array(
                'id' => 2,
                'servidor' => 'Intel® Core™ i3/i5',
                'cpu' => 'i3-540 / I5-760',
                'ram' => '4GB',
                'storage' => '1 × 320GB SATA2 3Gbps',
                'trafego' => '12TB',
                'preco' => '99'
            ),
            array(
                'id' => 3,
                'servidor' => 'Intel® Core™ i3-2100 2nd Gen',
                'cpu' => 'i3-2120 3.3GHz',
                'ram' => '4GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '12TB',
                'preco' => '129'
            ),
            array(
                'id' => 4,
                'servidor' => 'Intel® Xeon® E3-1200 V2',
                'cpu' => 'E3-1230V2 3.3GHz',
                'ram' => '8GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '149'
            ),
            array(
                'id' => 5,
                'servidor' => 'Intel® Xeon® E5-2600',
                'cpu' => 'E5-2609 2.4GHz',
                'ram' => '8GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '249'
            ),
            array(
                'id' => 6,
                'servidor' => 'Dual Intel® Xeon® E5500 or E5600',
                'cpu' => '2 x E55xx or E56xx',
                'ram' => '8GB',
                'storage' => '1 × 500GB SATA2 3Gbps',
                'trafego' => '30TB',
                'preco' => '269'
            ),
            array(
                'id' => 7,
                'servidor' => 'Dual Intel® Xeon® E5-2600',
                'cpu' => '2 x E5-2609 2.4GHz',
                'ram' => '16GB',
                'storage' => '1 × 1000GB SATA3 6Gbps',
                'trafego' => '30TB',
                'preco' => '369'
            ),
            array(
                'id' => 8,
                'servidor' => 'Dual Intel® Xeon® E5-2600',
                'cpu' => '2 x E5-2620 2.0GHz',
                'ram' => '16GB',
                'storage' => '3 × 300GB SAS2 6Gbps',
                'trafego' => '30TB',
                'preco' => '559'
            )
        );
        
        return array(
            "planos"=>$planos
        );
    }
    
    /**
     * Route("/servidor-dedicado-inteligente", name="dedicado_smart")
     * Route("/servidor-dedicado-inteligente/")
     * Template("WebsiteBundle:Produtos:dedicado.smart.html")
     */
    public function servidoresSmartAction() {
        $planos = array(
            array(
                'id' => 1,
                'cpu' => 'Intel Core2 Duo 2.93GHz',
                'ram' => '2GB',
                'ram2' => '4GB',
                'storage' => '500GB',
                'raid' => 'SW RAID 1',
                'trafego' => '10TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '79'
            ),
            array(
                'id' => 2,
                'cpu' => 'Intel Dual-Core i3-540 3.06GHz H/T',
                'ram' => '2GB',
                'ram2' => '4GB',
                'storage' => '1000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '109'
            ),
            array(
                'id' => 3,
                'cpu' => 'Intel Core2 Quad 2.66GHz',
                'ram' => '1GB',
                'ram2' => '2GB',
                'storage' => '500GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '139'
            ),
            array(
                'id' => 4,
                'cpu' => 'Intel Core2 Quad 2.66GHz',
                'ram' => '2GB',
                'ram2' => '4GB',
                'storage' => '1000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '159'
            ),
            array(
                'id' => 5,
                'cpu' => 'Intel Quad-Core i5-760 2.80GHz',
                'ram' => '4GB',
                'ram2' => '6GB',
                'storage' => '2000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos'),
                'preco' => '199'
            ),
            array(
                'id' => 6,
                'cpu' => 'Intel Core2 Quad 2.66GHz',
                'ram' => '4GB',
                'ram2' => '8GB',
                'storage' => '2000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos'),
                'preco' => '209'
            ),
            array(
                'id' => 7,
                'cpu' => 'Intel Quad-Core i7-870 2.93GHz H/T',
                'ram' => '4GB',
                'ram2' => '8GB',
                'storage' => '1000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '219'
            ),
            array(
                'id' => 8,
                'cpu' => 'Intel Nehalem Quad-Core Dual Xeon 2.13GHz',
                'ram' => '3GB',
                'ram2' => '6GB',
                'storage' => '500GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '229'
            ),
            array(
                'id' => 9,
                'cpu' => 'Intel Nehalem Quad-Core Dual Xeon 2.13GHz',
                'ram' => '6GB',
                'ram2' => '12GB',
                'storage' => '1000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '269'
            ),
            array(
                'id' => 10,
                'cpu' => 'Intel Nehalem Quad-Core Dual Xeon 2.26GHz H/T',
                'ram' => '6GB',
                'ram2' => '12GB',
                'storage' => '1000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos','debian','ubuntu'),
                'preco' => '339'
            ),
            array(
                'id' => 11,
                'cpu' => 'Intel Nehalem Quad-Core Dual Xeon 2.53GHz H/T',
                'ram' => '12GB',
                'ram2' => '24GB',
                'storage' => '2000GB',
                'raid' => 'SW RAID 1',
                'trafego' => '20TB',
                'os' => array('windows','centos'),
                'preco' => '579'
            )
        );
        
        return array(
            "planos"=>$planos
        );
    }
    
    /**
     * Route("/cloud-server", name="dedicado_cloud")
     * Route("/cloud-server/")
     * Template("WebsiteBundle:Produtos:dedicado.cloud.html")
     */
    public function servidoresCloudAction() {
        $planos = array(
            array(
                'id' => 1,
                'cpu' => '1 CPU Power',
                'ram' => '512MB',
                'storage' => '10GB',
                'raid' => '',
                'trafego' => 'Ilimitado*',
                'os' => array('centos'),
                'preco' => 29.20
            ),
            array(
                'id' => 2,
                'cpu' => '2 CPU Power',
                'ram' => '2GB',
                'storage' => '20GB',
                'raid' => '',
                'trafego' => 'Ilimitado*',
                'os' => array('centos'),
                'preco' => 51.10
            ),
            array(
                'id' => 3,
                'cpu' => '3 CPU Power',
                'ram' => '3GB',
                'storage' => '30GB',
                'raid' => '',
                'trafego' => 'Ilimitado*',
                'os' => array('centos'),
                'preco' => 73.00
            ),
            array(
                'id' => 4,
                'cpu' => '4 CPU Power',
                'ram' => '4GB',
                'storage' => '40GB',
                'raid' => '',
                'trafego' => 'Ilimitado*',
                'os' => array('centos'),
                'preco' => 102.20
            ),
            array(
                'id' => 5,
                'cpu' => '8 CPU Power',
                'ram' => '8GB',
                'storage' => '80GB',
                'raid' => '',
                'trafego' => 'Ilimitado*',
                'os' => array('centos'),
                'preco' => 204.40
            )
        );
        
        return array(
            "planos"=>$planos
        );
    }
    
    /**
     * @Route("/empresa", name="empresa")
     * @Route("/empresa/")
     * @Template("WebsiteBundle:Empresa:empresa.html.twig")
     */
    public function empresaAction() {
        return array();
    }
    
    /**
     * @Route("/marketing-cloud-services", name="marketing")
     * @Route("/marketing-cloud-services/")
     * @Template("WebsiteBundle:Servicos:marketing-cloud.html.twig")
     */
    public function marketingCloudAction() {
        return array();
    }

    /**
     * @Route("/marketing-cloud")
     * @Route("/marketing-cloud/")
     * @Route("/mcs/")
     * @Route("/mcs")
     * @Route("/marketing/")
     * @Route("/marketing")
     */
    public function marketingRACloudAction() {
        return $this->redirectToRoute("marketing");
    }
    
    /**
     * @Route("/marketing-eleicoes-2016", name="marketing_eleicoes")
     * @Route("/marketing-eleicoes-2016/")
     * @Route("/eleicoes")
     * @Route("/eleicoes/")
     */
    public function marketingEleicoesAction() {
        return $this->redirectToRoute('gestao_eleicoes_2017', array(), 301);
    }

    /**
     * @Route("/marketing-deputado", name="marketing_eleicoes_2017_red")
     * @Route("/marketing-deputado-2017/")
     * @Route("/eleicoes-deputado")
     * @Route("/eleicoes-deputado/")
     */
    public function marketingEleicoesRedirectAction() {
        return $this->redirectToRoute('gestao_eleicoes_2017', array(), 301);
    }

    /**
     * @Route("/gestao-eleicoes-2017", name="gestao_eleicoes_2017")
     * @Route("/gestao-eleicoes-2017/")
     * @Template("WebsiteBundle:Eleicoes2017:marketing-eleicoes.html.twig")
     */
    public function gestaoEleicoes2017Action() {
        return array();
    }
    
    /**
     * @Route("/meproteja", name="meproteja")
     * @Route("/meproteja/")
     * @Template("WebsiteBundle:Servicos:meproteja.html.twig")
     */
    public function meProtejaAction() {
        return array();
    }
    
    /**
     * @Route("/social/ong", name="social_ong")
     * @Route("/social/ong/")
     * @Template("WebsiteBundle:Social:ong.html.twig")
     */
    public function socialOngAction() {
        return array();
    }
    
    /**
     * @Route("/promo/sitemkt", name="promocao_site")
     * @Template("WebsiteBundle:Promocao:site.html.twig")
     */
    public function promocaoSiteAction() {
        return $this->redirectToRoute("desenvolvimento-sites");
    }
    
    /**
     * @Route("/mkt/r", name="mailclick")
     */
    public function mailMktRedirectAction(Request $request) {
        $url = urldecode($request->get("url"));
        return $this->redirect($url);
    }

}
