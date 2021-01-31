<?php

use App\Model\User as CustomUser;
use App\Security\UserProvider as CustomUserProvider;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\User\ChainUserProvider;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserChecker;

require_once 'vendor/autoload.php';
require_once 'src/Model/User.php';
require_once 'src/Security/UserProvider.php';

$passwordEncoder = new MessageDigestPasswordEncoder('sha512', true, 5000);
$userProviders = new ChainUserProvider([
    new InMemoryUserProvider([
        'admin' => ['password' => $passwordEncoder->encodePassword('foo', null), 'roles' => ['ROLE_ADMIN']]
    ]),
    new CustomUserProvider()
]);
$userChecker = new UserChecker();

$encoders = [User::class => $passwordEncoder, CustomUser::class => $passwordEncoder];
$encoderFactory = new EncoderFactory($encoders);

$authenticationProvider = new DaoAuthenticationProvider(
    $userProviders,
    $userChecker,
    'main',
    $encoderFactory
);

$authenticationProviderManager = new AuthenticationProviderManager([$authenticationProvider]);

dump(
    $authenticationProviderManager->authenticate(
        new UsernamePasswordToken('admin', 'foo', 'main')
    )
);

dump(
    $authenticationProviderManager->authenticate(
        new UsernamePasswordToken('user', 'bar', 'main')
    )
);