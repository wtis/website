<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\Conta
 *
 * @ORM\Table(name="conta")
 * @ORM\Entity(repositoryClass="WebsiteBundle\Entity\ContaRepository")
 */
class Conta implements UserInterface, \Serializable {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @var text $password
     * @Assert\NotBlank(message="É necessário informar uma senha de acesso")
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var decimal $saldo
     *
     * @ORM\Column(name="saldo", type="decimal", scale=2, nullable=true)
     */
    private $saldo;

    /**
     * @var datetime $dataAbertura
     *
     * @ORM\Column(name="dataAbertura", type="datetime")
     */
    private $dataAbertura;

    /**
     * @var datetime $ultimoAcesso
     *
     * @ORM\Column(name="ultimoAcesso", type="datetime", nullable=true)
     */
    private $ultimoAcesso;

    /**
     * @var datetime $ultimaAlteracao
     *
     * @ORM\Column(name="ultimaAlteracao", type="datetime", nullable=true)
     */
    private $ultimaAlteracao;

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="contas")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    protected $pessoa;

    /**
     * @ORM\OneToMany(targetEntity="DadosBancarios", mappedBy="conta", cascade={"all"}, orphanRemoval=true) 
     */
    protected $dadosBancarios;

    /**
     * @ORM\OneToMany(targetEntity="HistoricoSaldo", mappedBy="conta", cascade={"all"}, orphanRemoval=true) 
     */
    protected $historicosSaldo;

    /**
     * @ORM\OneToOne(targetEntity="Lucro", mappedBy="conta", cascade={"all"}, orphanRemoval=true) 
     */
    protected $lucro;

    /**
     * @ORM\OneToMany(targetEntity="Fatura", mappedBy="conta", cascade={"all"}, orphanRemoval=true) 
     */
    protected $faturas;

    /**
     * @ORM\ManyToOne(targetEntity="TipoConta", inversedBy="contas")
     * @ORM\JoinColumn(name="tipo_id", referencedColumnName="id")
     */
    protected $tipoConta;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="conta") 
     */
    protected $pedidos;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="indicacao") 
     */
    protected $indicacoes;    
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct() {
        $this->dadosBancarios = new ArrayCollection();
        $this->historicosSaldo = new ArrayCollection();
        $this->faturas = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->indicacoes = new ArrayCollection();
        $this->isActive = true;
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param text $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return text 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set saldo
     *
     * @param decimal $saldo
     */
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    /**
     * Get saldo
     *
     * @return decimal 
     */
    public function getSaldo() {
        return $this->saldo;
    }

    /**
     * Set dataAbertura
     *
     * @param datetime $dataAbertura
     */
    public function setDataAbertura($dataAbertura) {
        $this->dataAbertura = $dataAbertura;
    }

    /**
     * Get dataAbertura
     *
     * @return datetime 
     */
    public function getDataAbertura() {
        return $this->dataAbertura;
    }

    /**
     * Set ultimoAcesso
     *
     * @param datetime $ultimoAcesso
     */
    public function setUltimoAcesso($ultimoAcesso) {
        $this->ultimoAcesso = $ultimoAcesso;
    }

    /**
     * Get ultimoAcesso
     *
     * @return datetime 
     */
    public function getUltimoAcesso() {
        return $this->ultimoAcesso;
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

    /**
     * Add dadosBancarios
     *
     * @param WebsiteBundle\Entity\DadosBancarios $dadosBancarios
     */
    public function addDadosBancarios(\WebsiteBundle\Entity\DadosBancarios $dadosBancarios) {
        $this->dadosBancarios[] = $dadosBancarios;
    }

    /**
     * Get dadosBancarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDadosBancarios() {
        return $this->dadosBancarios;
    }

    /**
     * Add historicosSaldo
     *
     * @param WebsiteBundle\Entity\HistoricoSaldo $historicosSaldo
     */
    public function addHistoricoSaldo(\WebsiteBundle\Entity\HistoricoSaldo $historicosSaldo) {
        $this->historicosSaldo[] = $historicosSaldo;
    }

    /**
     * Get historicosSaldo
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getHistoricosSaldo() {
        return $this->historicosSaldo;
    }

    /**
     * Set lucro
     *
     * @param WebsiteBundle\Entity\Lucro $lucro
     */
    public function setLucro(\WebsiteBundle\Entity\Lucro $lucro) {
        $this->lucro = $lucro;
    }

    /**
     * Get lucro
     *
     * @return WebsiteBundle\Entity\Lucro
     */
    public function getLucro() {
        return $this->lucro;
    }

    /**
     * Add faturas
     *
     * @param WebsiteBundle\Entity\Fatura $faturas
     */
    public function addFatura(\WebsiteBundle\Entity\Fatura $faturas) {
        $this->faturas[] = $faturas;
    }

    /**
     * Get faturas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFaturas() {
        return $this->faturas;
    }

    /**
     * Set tipoConta
     *
     * @param WebsiteBundle\Entity\TipoConta $tipoConta
     */
    public function setTipoConta(\WebsiteBundle\Entity\TipoConta $tipoConta) {
        $this->tipoConta = $tipoConta;
    }

    /**
     * Get tipoConta
     *
     * @return WebsiteBundle\Entity\TipoConta
     */
    public function getTipoConta() {
        return $this->tipoConta;
    }

    public function getRoles() {
        $tipoConta = $this->tipoConta->getDescricao();
        if ($tipoConta == 'Revendedor') {
            return array('ROLE_REVENDEDOR');
        } else {
            return array('ROLE_USER');
        }
    }

    public function getSalt() {
       return null; 
    }
    
    public function eraseCredentials(){
    }

    public function serialize() {
        $pessoa = $this->pessoa->getNome();
        return serialize(
                        array(
                            $this->id,
                            $this->username,
                            #'dadosBancarios'=>$this->dadosBancarios,
                            $this->dataAbertura,
                            #'faturas'=>$this->faturas,
                            #'historicosSaldo'=>$this->historicosSaldo,
                            #'lucro'=>$this->lucro,
                            $this->password,
                            //'pessoa'=>$pessoa,
                            #'revendedor'=>$this->revendedor,
                            $this->saldo,
                            $this->status,
                            #'tipoConta'=>$this->tipoConta,
                            #'ultimaAlteracao' => $this->ultimaAlteracao,
                            #'ultimoAcesso' => $this->ultimoAcesso
                        )
        );
    }

    public function unserialize($serialized) {
        list(
                $this->id,
                $this->username,
                $this->dataAbertura,
                $this->password,
                $this->saldo,
                $this->status
                #$this->ultimaAlteracao,
                #$this->ultimoAcesso
            ) = unserialize($serialized);
    }
    
    public function getPedidos() {
        return $this->pedidos;
    }

    public function addPedido(\WebsiteBundle\Entity\Pedido $pedido) {
        $this->pedidos[] = $pedido;
    }

    public function getIndicacoes() {
        return $this->indicacoes;
    }

    public function addIndicacao(\WebsiteBundle\Entity\Pedido $pedido) {
        $this->indicacoes[] = $pedido;
    }


}