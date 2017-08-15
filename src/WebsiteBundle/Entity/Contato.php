<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contato
 *
 * @ORM\Table(name="contato")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tipo", type="integer")
 * @ORM\DiscriminatorMap({0="Contato","1"="MeLigue"})
 * @ORM\Entity(repositoryClass="WebsiteBundle\Entity\ContatoRepository")
 */
class Contato {

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
     * @var string
     * @Assert\NotBlank(message="É necessário informar seu nome")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Por favor, informe pelo menos seu nome e sobrenome",
     *      maxMessage = "Seu nome pode ter no máximo {{ limit }} caracteres"
     * )
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     * @Assert\NotBlank(message="É necessário informar seu email")
     * @Assert\Email(
     *     message = "O email  {{ value }} não é válido."
     * )
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     * // NotBlank(message="Por favor nos informe um telefone para contato") // disabled
     * @ORM\Column(name="telefone", type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="text", nullable=true)
     */
    private $mensagem;

    /**
     * @var string
     * #Assert\Ip
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="localidade", type="text", nullable=true)
     */
    private $localidade;

    /**
     * @var string
     *
     * @ORM\Column(name="dadosNavegador", type="text")
     */
    private $dadosNavegador;

    /**
     * @var string
     *
     * @ORM\Column(name="historico", type="text", nullable=true)
     */
    private $historico;
    
    /**
     * @ORM\ManyToOne(targetEntity="ContatoTipoStatus", inversedBy="contatos")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    protected $status;
    
    /**
     * @ORM\OneToMany(targetEntity="ContatoExtra", mappedBy="contato", cascade={"all"}, orphanRemoval=true)
     */
    protected $extras;

    public function __construct() {
        $this->extras = new ArrayCollection();
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
     * Set data
     *
     * @param \DateTime $data
     * @return Contato
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
     * Set nome
     *
     * @param string $nome
     * @return Contato
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
     * Set telefone
     *
     * @param string $telefone
     * @return Contato
     */
    public function setTelefone($telefone) {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone() {
        return $this->telefone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contato
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Contato
     */
    public function setCelular($celular) {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return Contato
     */
    public function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean 
     */
    public function getNewsletter() {
        return $this->newsletter;
    }

    /**
     * Set mensagem
     *
     * @param string $mensagem
     * @return Contato
     */
    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get mensagem
     *
     * @return string 
     */
    public function getMensagem() {
        return $this->mensagem;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Contato
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
     * @return Contato
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
     * Set dadosNavegador
     *
     * @param string $dadosNavegador
     * @return Contato
     */
    public function setDadosNavegador($dadosNavegador) {
        $this->dadosNavegador = $dadosNavegador;

        return $this;
    }

    /**
     * Get dadosNavegador
     *
     * @return string 
     */
    public function getDadosNavegador() {
        return $this->dadosNavegador;
    }

    /**
     * Set historico
     *
     * @param string $historico
     * @return Contato
     */
    public function setHistorico($historico) {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string 
     */
    public function getHistorico() {
        return $this->historico;
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function setStatus(\WebsiteBundle\Entity\ContatoTipoStatus $status) {
        $this->status = $status;
        return $this;
    }

    public function getExtras() {
        return $this->extras;
    }

    public function addExtras(\WebsiteBundle\Entity\ContatoExtra $extra) {
        $this->extras[] = $extra;
        return $this;
    }



}
