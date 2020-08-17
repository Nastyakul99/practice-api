<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\WorkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=WorkerRepository::class)
 */
class Worker
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"worker"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"worker"})
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @Groups({"worker"})
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Locr::class, mappedBy="worker")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

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
            $locr->setWorker($this);
        }

        return $this;
    }

    public function removeLocr(Locr $locr): self
    {
        if ($this->locrs->contains($locr)) {
            $this->locrs->removeElement($locr);
            // set the owning side to null (unless already changed)
            if ($locr->getWorker() === $this) {
                $locr->setWorker(null);
            }
        }

        return $this;
    }
}
