<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * WebsiteBundle\Entity\Pessoa
 *
 * @ORM\Table(name="produto_servico")
 * @ORM\Entity()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tipo", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Produto", "2" = "Servico"})
 * @UniqueEntity(fields="codigo", message="Já existe um cadastro com este código")
 */
abstract class ProdutoServico {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCadastro", type="datetime")
     */
    private $dataCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataAlteracao", type="datetime", nullable=true)
     */
    private $dataAlteracao;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=50, unique=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", scale=2)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="valorCusto", type="decimal", scale=2)
     */
    private $valorCusto;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoHtml", type="text", nullable=true)
     */
    private $descricaoHtml;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;
    
    /**
     * @ORM\ManyToMany(targetEntity="Partner", mappedBy="servicos")
     */
    protected $partners;
    
    /**
     * @ORM\OneToMany(targetEntity="ProdutoServico", mappedBy="father") 
     */
    protected $children;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProdutoServico", inversedBy="children")
     * @ORM\JoinColumn(name="father_id", referencedColumnName="id")
     */
    protected $father;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="produto") 
     */
    protected $pedidos;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoProduto", mappedBy="produto")
     */
    protected $planoProduto;
    
    /**
     * @ORM\OneToMany(targetEntity="UnidadeMedida", mappedBy="produto")
     */
    protected $unidadeMedida;
    
    function __construct() {
        $this->partners = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->planoProduto = new ArrayCollection();
        $this->unidadeMedida = new ArrayCollection();
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
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return ProdutoServico
     */
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    /**
     * Set dataAlteracao
     *
     * @param \DateTime $dataAlteracao
     * @return ProdutoServico
     */
    public function setDataAlteracao($dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

    /**
     * Get dataAlteracao
     *
     * @return \DateTime 
     */
    public function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return ProdutoServico
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
     * Set nome
     *
     * @param string $nome
     * @return ProdutoServico
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
     * Set valor
     *
     * @param string $valor
     * @return ProdutoServico
     */
    public function setValor($valor) {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * Set valorCusto
     *
     * @param string $valorCusto
     * @return ProdutoServico
     */
    public function setValorCusto($valorCusto) {
        $this->valorCusto = $valorCusto;

        return $this;
    }

    /**
     * Get valorCusto
     *
     * @return string 
     */
    public function getValorCusto() {
        return $this->valorCusto;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return ProdutoServico
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
     * Set descricaoHtml
     *
     * @param string $descricaoHtml
     * @return ProdutoServico
     */
    public function setDescricaoHtml($descricaoHtml) {
        $this->descricaoHtml = $descricaoHtml;

        return $this;
    }

    /**
     * Get descricaoHtml
     *
     * @return string 
     */
    public function getDescricaoHtml() {
        return $this->descricaoHtml;
    }
    
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return ProdutoServico
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
    
    public function getPartners() {
        return $this->partners;
    }

    public function addPartner(\WebsiteBundle\Entity\Partner $partner) {
        $this->partners[] = $partner;
        return $this;
    }
    
    public function getChildren() {
        return $this->children;
    }

    public function getFather() {
        return $this->father;
    }

    public function addChildren(\WebsiteBundle\Entity\ProdutoServico $children) {
        $this->children[] = $children;
        return $this;
    }

    public function setFather(\WebsiteBundle\Entity\ProdutoServico $father) {
        $this->father = $father;
        return $this;
    }

    public function getPedidos() {
        return $this->pedidos;
    }

    public function addPedido(\WebsiteBundle\Entity\Pedido $pedido) {
        $this->pedidos[] = $pedido;
    }
    
    public function getPlanoProduto() {
        return $this->planoProduto;
    }

    public function addPlanoProduto(\WebsiteBundle\Entity\PlanoProduto $planoProduto) {
        $this->planoProduto[] = $planoProduto;
    }
    
    public function getUnidadeMedida() {
        return $this->unidadeMedida;
    }

    public function addUnidadeMedida(\WebsiteBundle\Entity\UnidadeMedida $unidadeMedida) {
        $this->unidadeMedida[] = $unidadeMedida;
    }

}
