<?php

namespace WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Services controller.
 *
 * @Route("/partner")
 */
class PartnerController extends Controller {
    
    /**
     * @Route("/lista", name="parceiros_listar")
     * @Template("WebsiteBundle:Partner:list.view.html")
     */
    public function listarParceirosAction() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
                ->addSelect('p.id')
                ->addSelect('p.slug')
                ->addSelect('pessoa.nome')
                ->from("WebsiteBundle:Partner", 'p')
                ->join('p.pessoa', 'pessoa')
                ->orderBy('pessoa.nome', 'ASC');
        
        $entity = $query->getQuery()->getResult();
        return array(
            "entity" => $entity
        );
    }

    /**
     * Busca Parceiros por Cidade e Atividade.
     *
     * @Route("/{slug}", name="partner_find_one")
     * @Method("GET")
     * @Template("WebsiteBundle:Partner:partner.view.html")
     */
    public function parnerFindOneAction($slug) {
        $em = $this->getDoctrine()->getManager();   
        $entity = $em->getRepository("WebsiteBundle:Partner")->findBySlug($slug);
        
        if(!$entity){
            throw $this->createNotFoundException('Unable to find Partner.');
        }
        
        return array(
            "partner" => $entity[0]
        );
    }

}
