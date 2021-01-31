<?php

declare(strict_types=1);

namespace App\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $username;
    private $password;
    private $salt;

    public function __construct(string $username, string $password, ?string $salt = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): void
    {
        $this->password = null;
    }
}