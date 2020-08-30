<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
class Vehicle
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $added_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="vehicle")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Repairs", mappedBy="vehicle")
     */
    private $repair;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Institution", inversedBy="vehicle")
     */
    private $institution;

    public function __construct()
    {
        $this->repair = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAddedBy(): ?string
    {
        return $this->added_by;
    }

    public function setAddedBy(string $added_by): self
    {
        $this->added_by = $added_by;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeInterface
    {
        return $this->added_at;
    }

    public function setAddedAt(\DateTimeInterface $added_at): self
    {
        $this->added_at = $added_at;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Repairs[]
     */
    public function getRepair(): Collection
    {
        return $this->repair;
    }

    public function addRepair(Repairs $repair): self
    {
        if (!$this->repair->contains($repair)) {
            $this->repair[] = $repair;
            $repair->setVehicle($this);
        }

        return $this;
    }

    public function removeRepair(Repairs $repair): self
    {
        if ($this->repair->contains($repair)) {
            $this->repair->removeElement($repair);
            // set the owning side to null (unless already changed)
            if ($repair->getVehicle() === $this) {
                $repair->setVehicle(null);
            }
        }

        return $this;
    }

    public function getInstitution(): ?Institution
    {
        return $this->institution;
    }

    public function setInstitution(?Institution $institution): self
    {
        $this->institution = $institution;

        return $this;
    }
}
