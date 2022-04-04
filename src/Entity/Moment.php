<?php

namespace App\Entity;

use App\Repository\MomentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MomentRepository::class)
 */
class Moment
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Creneau::class, mappedBy="moment")
     */
    private $creneaux;

    /**
     * @ORM\OneToMany(targetEntity=Callback::class, mappedBy="moment")
     */
    private $callback;

    public function __construct()
    {
        $this->creneaux = new ArrayCollection();
        $this->callback = new ArrayCollection();
    }

 



    public function getId(): ?int
    {
        return $this->id;
    }


    public function __toString()
    {
        return $this->getName();
        
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Creneau>
     */
    public function getCreneaux(): Collection
    {
        return $this->creneaux;
    }

    public function addCreneaux(Creneau $creneaux): self
    {
        if (!$this->creneaux->contains($creneaux)) {
            $this->creneaux[] = $creneaux;
            $creneaux->setMoment($this);
        }

        return $this;
    }

    public function removeCreneaux(Creneau $creneaux): self
    {
        if ($this->creneaux->removeElement($creneaux)) {
            // set the owning side to null (unless already changed)
            if ($creneaux->getMoment() === $this) {
                $creneaux->setMoment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, callback>
     */
    public function getCallback(): Collection
    {
        return $this->callback;
    }

  

  

    
}
