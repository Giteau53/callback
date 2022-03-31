<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreneauRepository::class)
 */
class Creneau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $creneau;

    /**
     * @ORM\OneToMany(targetEntity=Callback::class, mappedBy="creneau")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moment;

  

    public function __construct()
    {
        $this->time = new ArrayCollection();
    }

   
  

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreneau(): ?string
    {
        return $this->creneau;
    }

    public function setCreneau(string $creneau): self
    {
        $this->creneau = $creneau;

        return $this;
    }

    public function __toString()
    {
        return $this->getCreneau();
    }

   
    public function getTime(): Collection
    {
        return $this->time;
    }

    

    public function getMoment(): ?string
    {
        return $this->moment;
    }

    public function setMoment(string $moment): self
    {
        $this->moment = $moment;

        return $this;
    }









}
