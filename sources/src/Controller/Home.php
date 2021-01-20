<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\ProfileType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route(path="/forms")
 */
class Home
{
    private $formFactory;
    private $environment;

    public function __construct(FormFactoryInterface $formFactory, Environment $environment)
    {
        $this->formFactory = $formFactory;
        $this->environment = $environment;
    }

    public function __invoke(): Response
    {
        $form = $this->formFactory->create(ProfileType::class);
        return new Response($this->environment->render('pages/forms.html.twig', ['form' => $form->createView()]));
    }
}