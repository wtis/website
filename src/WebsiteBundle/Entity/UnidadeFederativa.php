<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WebsiteBundle\Entity\UnidadeFederativa
 *
 * @ORM\Table(name="unidade_federativa")
 * @ORM\Entity
 */
class UnidadeFederativa {

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
     * @var string $sigla
     *
     * @ORM\Column(name="sigla", type="string", length=255)
     */
    private $sigla;

    /**
     * @ORM\OneToMany(targetEntity="Municipio", mappedBy="uf")
     */
    protected $municipios;

    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="uf")
     * @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     */
    protected $pais;

    function __construct() {
        $this->municipios = new ArrayCollectionon();
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
     * Set sigla
     *
     * @param string $sigla
     */
    public function setSigla($sigla) {
        $this->sigla = $sigla;
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
     * Add municipios
     *
     * @param WebsiteBundle\Entity\Municipio $municipios
     */
    public function addMunicipio(\WebsiteBundle\Entity\Municipio $municipios) {
        $this->municipios[] = $municipios;
    }

    /**
     * Get municipios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMunicipios() {
        return $this->municipios;
    }
    
    /**
     * Set pais
     *
     * @param WebsiteBundle\Entity\Pais $pais
     */
    public function setPais(\WebsiteBundle\Entity\Pais $pais) {
        $this->pais = $pais;
        return $this;
    }

    /**
     * Get pais
     *
     * @return WebsiteBundle\Entity\Pais
     */
    public function getPais() {
        return $this->pais;
    }

}
