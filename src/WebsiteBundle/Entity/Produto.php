<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WebsiteBundle\Entity\ProdutoServico;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity
 */
class Produto extends ProdutoServico {

    /**
     * @var integer
     *
     * @ORM\Column(name="tributacao", type="integer")
     */
    private $tributacao;

    /**
     * Set tributacao
     *
     * @param integer $tributacao
     * @return Produto
     */
    public function setTributacao($tributacao) {
        $this->tributacao = $tributacao;

        return $this;
    }

    /**
     * Get tributacao
     *
     * @return integer 
     */
    public function getTributacao() {
        return $this->tributacao;
    }

}
