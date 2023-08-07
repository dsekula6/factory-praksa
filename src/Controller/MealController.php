<?php

namespace Daniel\Factory\Controller;

use Daniel\Factory\Class\Router;
use Daniel\Factory\Class\Request;
use Symfony\Component\Form\Forms;
use Daniel\Factory\Model\MealModel;
use Daniel\Factory\Response\Response;
use Symfony\Component\Form\FormError;
use Daniel\Factory\Form\MealModelForm;
use Daniel\Factory\Response\TwigResponse;
use Symfony\Component\Form\FormFactoryInterface;

class MealController
{
    public function create(Request $request)
    {
        $mealModel = new MealModel();
        // symfony-ev form factory
        $formFactory = Forms::createFormFactory();
        $mealForm = $formFactory->create(MealModelForm::class, $mealModel);

        $mealForm->handleRequest();
        
        if ($mealForm->isSubmitted()) {
            $title = $mealModel->title;
            $description = $mealModel->description;
        
            if (empty($title)) {
                $mealForm->get('title')->addError(new FormError('Title field cannot be empty.'));
            } elseif (strlen($title) > 100) {
                $mealForm->get('title')->addError(new FormError('Title field cannot exceed 100 characters.'));
            }
        
            if (empty($description)) {
                $mealForm->get('description')->addError(new FormError('Description field cannot be empty.'));
            } elseif (strlen($description) > 500) {
                $mealForm->get('description')->addError(new FormError('Description field cannot exceed 500 characters.'));
            }
        
            if (!$mealForm->isValid()) {
                header("Location: /error");
                exit;
            }

            // dd($mealModel);
        
            $mealModel->save();
        
            header("Location: /success");
            exit;
        }
        return new TwigResponse('createMeal.html.twig', ['form' => $mealForm->createView()]);
    }
    public function success(Request $request) 
    {
        return new Response('Meal added successfully!');
    }
    public function error(Request $request) 
    {
        return new Response('error');
    }
}
