<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnidadeMedidaRegra
 *
 * @ORM\Table(name="unidade_medida_regra")
 * @ORM\Entity
 */
class UnidadeMedidaRegra {

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
     * @ORM\Column(name="parametro", type="string", length=255)
     */
    private $parametro;

    /**
     * @var string
     *
     * @ORM\Column(name="retorno", type="string", length=255)
     */
    private $retorno;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadeMedida", inversedBy="regras")
     * @ORM\JoinColumn(name="unidademedida_id", referencedColumnName="id")
     */
    protected $unidadeMedida;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set parametro
     *
     * @param string $parametro
     * @return UnidadeMedidaRegra
     */
    public function setParametro($parametro) {
        $this->parametro = $parametro;

        return $this;
    }

    /**
     * Get parametro
     *
     * @return string 
     */
    public function getParametro() {
        return $this->parametro;
    }

    /**
     * Set retorno
     *
     * @param string $retorno
     * @return UnidadeMedidaRegra
     */
    public function setRetorno($retorno) {
        $this->retorno = $retorno;

        return $this;
    }

    /**
     * Get retorno
     *
     * @return string 
     */
    public function getRetorno() {
        return $this->retorno;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return UnidadeMedidaRegra
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return UnidadeMedidaRegra
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo() {
        return $this->ativo;
    }
    
    public function getUnidadeMedida() {
        return $this->unidadeMedida;
    }

    public function setUnidadeMedida(\WebsiteBundle\Entity\UnidadeMedida $unidadeMedida) {
        $this->unidadeMedida = $unidadeMedida;
    }

}
