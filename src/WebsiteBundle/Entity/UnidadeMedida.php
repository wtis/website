<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UnidadeMedida
 *
 * @ORM\Table(name="unidade_medida")
 * @ORM\Entity
 */
class UnidadeMedida {

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
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="unidade", type="string", length=255)
     */
    private $unidade;

    /**
     * @var string
     *
     * @ORM\Column(name="valorCusto", type="decimal")
     */
    private $valorCusto;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer")
     */
    private $quantidade;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="observacaoInterna", type="text")
     */
    private $observacaoInterna;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProdutoServico", inversedBy="unidadeMedida")
     * @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     */
    protected $produto;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoProdutoLimite", mappedBy="unidadeMedida") 
     */
    protected $planoProdutoLimites;
    
    /**
     * @ORM\OneToMany(targetEntity="UnidadeMedidaRegra", mappedBy="unidadeMedida") 
     */
    protected $regras;
    
    function __construct() {
        $this->planoProdutoLimites = new ArrayCollection();
        $this->regras = new ArrayCollection();
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
     * @return UnidadeMedida
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
     * Set unidade
     *
     * @param string $unidade
     * @return UnidadeMedida
     */
    public function setUnidade($unidade) {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return string 
     */
    public function getUnidade() {
        return $this->unidade;
    }

    /**
     * Set valorCusto
     *
     * @param string $valorCusto
     * @return UnidadeMedida
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
     * Set quantidade
     *
     * @param integer $quantidade
     * @return UnidadeMedida
     */
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade() {
        return $this->quantidade;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return UnidadeMedida
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
     * Set observacaoInterna
     *
     * @param string $observacaoInterna
     * @return UnidadeMedida
     */
    public function setObservacaoInterna($observacaoInterna) {
        $this->observacaoInterna = $observacaoInterna;

        return $this;
    }

    /**
     * Get observacaoInterna
     *
     * @return string 
     */
    public function getObservacaoInterna() {
        return $this->observacaoInterna;
    }
    
    public function getProduto() {
        return $this->produto;
    }

    public function setProduto(\WebsiteBundle\Entity\ProdutoServico $produto) {
        $this->produto = $produto;
    }
    
    public function getPlanoProdutoLimites() {
        return $this->planoProdutoLimites;
    }

    public function addPlanoProdutoLimite(\WebsiteBundle\Entity\PlanoProdutoLimite $planoProdutoLimite) {
        $this->planoProdutoLimites[] = $planoProdutoLimite;
    }
    
    public function getRegras() {
        return $this->regras;
    }

    public function addRegra(\WebsiteBundle\Entity\UnidadeMedidaRegra $regra) {
        $this->regras[] = $regra;
    }

}
