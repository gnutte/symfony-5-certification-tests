<?php

declare(strict_types=1);

namespace App\Controller\Security;

use App\Form\LoginFormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * @Route(name="Login::ROUTE_NAME", path="/login")
 */
class Login
{
    public const ROUTE_NAME = 'login';

    private FormFactoryInterface $formFactory;
    private Environment $twig;

    public function __construct(FormFactoryInterface $formFactory, Environment $twig)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
    }

    public function __invoke(AuthenticationUtils $authenticationUtils): Response
    {
        $loginForm = $this->formFactory->create(LoginFormType::class, ['username' => $authenticationUtils->getLastUsername()]);
        $content = $this->twig->render('security/login.html.twig', ['form' => $loginForm->createView()]);

        return new Response($content);
    }
}