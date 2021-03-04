<?php

namespace App\Entity;

use App\Repository\CalculatorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalculatorRepository::class)
 */
class Calculator
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $square;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSquare(): ?string
    {
        return $this->square;
    }

    public function setSquare(string $square): self
    {
        $this->square = $square;

        return $this;
    }
}
