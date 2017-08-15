<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\Pessoa
 *
 * @ORM\Table(name="pessoa")
 * @ORM\Entity(repositoryClass="WebsiteBundle\Entity\PessoaRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tipo", type="integer")
 * @ORM\DiscriminatorMap({"1" = "PessoaFisica", "2" = "PessoaJuridica"})
 */
abstract class Pessoa {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nome
     * @Assert\NotBlank(message="É necessário o nome da pessoa")
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var datetime $dataCadastro
     *
     * @ORM\Column(name="dataCadastro", type="datetime")
     */
    private $dataCadastro;

    /**
     * @var datetime $ultimaAlteracao
     *
     * @ORM\Column(name="ultimaAlteracao", type="datetime", nullable=true)
     */
    private $ultimaAlteracao;

    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="pessoas")
     * @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     */
    protected $pais;

    /**
     * @ORM\OneToMany(targetEntity="ContatoTelefone", mappedBy="pessoa", cascade={"all"}, orphanRemoval=true) 
     */
    protected $telefones;

    /**
     * @ORM\OneToMany(targetEntity="ContatoEmail", mappedBy="pessoa", cascade={"all"}, orphanRemoval=true) 
     */
    protected $emails;

    /**
     * @ORM\OneToMany(targetEntity="EnderecoFisico", mappedBy="pessoa", cascade={"all"}, orphanRemoval=true) 
     */
    protected $enderecos;

    /**
     * @ORM\OneToMany(targetEntity="Conta", mappedBy="pessoa", cascade={"all"}, orphanRemoval=true) 
     */
    protected $contas;

    /**
     * @|ORM\ManyToOne(targetEntity="Pessoa", inversedBy="pessoas")
     * @|ORM\JoinColumn(name="revendedor_id", referencedColumnName="id")
     /
    protected $revendedor;*

    /**
     * @ORM\OneToMany(targetEntity="Pessoa", mappedBy="revendedor") 
     */
    protected $pessoas;
    
    /**
     * @|ORM\OneToOne(targetEntity="ProfessionalService")
     * @|ORM\JoinColumn(name="profissional_service_id", referencedColumnName="id", nullable=true)
     
    protected $professionalService;
    
    /**
     * @O|RM\OneToOne(targetEntity="Partner")
     * @O|RM\JoinColumn(name="partner_id", referencedColumnName="id", nullable=true)
     
    protected $partner;*/

    public function __construct() {
        $this->telefones = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->enderecos = new ArrayCollection();
        $this->contas = new ArrayCollection();
        $this->pessoas = new ArrayCollection();
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
     * Set nome
     *
     * @param string $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
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
     * Set dataCadastro
     *
     * @param datetime $dataCadastro
     */
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    /**
     * Get dataCadastro
     *
     * @return datetime 
     */
    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    /**
     * Set ultimaAlteracao
     *
     * @param datetime $ultimaAlteracao
     */
    public function setUltimaAlteracao($ultimaAlteracao) {
        $this->ultimaAlteracao = $ultimaAlteracao;
    }

    /**
     * Get ultimaAlteracao
     *
     * @return datetime 
     */
    public function getUltimaAlteracao() {
        return $this->ultimaAlteracao;
    }

    /**
     * Set pais
     *
     * @param WebsiteBundle\Entity\Pais $pais
     */
    public function setPais(\WebsiteBundle\Entity\Pais $pais) {
        $this->pais = $pais;
    }

    /**
     * Get pais
     *
     * @return WebsiteBundle\Entity\Pais
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * Add telefones
     *
     * @param WebsiteBundle\Entity\ContatoTelefone $telefones
     */
    public function addContatoTelefone(\WebsiteBundle\Entity\ContatoTelefone $telefones) {
        $this->telefones[] = $telefones;
    }

    /**
     * Get telefones
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTelefones() {
        return $this->telefones;
    }
    
    public function getTelefoneByRefer($refer) {
        foreach($this->telefones as $t){
            if( strcmp ( $t->getRefer(), $refer )==0 ){
                return $t;
            }
        }
        return null;
    }

    /**
     * Add enderecos
     *
     * @param WebsiteBundle\Entity\EnderecoFisico $enderecos
     */
    public function addEnderecoFisico(\WebsiteBundle\Entity\EnderecoFisico $enderecos) {
        $this->enderecos[] = $enderecos;
    }

    /**
     * Get enderecos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEnderecos() {
        return $this->enderecos;
    }

    /**
     * Add contas
     *
     * @param WebsiteBundle\Entity\Conta $contas
     */
    public function addConta(\WebsiteBundle\Entity\Conta $contas) {
        $this->contas[] = $contas;
    }

    /**
     * Get contas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContas() {
        return $this->contas;
    }

    /**
     * Add emails
     *
     * @param WebsiteBundle\Entity\ContatoEmail $emails
     */
    public function addContatoEmail(\WebsiteBundle\Entity\ContatoEmail $emails) {
        $this->emails[] = $emails;
    }

    /**
     * Get emails
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEmails() {
        return $this->emails;
    }

    /**
     * Set revendedor
     *
     * @param boolean $revendedor
     */
    public function setRevendedor(\WebsiteBundle\Entity\Pessoa $revendedor) {
        $this->revendedor = $revendedor;
    }

    /**
     * Get revendedor
     *
     * @return boolean 
     */
    public function getRevendedor() {
        return $this->revendedor;
    }

    /**
     * Add pessoas
     *
     * @param WebsiteBundle\Entity\Pessoa $pessoas
     */
    public function addPessoa(\WebsiteBundle\Entity\Pessoa $pessoas) {
        $this->pessoas[] = $pessoas;
    }

    /**
     * Get pessoas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPessoas() {
        return $this->pessoas;
    }
    
    public function getProfessionalService() {
        return $this->professionalService;
    }

    public function setProfessionalService(\WebsiteBundle\Entity\ProfessionalService $professionalService) {
        $this->professionalService = $professionalService;
        return $this;
    }
    
    public function isProfessionalService(){
        return is_object($this->professionalService) ? true : false;
    }

    public function getPartner() {
        return $this->partner;
    }

    public function setPartner(\WebsiteBundle\Entity\Partner $partner) {
        $this->partner = $partner;
        return $this;
    }

}