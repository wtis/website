<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ContatoExtra
 *
 * @ORM\Table(name="contato_extra")
 * @ORM\Entity
 */
class ContatoExtra {

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
     * @Assert\NotBlank(message="Informe o nome do item extra do contato")
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=255, nullable=true)
     */
    private $sigla;

    /**
     * @var string
     * @Assert\NotBlank(message="Informe um conteúdo do item extra do contato")
     * @ORM\Column(name="texto", type="text", nullable=true)
     */
    private $texto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valor", type="boolean", nullable=true)
     */
    private $valor;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contato", inversedBy="extras")
     * @ORM\JoinColumn(name="contato", referencedColumnName="id")
     */
    protected $contato;

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
     * @return ContatoExtra
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
     * Set sigla
     *
     * @param string $sigla
     * @return ContatoExtra
     */
    public function setSigla($sigla) {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla() {
        return $this->sigla;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return ContatoExtra
     */
    public function setTexto($texto) {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto() {
        return $this->texto;
    }

    /**
     * Set valor
     *
     * @param boolean $valor
     * @return ContatoExtra
     */
    public function setValor($valor) {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return boolean 
     */
    public function getValor() {
        return $this->valor;
    }
    
    public function getContato() {
        return $this->contato;
    }

    public function setContato(\WebsiteBundle\Entity\Contato $contato) {
        $this->contato = $contato;
        return $this;
    }

}
