<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\PessoaJuridica
 *
 * @ORM\Table(name="pessoa_juridica")
 * @ORM\Entity
 * @UniqueEntity(fields="cnpj", message="Já existe um cadastro este CNPJ")
 */
class PessoaJuridica extends Pessoa {

    /**
     * @var string $cnpj
     * @Assert\NotBlank(message="É necessário informar um CNPJ")
     * @ORM\Column(name="cnpj", type="string", length=20, unique=true)
     */
    private $cnpj;

    /**
     * @var string $responsavel
     * @Assert\NotBlank(message="É necessário informar um responsável")
     * @ORM\Column(name="responsavel", type="string", length=255)
     */
    private $responsavel;

    /**
     * @var string $razaoSocial
     * @Assert\NotBlank(message="É necessário a razão social")
     * @ORM\Column(name="razaoSocial", type="string", length=255)
     */
    private $razaoSocial;

    /**
     * @var string $nomeFantasia
     * @Assert\NotBlank(message="É necessário informar o nome fantasia")
     * @ORM\Column(name="nomeFantasia", type="string", length=255)
     */
    private $nomeFantasia;

    /**
     * Set cnpj
     *
     * @param string $cnpj
     */
    public function setCnpj($cnpj) {
        $this->cnpj = preg_replace("/[^0-9+]/", "", $cnpj);
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj() {
        return $this->cnpj;
    }

    /**
     * Set responsavel
     *
     * @param string $responsavel
     */
    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    /**
     * Get responsavel
     *
     * @return string 
     */
    public function getResponsavel() {
        return $this->responsavel;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     */
    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    /**
     * Get razaoSocial
     *
     * @return string 
     */
    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    /**
     * Set nomeFantasia
     *
     * @param string $nomeFantasia
     */
    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    /**
     * Get nomeFantasia
     *
     * @return string 
     */
    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

}