<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\PessoaFisica
 *
 * @ORM\Table(name="pessoa_fisica")
 * @ORM\Entity
 * @UniqueEntity(fields="cpf", message="Já existe um cadastro este CPF")
 */
class PessoaFisica extends Pessoa {

    /**
     * @var string $nomeFantasiaPf
     * @|ORM\Column(name="nomeFantasiaPf", type="string", length=255, nullable=true)
     
    private $nomeFantasiaPf;*/
    
    /**
     * @var string $cpf
     * @Assert\NotBlank(message="É necessário informar um CPF")
     * @ORM\Column(name="cpf", type="string", length=11, unique=true)
     */
    private $cpf;

    /**
     * @var string $rg
     * @Assert\NotBlank(message="É necessário informar um RG")
     * @ORM\Column(name="rg", type="string", length=20)
     */
    private $rg;
    
    /**
     * @var string $dataNascimento
     * @ORM\Column(name="dataNascimento", type="date", nullable=true)
     */
    private $dataNascimento;

    /**
     * Set cpf
     *
     * @param string $cpf
     */
    public function setCpf($cpf) {
        $this->cpf = preg_replace("/[^0-9+]/", "", $cpf);
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Set rg
     *
     * @param string $rg
     */
    public function setRg($rg) {
        $this->rg = $rg;
    }

    /**
     * Get rg
     *
     * @return string 
     */
    public function getRg() {
        return $this->rg;
    }
    
    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpfFormatado(){
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/",'$1.$2.$3-$4', $this->getCpf());
    }
    
    public function getNomeFantasiaPf() {
        return $this->nomeFantasiaPf;
    }

    public function setNomeFantasiaPf($nomeFantasiaPf) {
        $this->nomeFantasiaPf = $nomeFantasiaPf;
    }



}