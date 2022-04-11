<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;




/**
 * 
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
     * @ORM\ManyToOne(targetEntity=Moment::class, inversedBy="creneaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $moment;

    /**
     * @ORM\OneToOne(targetEntity=Callback::class, mappedBy="creneau", cascade={"persist", "remove"})
     * 
     */
    private $callback;

 

 

    public function __construct()
    {
        $this->time = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getCreneau();
        
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

    public function getMoment(): ?moment
    {
        return $this->moment;
    }

    public function setMoment(?moment $moment): self
    {
        $this->moment = $moment;

        return $this;
    }

    public function getCallback(): ?Callback
    {
        return $this->callback;
    }

    public function setCallback(Callback $callback): self
    {
        // set the owning side of the relation if necessary
        if ($callback->getCreneau() !== $this) {
            $callback->setCreneau($this);
        }

        $this->callback = $callback;

        return $this;
    }

    



   
    

    

 

 

   
   

  









}
