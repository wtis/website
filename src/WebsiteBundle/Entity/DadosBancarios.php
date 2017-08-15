<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteBundle\Entity\DadosBancarios
 *
 * @ORM\Table(name="conta_dados_bancarios")
 * @ORM\Entity
 */
class DadosBancarios {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $banco
     *
     * @ORM\Column(name="banco", type="string", length=255, nullable=true)
     */
    private $banco;

    /**
     * @var string $tipo
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string $agencia
     *
     * @ORM\Column(name="agencia", type="string", length=255, nullable=true)
     */
    private $agencia;

    /**
     * @var string $conta
     *
     * @ORM\Column(name="numero_conta", type="string", length=255, nullable=true)
     */
    private $numeroConta;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="Conta", inversedBy="dadosBancarios")
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
     * Set banco
     *
     * @param string $banco
     */
    public function setBanco($banco) {
        $this->banco = $banco;
    }

    /**
     * Get banco
     *
     * @return string 
     */
    public function getBanco() {
        return $this->banco;
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
     * Set agencia
     *
     * @param string $agencia
     */
    public function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    /**
     * Get agencia
     *
     * @return string 
     */
    public function getAgencia() {
        return $this->agencia;
    }

    /**
     * Set conta
     *
     * @param string $conta
     */
    public function setConta($conta) {
        $this->conta = $conta;
    }

    /**
     * Get conta
     *
     * @return string 
     */
    public function getConta() {
        return $this->conta;
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
     * Set numeroConta
     *
     * @param string $numeroConta
     */
    public function setNumeroConta($numeroConta)
    {
        $this->numeroConta = $numeroConta;
    }

    /**
     * Get numeroConta
     *
     * @return string 
     */
    public function getNumeroConta()
    {
        return $this->numeroConta;
    }
}