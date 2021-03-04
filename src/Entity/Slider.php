<?php

namespace App\Entity;

use App\Repository\SliderRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=SliderRepository::class)
 * @Vich\Uploadable
 */
class Slider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $title = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $smallImage;
    /**
     * @Vich\UploadableField (mapping="slider_image", fileNameProperty="smallImage")
     */
    private $smallImageFile;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?array
    {
        return $this->title;
    }

    public function setTitle(array $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSmallImage(): ?string
    {
        return $this->smallImage;
    }

    public function setSmallImage(?string $smallImage): self
    {
        $this->smallImage = $smallImage;

        return $this;
    }


    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSmallImageFile()
    {
        return $this->smallImageFile;
    }

    /**
     * @param mixed $smallImageFile
     */
    public function setSmallImageFile($smallImageFile): void
    {
        $this->smallImageFile = $smallImageFile;
    }





}
