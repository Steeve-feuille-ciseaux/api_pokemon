<?php

namespace App\Entity;

use App\Repository\PokedexRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: PokedexRepository::class)]
#[ApiResource]
class Pokedex
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type1 = null;

    #[ORM\Column(length: 255)]
    private ?string $type2 = null;

    #[ORM\Column(length: 255)]
    private ?string $total = null;

    #[ORM\Column(length: 255)]
    private ?string $hp = null;

    #[ORM\Column(length: 255)]
    private ?string $attack = null;

    #[ORM\Column(length: 255)]
    private ?string $defense = null;

    #[ORM\Column(length: 255)]
    private ?string $spatk = null;

    #[ORM\Column(length: 255)]
    private ?string $spdef = null;

    #[ORM\Column(length: 255)]
    private ?string $speed = null;

    #[ORM\Column(length: 255)]
    private ?string $generation = null;

    #[ORM\Column(length: 255)]
    private ?string $legendary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
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

    public function getType1(): ?string
    {
        return $this->type1;
    }

    public function setType1(string $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type2;
    }

    public function setType2(string $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getHp(): ?string
    {
        return $this->hp;
    }

    public function setHp(string $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAttack(): ?string
    {
        return $this->attack;
    }

    public function setAttack(string $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?string
    {
        return $this->defense;
    }

    public function setDefense(string $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpatk(): ?string
    {
        return $this->spatk;
    }

    public function setSpatk(string $spatk): self
    {
        $this->spatk = $spatk;

        return $this;
    }

    public function getSpdef(): ?string
    {
        return $this->spdef;
    }

    public function setSpdef(string $spdef): self
    {
        $this->spdef = $spdef;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getGeneration(): ?string
    {
        return $this->generation;
    }

    public function setGeneration(string $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getLegendary(): ?string
    {
        return $this->legendary;
    }

    public function setLegendary(string $legendary): self
    {
        $this->legendary = $legendary;

        return $this;
    }
}
