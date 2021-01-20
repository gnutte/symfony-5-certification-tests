<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\Address\Address;

class User
{
    private Civility $civlity;
    private ?Address $address;
    private array $friends;

    public function __construct(string $firstname, string $lastname)
    {
        $this->civlity = new Civility($firstname, $lastname);
        $this->address = null;
        $this->friends = [];
    }

    public function addFriend(User $user): self
    {
        $this->friends[] = $user;
        return $this;
    }
}