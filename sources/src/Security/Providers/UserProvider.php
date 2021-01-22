<?php

declare(strict_types=1);

namespace App\Security\Providers;

use App\Entity\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private array $users;

    public function __construct()
    {
        $this->users = [
            'toto@test.com' => new User('toto@test.com', 'toto'),
            'titi@test.com' => new User('titi@test.com', 'titi', ['ROLE_ADMIN']),
        ];
    }

    public function loadUserByUsername(string $username): UserInterface
    {
        if(!isset($this->users[$username])) {
            throw new UsernameNotFoundException(sprintf('%s can not be found', $username));
        }

        return $this->users[$username];
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        return $user;
    }

    public function supportsClass(string $class): bool
    {
        return $class === User::class;
    }
}