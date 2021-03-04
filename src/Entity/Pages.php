<?php

namespace App\Entity;

use App\Repository\PagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PagesRepository::class)
 */
class Pages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="pages")
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionPage;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $services = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescriptionPage(): ?string
    {
        return $this->descriptionPage;
    }

    public function setDescriptionPage(?string $descriptionPage): self
    {
        $this->descriptionPage = $descriptionPage;

        return $this;
    }

    public function getServices(): ?array
    {
        return $this->services;
    }

    public function setServices(?array $services): self
    {
        $this->services = $services;

        return $this;
    }
}
