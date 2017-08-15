<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProfessionalService
 *
 * @ORM\Table(name="professional_service")
 * @ORM\Entity
 */
class ProfessionalService {

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
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="cph", type="decimal", scale=2)
     */
    private $cph;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponivel", type="boolean")
     */
    private $disponivel;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    
    /**
     * @ORM\ManyToMany(targetEntity="ProfessionalServiceAtividade", inversedBy="profissionais")
     * @ORM\JoinTable(name="ps_atividade_profissional",
     *      joinColumns={@ORM\JoinColumn(name="profissional_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="atividade_id", referencedColumnName="id")}
     *      )
     */
    protected $atividades;
    
    /**
     * @ORM\OneToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", nullable=false)
     */
    protected $pessoa;
    
    /**
     * @ORM\ManyToOne(targetEntity="Partner", inversedBy="professionalService")
     * @ORM\JoinColumn(name="partner_id", referencedColumnName="id")
     */
    protected $partner;
    
    function __construct() {
        $this->atividades = new ArrayCollection();
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
     * @return ProfessionalService
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
     * Set descricao
     *
     * @param string $descricao
     * @return ProfessionalService
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

    /**
     * Set cph
     *
     * @param string $cph
     * @return ProfessionalService
     */
    public function setCph($cph) {
        $this->cph = $cph;

        return $this;
    }

    /**
     * Get cph
     *
     * @return string 
     */
    public function getCph() {
        return $this->cph;
    }

    /**
     * Set disponivel
     *
     * @param boolean $disponivel
     * @return ProfessionalService
     */
    public function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;

        return $this;
    }

    /**
     * Get disponivel
     *
     * @return boolean 
     */
    public function getDisponivel() {
        return $this->disponivel;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ProfessionalService
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus() {
        return $this->status;
    }
    
    public function getAtividades() {
        return $this->atividades;
    }

    public function addAtividade(\WebsiteBundle\Entity\ProfessionalServiceAtividade $atividade) {
        $this->atividades[] = $atividade;
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
    
    public function getPartner() {
        return $this->partner;
    }

    public function setPartner(\WebsiteBundle\Entity\Partner $partner) {
        $this->partner = $partner;
        return $this;
    }


}
