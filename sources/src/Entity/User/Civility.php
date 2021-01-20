<?php

declare(strict_types=1);

namespace App\Entity\User;

class Civility
{
    private string $lastname;
    private string $firstname;

    public function __construct(string $lastname, string $firstname)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }
}