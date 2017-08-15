<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanoRecorrencia
 *
 * @ORM\Table(name="plano_recorrencia")
 * @ORM\Entity
 */
class PlanoRecorrencia {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="recorrencia", type="integer")
     */
    private $recorrencia;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
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
     * Set recorrencia
     *
     * @param integer $recorrencia
     * @return PlanoRecorrencia
     */
    public function setRecorrencia($recorrencia) {
        $this->recorrencia = $recorrencia;

        return $this;
    }

    /**
     * Get recorrencia
     *
     * @return integer 
     */
    public function getRecorrencia() {
        return $this->recorrencia;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return PlanoRecorrencia
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
