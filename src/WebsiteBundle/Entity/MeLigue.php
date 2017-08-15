<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WebsiteBundle\Entity\Contato;

/**
 * MeLigue
 *
 * @ORM\Table(name="meligue")
 * @ORM\Entity
 */
class MeLigue extends Contato {

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicioAtendimento", type="datetime", nullable=true)
     */
    private $dataInicioAtendimento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFimAtendimento", type="datetime", nullable=true)
     */
    private $dataFimAtendimento;

    /**
     * @var string
     *
     * @ORM\Column(name="observacaoInterna", type="text", nullable=true)
     */
    private $observacaoInterna;

    /**
     * @var integer
     *
     * @ORM\Column(name="status2", type="integer")
     */
    private $status2;

    /**
     * Set dataInicioAtendimento
     *
     * @param \DateTime $dataInicioAtendimento
     * @return MeLigue
     */
    public function setDataInicioAtendimento($dataInicioAtendimento) {
        $this->dataInicioAtendimento = $dataInicioAtendimento;

        return $this;
    }

    /**
     * Get dataInicioAtendimento
     *
     * @return \DateTime 
     */
    public function getDataInicioAtendimento() {
        return $this->dataInicioAtendimento;
    }

    /**
     * Set dataFimAtendimento
     *
     * @param \DateTime $dataFimAtendimento
     * @return MeLigue
     */
    public function setDataFimAtendimento($dataFimAtendimento) {
        $this->dataFimAtendimento = $dataFimAtendimento;

        return $this;
    }

    /**
     * Get dataFimAtendimento
     *
     * @return \DateTime 
     */
    public function getDataFimAtendimento() {
        return $this->dataFimAtendimento;
    }

    /**
     * Set observacaoInterna
     *
     * @param string $observacaoInterna
     * @return MeLigue
     */
    public function setObservacaoInterna($observacaoInterna) {
        $this->observacaoInterna = $observacaoInterna;

        return $this;
    }

    /**
     * Get observacaoInterna
     *
     * @return string 
     */
    public function getObservacaoInterna() {
        return $this->observacaoInterna;
    }

    /**
     * Set status
     *
     * @param integer $status2
     * 0=Aguardando operador
     * 1=Em atendimento
     * 2=Finalizado
     * 3=Falha no contato
     * @return MeLigue
     */
    public function setStatus2($status2) {
        $this->status2 = $status2;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus2() {
        return $this->status2;
    }

}
