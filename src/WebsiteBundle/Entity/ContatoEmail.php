<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WebsiteBundle\Entity\ContatoEmail
 *
 * @ORM\Table(name="contato_email")
 * @ORM\Entity
 */
class ContatoEmail {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $email
     *
     * @Assert\Email(
     *     message = "O email '{{ value }}' não é válido.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean $validado
     *
     * @ORM\Column(name="validado", type="boolean", nullable=true)
     */
    private $validado;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="emails")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    protected $pessoa;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set validado
     *
     * @param boolean $validado
     */
    public function setValidado($validado) {
        $this->validado = $validado;
    }

    /**
     * Get validado
     *
     * @return boolean 
     */
    public function getValidado() {
        return $this->validado;
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

}