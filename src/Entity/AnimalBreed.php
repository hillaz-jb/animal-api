<?php

namespace App\Entity;

use App\Repository\AnimalBreedRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalBreedRepository::class)]
class AnimalBreed
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'breeds')]
    #[ORM\JoinColumn(nullable: false)]
    private $animal;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Breed::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $breed;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
