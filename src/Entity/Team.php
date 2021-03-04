<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 * @Vich\Uploadable
 */
class Team
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
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="array")
     */
    private $specially = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageThumbs;
    /**
     * @Vich\UploadableField (mapping="team_image", fileNameProperty="imageThumbs")
     */
    private $thumbnailFile;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSpecially(): ?array
    {
        return $this->specially;
    }

    public function setSpecially(array $specially): self
    {
        $this->specially = $specially;

        return $this;
    }

    public function getImageThumbs(): ?string
    {
        return $this->imageThumbs;
    }

    public function setImageThumbs(?string $imageThumbs): self
    {
        $this->imageThumbs = $imageThumbs;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param mixed $thumbnailFile
     */
    public function setThumbnailFile($thumbnailFile): void
    {
        $this->thumbnailFile = $thumbnailFile;
    }

}
