<?php


namespace App\Service\About;


use App\Entity\About;
use App\Repository\AboutRepository;

class AboutService implements AboutServiceInterface
{
private $aboutRepository;

    public function __construct(AboutRepository $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function getOneAbout(int $id): ?About
    {
        return $this->aboutRepository->find($id);
    }
}