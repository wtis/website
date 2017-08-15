<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity
 */
class Pedido {

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
     * @ORM\Column(name="data", type="datetime")
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataAtualizacao", type="datetime")
     */
    private $dataAtualizacao;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteNome", type="string", length=255)
     */
    private $clienteNome;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteEmail", type="string", length=255)
     */
    private $clienteEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="localidade", type="string", length=255)
     */
    private $localidade;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="dados", type="object")
     */
    private $dados;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="dadosBrowser", type="object")
     */
    private $dadosBrowser;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    
    /**
     * @ORM\ManyToOne(targetEntity="Fatura", inversedBy="pedidos")
     * @ORM\JoinColumn(name="fatura_id", referencedColumnName="id")
     */
    protected $fatura;
    
    /**
     * @ORM\ManyToOne(targetEntity="Conta", inversedBy="pedidos")
     * @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     */
    protected $conta;
    
    /**
     * @ORM\ManyToOne(targetEntity="Conta", inversedBy="indicacoes")
     * @ORM\JoinColumn(name="indicacao_id", referencedColumnName="id")
     */
    protected $indicacao;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProdutoServico", inversedBy="pedidos")
     * @ORM\JoinColumn(name="indicacao_id", referencedColumnName="id")
     */
    protected $produto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Plano", inversedBy="pedidos")
     * @ORM\JoinColumn(name="plano_id", referencedColumnName="id")
     */
    protected $plano;

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
     * @param \DateTime $data
     * @return Pedido
     */
    public function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set dataAtualizacao
     *
     * @param \DateTime $dataAtualizacao
     * @return Pedido
     */
    public function setDataAtualizacao($dataAtualizacao) {
        $this->dataAtualizacao = $dataAtualizacao;

        return $this;
    }

    /**
     * Get dataAtualizacao
     *
     * @return \DateTime 
     */
    public function getDataAtualizacao() {
        return $this->dataAtualizacao;
    }

    /**
     * Set clienteNome
     *
     * @param string $clienteNome
     * @return Pedido
     */
    public function setClienteNome($clienteNome) {
        $this->clienteNome = $clienteNome;

        return $this;
    }

    /**
     * Get clienteNome
     *
     * @return string 
     */
    public function getClienteNome() {
        return $this->clienteNome;
    }

    /**
     * Set clienteEmail
     *
     * @param string $clienteEmail
     * @return Pedido
     */
    public function setClienteEmail($clienteEmail) {
        $this->clienteEmail = $clienteEmail;

        return $this;
    }

    /**
     * Get clienteEmail
     *
     * @return string 
     */
    public function getClienteEmail() {
        return $this->clienteEmail;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Pedido
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set localidade
     *
     * @param string $localidade
     * @return Pedido
     */
    public function setLocalidade($localidade) {
        $this->localidade = $localidade;

        return $this;
    }

    /**
     * Get localidade
     *
     * @return string 
     */
    public function getLocalidade() {
        return $this->localidade;
    }

    /**
     * Set dados
     *
     * @param \stdClass $dados
     * @return Pedido
     */
    public function setDados($dados) {
        $this->dados = $dados;

        return $this;
    }

    /**
     * Get dados
     *
     * @return \stdClass 
     */
    public function getDados() {
        return $this->dados;
    }

    /**
     * Set dadosBrowser
     *
     * @param \stdClass $dadosBrowser
     * @return Pedido
     */
    public function setDadosBrowser($dadosBrowser) {
        $this->dadosBrowser = $dadosBrowser;

        return $this;
    }

    /**
     * Get dadosBrowser
     *
     * @return \stdClass 
     */
    public function getDadosBrowser() {
        return $this->dadosBrowser;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Pedido
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
    
    public function getFatura() {
        return $this->fatura;
    }

    public function setFatura(\WebsiteBundle\Entity\Fatura $fatura) {
        $this->fatura = $fatura;
    }
    
    public function getConta() {
        return $this->conta;
    }

    public function setConta(\WebsiteBundle\Entity\Conta $conta) {
        $this->conta = $conta;
    }
    
    public function getIndicacao() {
        return $this->indicacao;
    }

    public function setIndicacao(\WebsiteBundle\Entity\Conta $conta) {
        $this->indicacao = $conta;
    }
    
    public function getProduto() {
        return $this->produto;
    }

    public function setProduto(\WebsiteBundle\Entity\ProdutoServico $produto) {
        $this->produto = $produto;
    }
    
    public function getPlano() {
        return $this->plano;
    }

    public function setPlano(\WebsiteBundle\Entity\Plano $plano) {
        $this->plano = $plano;
    }


}
