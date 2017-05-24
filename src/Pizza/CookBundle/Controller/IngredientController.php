<?php

namespace Pizza\CookBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class IngredientController extends FOSRestController implements ClassResourceInterface
{
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ingredients = $em->getRepository("PizzaCookBundle:Ingredient")->findBy(array("isDeleted" => false));

        $view = $this->view($ingredients, 200);
        return $this->handleView($view);
    }
}