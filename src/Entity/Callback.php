<?php

namespace App\Entity;

use App\Repository\CallbackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 * @ORM\Entity(repositoryClass=CallbackRepository::class)
 
 * @ORM\Table(name="callback", indexes={@ORM\Index(columns={"lastname", "firstname", "message"}, flags={"fulltext"})})
 */
class Callback
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Ton prénom doit avoir minimum 2 caractères",
     *      maxMessage = "Ton prénom doit contenir maximum 50 caractères"
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Ton prénom doit avoir minimum 2 caractères",
     *      maxMessage = "Ton prénom doit contenir maximum 50 caractères"
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     * message = "L'email saisi n'est pas un email valide."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)    
     */
    private $phone;

   

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime('now');
    }
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $message;

    /**

     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity=Creneau::class, inversedBy="callback", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $creneau;
    
    
    
  
    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }



    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

  

    public function getCreneau(): ?Creneau
    {
        return $this->creneau;
    }

    public function setCreneau(Creneau $creneau): self
    {
        $this->creneau = $creneau;

        return $this;
    }



}
