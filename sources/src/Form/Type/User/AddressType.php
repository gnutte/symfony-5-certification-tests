<?php

declare(strict_types=1);

namespace App\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Countries;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['countries' => []]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('country', ChoiceType::class, [
            'choice_loader' => new CallbackChoiceLoader(static function() {
                return Countries::getNames();
            }),
        ]);

        $builder->add('state', ChoiceType::class, [
            'choice_loader' => new CallbackChoiceLoader(static function() {
                return Countries::getNames();
            }),
        ]);
    }


}