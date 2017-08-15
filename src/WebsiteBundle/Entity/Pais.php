<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WebsiteBundle\Entity\Pais
 *
 * @ORM\Table(name="pais")
 * @ORM\Entity()
 */
class Pais {

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
     * @ORM\OneToMany(targetEntity="EnderecoFisico", mappedBy="pais")
     */
    protected $enderecos;
    
    /**
     * @ORM\OneToMany(targetEntity="UnidadeFederativa", mappedBy="pais")
     */
    protected $ufs;

    function __construct() {
        $this->ufs = new ArrayCollectionon();
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
     * Add enderecos
     *
     * @param WebsiteBundle\Entity\EnderecoFisico $enderecos
     */
    public function addEnderecoFisico(\WebsiteBundle\Entity\EnderecoFisico $enderecos) {
        $this->enderecos[] = $enderecos;
    }

    /**
     * Get enderecos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEnderecos() {
        return $this->enderecos;
    }
    
    public function getUfs() {
        return $this->ufs;
    }

    public function addUf(\WebsiteBundle\Entity\UnidadeFederativa $uf) {
        $this->uf[] = $ufs;
        return $this;
    }

}
