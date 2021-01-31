<?php
declare(strict_types=1);

namespace App\Security;

use App\Model\User;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $existingUsers;

    public function __construct()
    {
        $this->existingUsers = [
            'user' => new User('user', 'QErG3AURzMJwBfdwPJFmpwgf8/CSx14szNDpc5SrbING21SiO2rPyxHfjh5i06AxHGY13/6w+ymPBCV+NGADVQ==', 'salt')
        ];
    }

    public function loadUserByUsername(string $username): UserInterface
    {
        if(!isset($this->existingUsers[$username])) {
            throw new UsernameNotFoundException('Username not found');
        }

        return $this->existingUsers[$username];
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $user;
    }

    public function supportsClass(string $class): bool
    {
        return $class === User::class;
    }
}