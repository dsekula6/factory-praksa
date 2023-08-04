<?php

namespace Daniel\Factory\Form;

use Daniel\Factory\Model\MyModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MyModelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naslov', TextType::class, [
                'label' => 'Meal Name',
            ])
            ->add('sazetak', TextType::class, [
                'label' => 'Description',
            ])
            ->add('tekst', TextType::class, [
                'label' => 'tekst',
            ])
            ->add('slika', TextType::class, [
                'label' => 'slika',
            ])
            ->add('kategorija', TextType::class, [
                'label' => 'kategorija',
            ])
            ->add('arhiva', NumberType::class, [
                'label' => 'arhiva',
            ])
            ->add('datum', DateType::class, [
                'label' => 'datum',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save a new meal',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MyModel::class,
        ]);
    }
}
