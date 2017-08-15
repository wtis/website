<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteBundle\Entity\ContatoTelefone
 *
 * @ORM\Table(name="pessoa_contato_telefone")
 * @ORM\Entity
 */
class ContatoTelefone {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $tipo
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string $areaCode
     *
     * @ORM\Column(name="areaCode", type="string", length=255)
     */
    private $areaCode;

    /**
     * @var string $ddd
     *
     * @ORM\Column(name="ddd", type="string", length=255)
     */
    private $ddd;

    /**
     * @var string $telefone
     *
     * @ORM\Column(name="telefone", type="string", length=50)
     */
    private $telefone;
    
    /**
     * @var string $telefone
     *
     * @ORM\Column(name="refer", type="string", length=100, nullable=true)
     */
    private $refer;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="telefones")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    protected $pessoa;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Set areaCode
     *
     * @param string $areaCode
     */
    public function setAreaCode($areaCode) {
        $this->areaCode = $areaCode;
    }

    /**
     * Get areaCode
     *
     * @return string 
     */
    public function getAreaCode() {
        return $this->areaCode;
    }

    /**
     * Set ddd
     *
     * @param string $ddd
     */
    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    /**
     * Get ddd
     *
     * @return string 
     */
    public function getDdd() {
        return $this->ddd;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     */
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone() {
        return $this->telefone;
    }
    
    public function getRefer() {
        return $this->refer;
    }

    public function setRefer($refer) {
        $this->refer = $refer;
        return $this;
    }

    /**
     * Set pessoa
     *
     * @param WebsiteBundle\Entity\Pessoa $pessoa
     */
    public function setPessoa(\WebsiteBundle\Entity\Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    /**
     * Get pessoa
     *
     * @return WebsiteBundle\Entity\Pessoa
     */
    public function getPessoa() {
        return $this->pessoa;
    }

}