<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/profile")
 */
class Profile
{
    public function __invoke(): Response
    {
        return new Response('Profile page');
    }
}