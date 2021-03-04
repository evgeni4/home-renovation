<?php


namespace App\Service\ContactSettings;


use App\Entity\ContactSettings;

interface ContactSettingsServiceInterface
{
    public function getOneContactSettings(): ?ContactSettings;
}