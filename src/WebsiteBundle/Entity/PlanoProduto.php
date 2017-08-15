<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PlanoProduto
 *
 * @ORM\Table(name="plano_produto")
 * @ORM\Entity
 */
class PlanoProduto {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Plano", inversedBy="pedidos")
     * @ORM\JoinColumn(name="plano_id", referencedColumnName="id")
     */
    protected $plano;
    
    /**
     * @ORM\OneToMany(targetEntity="PlanoProdutoLimite", mappedBy="planoProduto") 
     */
    protected $limites;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProdutoServico", inversedBy="planoProduto")
     * @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     */
    protected $produto;
    
    function __construct() {
        $this->limites = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    public function getPlano() {
        return $this->plano;
    }

    public function setPlano(\WebsiteBundle\Entity\Plano $plano) {
        $this->plano = $plano;
    }
    
    public function getLimites() {
        return $this->limites;
    }

    public function addLimite(\WebsiteBundle\Entity\PlanoProdutoLimite $limite) {
        $this->limites[] = $limite;
    }
    
    public function getProduto() {
        return $this->produto;
    }

    public function setProduto(\WebsiteBundle\Entity\ProdutoServico $produto) {
        $this->produto = $produto;
    }

}
