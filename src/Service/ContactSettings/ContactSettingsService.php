<?php


namespace App\Service\ContactSettings;


use App\Entity\ContactSettings;
use App\Repository\ContactSettingsRepository;

class ContactSettingsService implements ContactSettingsServiceInterface
{
 private ContactSettingsRepository $contactSettingsRepository;

    public function __construct(ContactSettingsRepository $contactSettingsRepository)
    {
        $this->contactSettingsRepository = $contactSettingsRepository;
    }

    public function getOneContactSettings(): ?ContactSettings
    {
        return $this->contactSettingsRepository->findOneBy(['id'=>1]);
    }
}