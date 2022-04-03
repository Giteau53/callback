<?php

namespace App\Entity;

use App\Repository\CallbackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CallbackRepository::class)
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
     */
    private $message;

    /**
     * @ORM\OneToOne(targetEntity=Creneau::class, inversedBy="creneau_id", cascade={"persist", "remove"})
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

    public function setDate(\DateTimeInterface $date): self
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

    public function getCreneau(): ?creneau
    {
        return $this->creneau;
    }

    public function setCreneau(creneau $creneau): self
    {
        $this->creneau = $creneau;

        return $this;
    }

    

  

   

  



   


}
