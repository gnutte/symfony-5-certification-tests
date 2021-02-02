<?php

declare(strict_types=1);

namespace App\Security;

use App\Controller\Security\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    protected function getLoginUrl(): string
    {
        return $this->urlGenerator->generate(Login::ROUTE_NAME);
    }

    public function supports(Request $request): bool
    {
        return $request->isMethod(Request::METHOD_POST)
            && Login::ROUTE_NAME === $request->attributes->get('_route');
    }

    public function getCredentials(Request $request)
    {
        dd($request);
    }

    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {

    }

    public function checkCredentials($credentials, UserInterface $user): bool
    {

    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): ?Response
    {

    }
}