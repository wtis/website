<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProfessionalServiceAtividade
 *
 * @ORM\Table(name="professional_service_atividade")
 * @ORM\Entity
 */
class ProfessionalServiceAtividade {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=50)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="atividade", type="string", length=255)
     */
    private $atividade;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descricaoHtml", type="text")
     */
    private $descricaoHtml;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="principal", type="boolean")
     */
    private $principal;
    
    /**
     * @ORM\ManyToMany(targetEntity="ProfessionalService", mappedBy="atividades")
     */
    protected $profissionais;
    
    function __construct() {
        $this->profissionais = new ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     * @return ProfessionalServiceAtividade
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Set atividade
     *
     * @param string $atividade
     * @return ProfessionalServiceAtividade
     */
    public function setAtividade($atividade) {
        $this->atividade = $atividade;

        return $this;
    }

    /**
     * Get atividade
     *
     * @return string 
     */
    public function getAtividade() {
        return $this->atividade;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return ProfessionalServiceAtividade
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao() {
        return $this->descricao;
    }
    
    public function getDescricaoHtml() {
        return $this->descricaoHtml;
    }

    public function setDescricaoHtml($descricaoHtml) {
        $this->descricaoHtml = $descricaoHtml;
        return $this;
    }
    
    public function getPrincipal() {
        return $this->principal;
    }

    public function setPrincipal($principal) {
        $this->principal = $principal;
        return $this;
    }
    
    public function getProfissionais() {
        return $this->profissionais;
    }

    public function addProfissional(\WebsiteBundle\Entity\ProfessionalService $profissional) {
        $this->profissionais[] = $profissional;
        return $this;
    }

}
