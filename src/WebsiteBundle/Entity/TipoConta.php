<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WebsiteBundle\Entity\TipoConta
 *
 * @ORM\Table(name="conta_tipo")
 * @ORM\Entity
 */
class TipoConta {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $descricao
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\OneToMany(targetEntity="Conta", mappedBy="tipoConta")
     */
    protected $contas;
    
    public function __construct(){
        $this->contas = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao() {
        return $this->descricao;
    }


    /**
     * Add contas
     *
     * @param WebsiteBundle\Entity\Conta $contas
     */
    public function addConta(\WebsiteBundle\Entity\Conta $contas)
    {
        $this->contas[] = $contas;
    }

    /**
     * Get contas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContas()
    {
        return $this->contas;
    }
}