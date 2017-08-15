<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanoProdutoLimite
 *
 * @ORM\Table(name="plano_produto_limite")
 * @ORM\Entity
 */
class PlanoProdutoLimite {

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
     * @ORM\Column(name="quantidade", type="integer")
     */
    private $quantidade;
    
    /**
     * @ORM\ManyToOne(targetEntity="PlanoProduto", inversedBy="limites")
     * @ORM\JoinColumn(name="planoproduto_id", referencedColumnName="id")
     */
    protected $planoProduto;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadeMedida", inversedBy="planoProdutoLimites")
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
     * Set quantidade
     *
     * @param integer $quantidade
     * @return PlanoProdutoLimite
     */
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade() {
        return $this->quantidade;
    }
    
    public function getPlanoProduto() {
        return $this->planoProduto;
    }

    public function setPlanoProduto(\WebsiteBundle\Entity\PlanoProduto $planoProduto) {
        $this->planoProduto = $planoProduto;
    }
    
    public function getUnidadeMedida() {
        return $this->unidadeMedida;
    }

    public function setUnidadeMedida(\WebsiteBundle\Entity\UnidadeMedida $unidadeMedida) {
        $this->unidadeMedida = $unidadeMedida;
    }

}
