<?php

namespace App\Entity;

use App\Repository\PerformerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PerformerRepository::class)
 */
class Performer
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
     * @ORM\OneToMany (targetEntity="App\Entity\Repairs", mappedBy="performer")
     */
    private $repair;

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
            $repair->setPerformer($this);
        }

        return $this;
    }

    public function removeRepair(Repairs $repair): self
    {
        if ($this->repair->contains($repair)) {
            $this->repair->removeElement($repair);
            // set the owning side to null (unless already changed)
            if ($repair->getPerformer() === $this) {
                $repair->setPerformer(null);
            }
        }

        return $this;
    }
}
