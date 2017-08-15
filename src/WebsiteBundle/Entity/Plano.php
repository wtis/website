<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Plano
 *
 * @ORM\Table(name="plano")
 * @ORM\Entity
 */
class Plano {

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
     * @ORM\Column(name="codigo", type="string", length=255)
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
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristicas", type="string", length=255)
     */
    private $caracteristicas;

    /**
     * @var string
     *
     * @ORM\Column(name="orientacaoInterna", type="text")
     */
    private $orientacaoInterna;

    /**
     * @var boolean
     *
     * @ORM\Column(name="degustacao", type="boolean")
     */
    private $degustacao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="plano") 
     */
    protected $pedidos;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoRecorrencia", mappedBy="plano") 
     */
    protected $recorrencia;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoRecurso", mappedBy="plano") 
     */
    protected $recursos;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoProduto", mappedBy="plano") 
     */
    protected $planoProduto;
    
    function __construct() {
        $this->pedidos = new ArrayCollection();
        $this->recorrencia = new ArrayCollection();
        $this->recursos = new ArrayCollection();
        $this->planoProduto = new ArrayCollection();
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
     * @return Plano
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
     * @return Plano
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
     * Set descricao
     *
     * @param string $descricao
     * @return Plano
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
     * Set valor
     *
     * @param string $valor
     * @return Plano
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
     * Set caracteristicas
     *
     * @param string $caracteristicas
     * @return Plano
     */
    public function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    /**
     * Get caracteristicas
     *
     * @return string 
     */
    public function getCaracteristicas() {
        return $this->caracteristicas;
    }

    /**
     * Set orientacaoInterna
     *
     * @param string $orientacaoInterna
     * @return Plano
     */
    public function setOrientacaoInterna($orientacaoInterna) {
        $this->orientacaoInterna = $orientacaoInterna;

        return $this;
    }

    /**
     * Get orientacaoInterna
     *
     * @return string 
     */
    public function getOrientacaoInterna() {
        return $this->orientacaoInterna;
    }

    /**
     * Set degustacao
     *
     * @param boolean $degustacao
     * @return Plano
     */
    public function setDegustacao($degustacao) {
        $this->degustacao = $degustacao;

        return $this;
    }

    /**
     * Get degustacao
     *
     * @return boolean 
     */
    public function getDegustacao() {
        return $this->degustacao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Plano
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
    
    public function getPedidos() {
        return $this->pedidos;
    }

    public function addPedido(\WebsiteBundle\Entity\Pedido $pedido) {
        $this->pedidos[] = $pedido;
    }
    
    public function getRecorrencia() {
        return $this->recorrencia;
    }

    public function getRecursos() {
        return $this->recursos;
    }

    public function addRecorrencia(\WebsiteBundle\Entity\PlanoRecorrencia $recorrencia) {
        $this->recorrencia[] = $recorrencia;
    }

    public function addRecurso(\WebsiteBundle\Entity\PlanoRecurso $recurso) {
        $this->recursos[] = $recurso;
    }
    
    public function getPlanoProduto() {
        return $this->planoProduto;
    }

    public function addPlanoProduto(\WebsiteBundle\Entity\PlanoProduto $planoProduto) {
        $this->planoProduto[] = $planoProduto;
    }



}
