<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteBundle\Entity\HistoricoSaldo
 *
 * @ORM\Table(name="conta_historico_saldo")
 * @ORM\Entity
 */
class HistoricoSaldo {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime $data
     *
     * @ORM\Column(name="data", type="datetime")
     */
    private $data;

    /**
     * @var bigint $operacao
     *
     * @ORM\Column(name="operacao", type="string", length=255)
     */
    private $operacao;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var text $descricao2
     *
     * @ORM\Column(name="descricao2", type="text", nullable=true)
     */
    private $descricao2;

    /**
     * @var decimal $valor
     *
     * @ORM\Column(name="valor", type="decimal", scale=2)
     */
    private $valor;

    /**
     * @var integer $tipo
     *
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Conta", inversedBy="historicosSaldo")
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
     * Set data
     *
     * @param datetime $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * Get data
     *
     * @return datetime 
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set operacao
     *
     * @param bigint $operacao
     */
    public function setOperacao($operacao) {
        $this->operacao = $operacao;
    }

    /**
     * Get operacao
     *
     * @return bigint 
     */
    public function getOperacao() {
        return $this->operacao;
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
     * Set descricao2
     *
     * @param text $descricao2
     */
    public function setDescricao2($descricao2) {
        $this->descricao2 = $descricao2;
    }

    /**
     * Get descricao2
     *
     * @return text 
     */
    public function getDescricao2() {
        return $this->descricao2;
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
     * Set tipo
     *
     * @param integer $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo() {
        return $this->tipo;
    }

    public function getConta() {
        return $this->conta;
    }

    public function setConta(\WebsiteBundle\Entity\Conta $conta) {
        $this->conta = $conta;
    }

}