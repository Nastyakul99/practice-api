<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\LocrRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LocrRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"worker.name": "exact","worker.surname": "exact","time.year": "exact","time.quarter": "exact"})
 */
class Locr
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
    private $file;

    /**
	 * @Groups({"locr","worker"})
     * @ORM\Column(type="float")
     */
    private $statistics;

    /**
	 * @Groups({"locr","worker"})
     * @ORM\Column(type="integer")
     */
    private $mark;

    /**
	 * @Groups({"locr"})
     * @ORM\ManyToOne(targetEntity=Worker::class, inversedBy="locrs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $worker;

    /**
	 * @Groups({"locr"})
     * @ORM\ManyToOne(targetEntity=Time::class, inversedBy="locrs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getStatistics(): ?float
    {
        return $this->statistics;
    }

    public function setStatistics(float $statistics): self
    {
        $this->statistics = $statistics;

        return $this;
    }

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getWorker(): ?Worker
    {
        return $this->worker;
    }

    public function setWorker(?Worker $worker): self
    {
        $this->worker = $worker;

        return $this;
    }

    public function getTime(): ?Time
    {
        return $this->time;
    }

    public function setTime(?Time $time): self
    {
        $this->time = $time;

        return $this;
    }
}
