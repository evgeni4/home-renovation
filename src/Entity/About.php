<?php

namespace App\Entity;

use App\Repository\AboutRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AboutRepository::class)
 */
class About
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $descriptionPage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $keywords;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $titleTop;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $descriptionTop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescriptionPage(): ?string
    {
        return $this->descriptionPage;
    }

    public function setDescriptionPage(string $descriptionPage): self
    {
        $this->descriptionPage = $descriptionPage;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitleTop(): ?string
    {
        return $this->titleTop;
    }

    public function setTitleTop(string $titleTop): self
    {
        $this->titleTop = $titleTop;

        return $this;
    }

    public function getDescriptionTop(): ?string
    {
        return $this->descriptionTop;
    }

    public function setDescriptionTop(string $descriptionTop): self
    {
        $this->descriptionTop = $descriptionTop;

        return $this;
    }
}
