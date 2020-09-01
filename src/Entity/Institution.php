<?php

namespace App\Entity;

use App\Repository\InstitutionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstitutionRepository::class)
 */
class Institution
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column (type="string", length=10)
     */
    private $slug;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Vehicle", mappedBy="institution");
     */
    private $vehicle;

    public function __construct()
    {
        $this->vehicle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle[] = $vehicle;
            $vehicle->setInstitution($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicle->contains($vehicle)) {
            $this->vehicle->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getInstitution() === $this) {
                $vehicle->setInstitution(null);
            }
        }

        return $this;
    }
}
