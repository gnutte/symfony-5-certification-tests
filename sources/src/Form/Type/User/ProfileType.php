<?php

declare(strict_types=1);

namespace App\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('civility', ChoiceType::class, [
            'choices' => ['M.' => 0, 'Mme.' => 1],
            'choice_attr' => ['M.' => ['data-color' => 'Red'], 'Mme' => ['data-color' => 'Yellow']],
        ]);

        $builder->add('address', AddressType::class);
    }

}