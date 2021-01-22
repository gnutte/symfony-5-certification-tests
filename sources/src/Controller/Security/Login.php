<?php

declare(strict_types=1);

namespace App\Controller\Security;

use App\Form\LoginFormType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * @Route(path="/login", name="front_login")
 */
class Login
{
    private Environment $twig;
    private FormFactoryInterface $formFactory;

    public function __construct(Environment $twig, FormFactoryInterface $formFactory)
    {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    public function __invoke(AuthenticationUtils $authenticationUtils): Response
    {
        $form = $this->formFactory->create(LoginFormType::class, [
            'email' => $authenticationUtils->getLastUsername()
        ]);

        $error = $authenticationUtils->getLastAuthenticationError();
        if(null !== $error) {
            $form->addError(new FormError($error->getMessage()));
        }

        return new Response($this->twig->render('security/login.html.twig', ['form' => $form->createView()]));
    }
}