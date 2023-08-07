<?php

namespace Daniel\Factory\Form;


use Daniel\Factory\Model\MealModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MealModelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Meal Name',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
            ])
            ->add('category_id', NumberType::class, [
                'label' => 'category',
            ])
            ->add('ingredients', CollectionType::class, [
                'entry_type' => MealIngredientModelForm::class,
                'allow_add' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MealModel::class,
        ]);
    }
}
