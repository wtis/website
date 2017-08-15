<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteBundle\Entity\EnderecoFisico
 *
 * @ORM\Table(name="pessoa_endereco_fisico")
 * @ORM\Entity
 */
class EnderecoFisico {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $logradouro
     *
     * @ORM\Column(name="logradouro", type="string", length=255)
     */
    private $logradouro;

    /**
     * @var string $complemento
     *
     * @ORM\Column(name="complemento", type="string", length=255, nullable=true)
     */
    private $complemento;

    /**
     * @var string $numero
     *
     * @ORM\Column(name="numero", type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @var string $bairro
     *
     * @ORM\Column(name="bairro", type="string", length=255)
     */
    private $bairro;

    /**
     * @var integer $cep
     *
     * @ORM\Column(name="cep", type="string", length=8)
     */
    private $cep;

    /**
     * @var integer $nomeCidadeExterior
     *
     * @ORM\Column(name="nomeCidadeExterior", type="string", length=255, nullable=true)
     */
    private $nomeCidadeExterior;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="enderecos")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    protected $pessoa;

    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="enderecos")
     * @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     */
    protected $pais;

    /**
     * @ORM\ManyToOne(targetEntity="TipoFinalidadeEndereco", inversedBy="enderecos")
     * @ORM\JoinColumn(name="tipo_finalidade_id", referencedColumnName="id")
     */
    protected $tipoFinalidadeEndereco;

    /**
     * @ORM\ManyToOne(targetEntity="Municipio", inversedBy="enderecos")
     * @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     */
    protected $municipio;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     */
    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    /**
     * Get logradouro
     *
     * @return string 
     */
    public function getLogradouro() {
        return $this->logradouro;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     */
    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento() {
        return $this->complemento;
    }

    /**
     * Set numero
     *
     * @param string $numero
     */
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     */
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro() {
        return $this->bairro;
    }

    /**
     * Set cep
     *
     * @param integer $cep
     */
    public function setCep($cep) {
        $this->cep = preg_replace("/[^0-9]/", "", $cep);
    }

    /**
     * Get cep
     *
     * @return integer 
     */
    public function getCep() {
        return $this->cep;
    }

    /**
     * Set nomeCidadeExterior
     *
     * @param integer $nomeCidadeExterior
     */
    public function setNomeCidadeExterior($nomeCidadeExterior) {
        $this->nomeCidadeExterior = $nomeCidadeExterior;
    }

    /**
     * Get nomeCidadeExterior
     *
     * @return integer 
     */
    public function getNomeCidadeExterior() {
        return $this->nomeCidadeExterior;
    }

    /**
     * Set pessoa
     *
     * @param WebsiteBundle\Entity\Pessoa $pessoa
     */
    public function setPessoa(\WebsiteBundle\Entity\Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    /**
     * Get pessoa
     *
     * @return WebsiteBundle\Entity\Pessoa
     */
    public function getPessoa() {
        return $this->pessoa;
    }

    /**
     * Set pais
     *
     * @param WebsiteBundle\Entity\Pais $pais
     */
    public function setPais(\WebsiteBundle\Entity\Pais $pais) {
        $this->pais = $pais;
    }

    /**
     * Get pais
     *
     * @return WebsiteBundle\Entity\Pais
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * Set tipoFinalidadeEndereco
     *
     * @param WebsiteBundle\Entity\TipoFinalidadeEndereco $tipoFinalidadeEndereco
     */
    public function setTipoFinalidadeEndereco(\WebsiteBundle\Entity\TipoFinalidadeEndereco $tipoFinalidadeEndereco) {
        $this->tipoFinalidadeEndereco = $tipoFinalidadeEndereco;
    }

    /**
     * Get tipoFinalidadeEndereco
     *
     * @return WebsiteBundle\Entity\TipoFinalidadeEndereco
     */
    public function getTipoFinalidadeEndereco() {
        return $this->tipoFinalidadeEndereco;
    }

    /**
     * Set municipio
     *
     * @param WebsiteBundle\Entity\Municipio $municipio
     */
    public function setMunicipio(\WebsiteBundle\Entity\Municipio $municipio) {
        $this->municipio = $municipio;
    }

    /**
     * Get municipio
     *
     * @return WebsiteBundle\Entity\Municipio
     */
    public function getMunicipio() {
        return $this->municipio;
    }
    
    public function getEnderecoCompleto(){
        return $this->logradouro.', '.$this->numero.' '.$this->complemento.', '.$this->bairro;
    }

}