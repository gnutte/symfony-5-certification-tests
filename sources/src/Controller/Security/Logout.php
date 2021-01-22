<?php

declare(strict_types=1);

namespace App\Controller\Security;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/logout", name="front_logout")
 */
class Logout
{
    public function __invoke()
    {
        throw new \LogicException('');
    }
}