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

    /**
     * @ORM\OneToOne(targetEntity=Callback::class, mappedBy="creneau", cascade={"persist", "remove"})
     */
    private $callback;

  
    /**
     * @ORM\OneToOne(targetEntity=Callback::class, mappedBy="creneau", cascade={"persist", "remove"})
     */
    private $creneau_id;

    /**
     * @ORM\OneToOne(targetEntity=Callback::class, mappedBy="moment", cascade={"persist", "remove"})
     */
    private $part;

  

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

    public function getCallback(): ?Callback
    {
        return $this->callback;
    }

    public function getCreneauId(): ?Callback
    {
        return $this->creneau_id;
    }

    public function setCreneauId(Callback $creneau_id): self
    {
        // set the owning side of the relation if necessary
        if ($creneau_id->getCreneau() !== $this) {
            $creneau_id->setCreneau($this);
        }

        $this->creneau_id = $creneau_id;

        return $this;
    }

    public function getPart(): ?Callback
    {
        return $this->part;
    }

    public function setPart(Callback $part): self
    {
        // set the owning side of the relation if necessary
        if ($part->getMoment() !== $this) {
            $part->setMoment($this);
        }

        $this->part = $part;

        return $this;
    }

  









}
