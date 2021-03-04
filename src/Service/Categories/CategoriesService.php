<?php


namespace App\Service\Categories;


use App\Repository\CategoriesRepository;

class CategoriesService implements CategoriesServiceInterface
{
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function allCategories(): array
    {
       return $this->categoriesRepository->findAll();
    }
}