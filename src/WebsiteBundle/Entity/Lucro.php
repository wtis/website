<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteBundle\Entity\Lucro
 *
 * @ORM\Table(name="conta_lucro")
 * @ORM\Entity
 */
class Lucro {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $porcentagem
     *
     * @ORM\Column(name="porcentagem", type="float", scale=2)
     */
    private $porcentagem;

    /**
     * @ORM\OneToOne(targetEntity="Conta", inversedBy="lucro")
     * @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     */
    protected $conta;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set porcentagem
     *
     * @param integer $porcentagem
     */
    public function setPorcentagem($porcentagem) {
        $this->porcentagem = $porcentagem;
    }

    /**
     * Get porcentagem
     *
     * @return integer 
     */
    public function getPorcentagem() {
        return $this->porcentagem;
    }

    /**
     * Set lucro
     *
     * @param WebsiteBundle\Entity\Conta $conta
     */
    public function setConta(\WebsiteBundle\Entity\Conta $conta) {
        $this->conta = $conta;
    }

    /**
     * Get lucro
     *
     * @return WebsiteBundle\Entity\Conta
     */
    public function getConta() {
        return $this->conta;
    }

}