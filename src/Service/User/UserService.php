<?php


namespace App\Service\User;


use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class UserService implements UserServiceInterface
{
 private $security;

    /**
     * UserService constructor.
     * @param $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function currentUser(): ?User
    {
        return $this->security->getUser();
    }
}