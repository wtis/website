<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ContatoTipoStatus
 *
 * @ORM\Table(name="contato_tipo_status")
 * @ORM\Entity
 */
class ContatoTipoStatus {

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
     * @ORM\Column(name="urn", type="string", length=255)
     */
    private $urn;

    /**
     * @ORM\OneToMany(targetEntity="Contato", mappedBy="status")
     */
    protected $contatos;

    public function __construct() {
        $this->contatos = new ArrayCollection();
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
     * @return ContatoTipoStatus
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
     * Set urn
     *
     * @param string $urn
     * @return ContatoTipoStatus
     */
    public function setUrn($urn) {
        $this->urn = $urn;

        return $this;
    }

    /**
     * Get urn
     *
     * @return string 
     */
    public function getUrn() {
        return $this->urn;
    }
    
    public function getContatos() {
        return $this->contatos;
    }

    public function addContatos(\WebsiteBundle\Entity\Contato $contato) {
        $this->contatos[] = $contato;
        return $this;
    }

}
