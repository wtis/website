<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PessoaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PessoaRepository extends EntityRepository {
    
    public function findRevendedores(){
        return $this->getEntityManager()->createQuery("SELECT p FROM CheckcredIntranetBundle:Pessoa p JOIN p.contas c JOIN c.tipoConta t WHERE t.descricao='Revendedor'")->getResult();
    }
    
    public function findByFiltros($query){
        return $this->getEntityManager()->createQuery("
            SELECT p FROM CheckcredIntranetBundle:Pessoa p 
            LEFT JOIN p.emails email 
            LEFT JOIN p.enderecos endereco
                LEFT JOIN endereco.municipio municipio
            LEFT JOIN p.telefones telefone 
            LEFT JOIN p.contas conta 
                LEFT JOIN conta.tipoConta tipoConta 
            WHERE $query")->getResult();
    }
    
}