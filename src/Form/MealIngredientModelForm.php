<?php

namespace Daniel\Factory\Form;

use Daniel\Factory\Model\MealIngredientModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MealIngredientModelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingredient_id', TextType::class, [
                'label' => 'Ingredient id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MealIngredientModel::class,
        ]);
    }
}