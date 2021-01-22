<?php

declare(strict_types=1);

namespace App\Entity\User;

use JsonSerializable;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, JsonSerializable
{
    private string $username;
    private ?string $password;
    private ?string $salt;
    private array $roles;

    public function __construct(string $username, string $password, array $roles = [])
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = random_bytes(5);
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        return $this->roles;
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

    public function jsonSerialize(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'roles' => $this->roles
        ];
    }
}