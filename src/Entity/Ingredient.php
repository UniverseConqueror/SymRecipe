<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use DateTimeImmutable;


/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom d'ingrédient doit comporter {{ limit }} caractères minimum",
     *      maxMessage = "Votre nom d'ingrédient doit comporter {{ limit }} caractères maximum"
     * )
     * 
     * @ORM\Column(type="string", length=50)
     */
    private string $name;

    /**
     * @Assert\NotNull
     * @Assert\Positive
     * @Assert\LessThan(200)
     * 
     * @ORM\Column(type="float")
     */
    private float $price;

    /**
     * @Assert\NotNull
     * 
     * @ORM\Column(type="datetime_immutable")
     */
    private ?DateTimeImmutable $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
