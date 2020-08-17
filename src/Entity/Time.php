<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\TimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TimeRepository::class)
 */
class Time
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
	 * @Groups({"locr"})
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
	 * @Groups({"locr"})
     * @ORM\Column(type="integer")
     */
    private $quarter;

    /**
     * @ORM\OneToMany(targetEntity=Locr::class, mappedBy="time")
     */
    private $locrs;

    public function __construct()
    {
        $this->locrs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getQuarter(): ?int
    {
        return $this->quarter;
    }

    public function setQuarter(int $quarter): self
    {
        $this->quarter = $quarter;

        return $this;
    }

    /**
     * @return Collection|Locr[]
     */
    public function getLocrs(): Collection
    {
        return $this->locrs;
    }

    public function addLocr(Locr $locr): self
    {
        if (!$this->locrs->contains($locr)) {
            $this->locrs[] = $locr;
            $locr->setTime($this);
        }

        return $this;
    }

    public function removeLocr(Locr $locr): self
    {
        if ($this->locrs->contains($locr)) {
            $this->locrs->removeElement($locr);
            // set the owning side to null (unless already changed)
            if ($locr->getTime() === $this) {
                $locr->setTime(null);
            }
        }

        return $this;
    }
}
