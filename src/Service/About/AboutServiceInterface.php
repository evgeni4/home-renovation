<?php


namespace App\Service\About;


use App\Entity\About;

interface AboutServiceInterface
{
    public function getOneAbout(int $id): ?About;
}