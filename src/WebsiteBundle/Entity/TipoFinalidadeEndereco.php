<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WebsiteBundle\Entity\TipoFinalidadeEndereco
 *
 * @ORM\Table(name="tipo_finalidade_endereco")
 * @ORM\Entity
 */
class TipoFinalidadeEndereco {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $descricao
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;
    
    /**
     * @ORM\OneToMany(targetEntity="EnderecoFisico", mappedBy="tipoFinalidadeEndereco")
     */
    protected $enderecos;

    function __construct() {
        $this->enderecos = new ArrayCollection();
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
     * Set descricao
     *
     * @param string $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao() {
        return $this->descricao;
    }


    /**
     * Add enderecos
     *
     * @param WebsiteBundle\Entity\EnderecoFisico $enderecos
     */
    public function addEnderecoFisico(\WebsiteBundle\Entity\EnderecoFisico $enderecos)
    {
        $this->enderecos[] = $enderecos;
    }

    /**
     * Get enderecos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }
}