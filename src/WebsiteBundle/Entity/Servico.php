<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WebsiteBundle\Entity\ProdutoServico;

/**
 * Servico
 *
 * @ORM\Table(name="servico")
 * @ORM\Entity
 */
class Servico extends ProdutoServico {
}
