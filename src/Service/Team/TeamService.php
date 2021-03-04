<?php


namespace App\Service\Team;


use App\Repository\TeamRepository;

class TeamService implements TeamServiceInterface
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function allTeam(): array
    {
    return $this->teamRepository->findAll();
    }
}