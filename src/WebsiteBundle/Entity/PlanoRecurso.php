<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanoRecurso
 *
 * @ORM\Table(name="plano_recurso")
 * @ORM\Entity
 */
class PlanoRecurso {

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
     * @ORM\Column(name="sigla", type="string", length=255)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=255)
     */
    private $valor;
    
    /**
     * @ORM\ManyToOne(targetEntity="Plano", inversedBy="recorrencia")
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
     * Set sigla
     *
     * @param string $sigla
     * @return PlanoRecurso
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
     * Set nome
     *
     * @param string $nome
     * @return PlanoRecurso
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
     * Set descricao
     *
     * @param string $descricao
     * @return PlanoRecurso
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
     * Set valor
     *
     * @param string $valor
     * @return PlanoRecurso
     */
    public function setValor($valor) {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor() {
        return $this->valor;
    }
    
    public function getPlano() {
        return $this->plano;
    }

    public function setPlano(\WebsiteBundle\Entity\Plano $plano) {
        $this->plano = $plano;
    }

}
