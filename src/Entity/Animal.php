<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\AnimalRepository;
use App\Repository\OwnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: AnimalRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get',
        'post' => [
            "security" => "is_granted('ROLE_ADMIN_ANIMAL')"
        ],
    ],
    itemOperations: [
        'get',
        'put' => ["security" => "is_granted('ROLE_ADMIN_ANIMAL')"],
        'delete' => ["security" => "is_granted('ROLE_ADMIN_ANIMAL')"]
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ['id'])]
#[ApiFilter(ExistsFilter::class, properties: ['owner'])]
class Animal
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank, Assert\Length(min: 2, max: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Owner::class, inversedBy: 'animals')]

    private $owner;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $gender;

    #[ORM\OneToMany(mappedBy: 'animal', targetEntity: AnimalBreed::class)]
    private $breeds;

    public function __construct()
    {
        $this->breeds = new ArrayCollection();
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

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Collection|Breed[]
     */
    public function getBreeds(): Collection
    {
        return $this->breeds;
    }

    public function addBreed(Breed $breed): self
    {
        if (!$this->breeds->contains($breed)) {
            $this->breeds[] = $breed;
        }

        return $this;
    }

    public function removeBreed(Breed $breed): self
    {
        $this->breeds->removeElement($breed);

        return $this;
    }

}
