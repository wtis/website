<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="municipio")
 * @ORM\Entity
 */
class Municipio {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="UnidadeFederativa", inversedBy="municipios")
     * @ORM\JoinColumn(name="uf_id", referencedColumnName="id")
     */
    protected $uf;

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
     */
    public function setNome($nome) {
        $this->nome = $nome;
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
     * Set uf
     *
     */
    public function setUf(\WebsiteBundle\Entity\UnidadeFederativa $uf) {
        $this->uf = $uf;
    }

    /**
     * Get uf
     */
    public function getUf() {
        return $this->uf;
    }

}
