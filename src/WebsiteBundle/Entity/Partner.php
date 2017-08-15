<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Partner
 *
 * @ORM\Table(name="partner")
 * @ORM\Entity
 */
class Partner {

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
     * @|ORM\Column(name="nome", type="string", length=255)
     
    private $nome;*/
    
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoes", type="text")
     */
    private $observacoes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="map", type="text")
     */
    private $map;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    
    /**
     * @ORM\OneToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", nullable=false)
     */
    protected $pessoa;
    
    /**
     * @ORM\OneToMany(targetEntity="ProfessionalService", mappedBy="partner") 
     */
    protected $professionalService;
    
    /**
     * @ORM\ManyToMany(targetEntity="ProdutoServico", inversedBy="partners")
     * @ORM\JoinTable(name="partner_produtoservico",
     *      joinColumns={@ORM\JoinColumn(name="partner_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="produtoservico_id", referencedColumnName="id")}
     *      )
     */
    protected $servicos;
    
    function __construct() {
        $this->professionalService = new ArrayCollection();
        $this->servicos = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Partner
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set observacoes
     *
     * @param string $observacoes
     * @return Partner
     */
    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;

        return $this;
    }

    /**
     * Get observacoes
     *
     * @return string 
     */
    public function getObservacoes() {
        return $this->observacoes;
    }
    
    public function getMap() {
        return $this->map;
    }

    public function setMap($map) {
        $this->map = $map;
        return $this;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Partner
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Partner
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
    
    public function getProfessionalService() {
        return $this->professionalService;
    }

    public function addProfessionalService(\WebsiteBundle\Entity\ProfessionalService $professionalService) {
        $this->professionalService[] = $professionalService;
        return $this;
    }
    
    public function getServicos() {
        return $this->servicos;
    }

    public function addServico(\WebsiteBundle\Entity\ProdutoServico $produtoServico) {
        $this->servicos[] = $produtoServico;
        return $this;
    }

}
