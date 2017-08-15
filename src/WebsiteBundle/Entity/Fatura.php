<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\Fatura
 *
 * @ORM\Table(name="conta_fatura")
 * @ORM\Entity
 */
class Fatura {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $codigo
     *
     * @ORM\Column(name="codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @var datetime $dataCriacao
     *
     * @ORM\Column(name="dataCriacao", type="datetime")
     */
    private $dataCriacao;

    /**
     * @var date $dataVencimento
     *
     * @ORM\Column(name="dataVencimento", type="date")
     */
    private $dataVencimento;

    /**
     * @var datetime $dataPagamento
     *
     * @ORM\Column(name="dataPagamento", type="datetime", nullable=true)
     */
    private $dataPagamento;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var decimal $valor
     *
     * @ORM\Column(name="valor", type="decimal", scale=2)
     */
    private $valor;

    /**
     * @var text $pagamentoDetalhes
     *
     * @ORM\Column(name="pagamentoDetalhes", type="text", nullable=true)
     */
    private $pagamentoDetalhes;

    /**
     * @var string $integracao
     *
     * @ORM\Column(name="integracao", type="text", nullable=true)
     */
    private $integracao;

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Conta", inversedBy="faturas")
     * @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     */
    protected $conta;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="fatura") 
     */
    protected $pedidos;
    
    function __construct() {
        $this->pedidos = new ArrayCollection();
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
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
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
     * Set dataCriacao
     *
     * @param datetime $dataCriacao
     */
    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    /**
     * Get dataCriacao
     *
     * @return datetime 
     */
    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    /**
     * Set dataVencimento
     *
     * @param date $dataVencimento
     */
    public function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * Get dataVencimento
     *
     * @return date 
     */
    public function getDataVencimento() {
        return $this->dataVencimento;
    }

    /**
     * Set dataPagamento
     *
     * @param datetime $dataPagamento
     */
    public function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    /**
     * Get dataPagamento
     *
     * @return datetime 
     */
    public function getDataPagamento() {
        return $this->dataPagamento;
    }

    /**
     * Set descricao
     *
     * @param text $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return text 
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Set valor
     *
     * @param decimal $valor
     */
    public function setValor($valor) {
        $this->valor = $valor;
    }

    /**
     * Get valor
     *
     * @return decimal 
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * Set pagamentoDetalhes
     *
     * @param text $pagamentoDetalhes
     */
    public function setPagamentoDetalhes($pagamentoDetalhes) {
        $this->pagamentoDetalhes = $pagamentoDetalhes;
    }

    /**
     * Get pagamentoDetalhes
     *
     * @return text 
     */
    public function getPagamentoDetalhes() {
        return $this->pagamentoDetalhes;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status) {
        $this->status = $status;
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
     * Set conta
     *
     * @param WebsiteBundle\Entity\Conta $conta
     */
    public function setConta(\WebsiteBundle\Entity\Conta $conta) {
        $this->conta = $conta;
    }

    /**
     * Get conta
     *
     * @return WebsiteBundle\Entity\Conta
     */
    public function getConta() {
        return $this->conta;
    }

    public function getIntegracao() {
        return $this->integracao;
    }

    public function setIntegracao($integracao) {
        $this->integracao = $integracao;
    }
    
    public function getPedidos() {
        return $this->pedidos;
    }

    public function addPedido(\WebsiteBundle\Entity\Pedido $pedido) {
        $this->pedidos[] = $pedido;
    }

}