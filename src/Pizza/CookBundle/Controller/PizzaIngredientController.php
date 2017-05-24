<?php

namespace Pizza\CookBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Pizza\CookBundle\Entity\PizzaIngredient;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Delete;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PizzaIngredientController extends FOSRestController implements ClassResourceInterface
{

    /**
     * GET Route annotation
     * @Get("/pizzas/{pizza_id}/ingredients")
     */
    public function cgetAction($pizza_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pizza = $em->getRepository("PizzaCookBundle:Pizza")->find($pizza_id);
        if(!$pizza)
            throw new NotFoundHttpException("pizza not found");

        $view = $this->view($pizza->getIngredients(), 200);
        return $this->handleView($view);
    }

    /**
     * POST Route annotation
     * @Post("/pizzas/{pizza_id}/ingredients/{ingredient_id}")
     */
    public function postAction($pizza_id, $ingredient_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pizzaIngredient = $em->getRepository("PizzaCookBundle:PizzaIngredient")->findOneBy(array(
            "ingredient" => $ingredient_id,
            "pizza" => $pizza_id
        ));

        if(!$pizzaIngredient){
            $pizza = $em->getRepository("PizzaCookBundle:Pizza")->find($pizza_id);
            if(!$pizza)
                throw new NotFoundHttpException("pizza not found");


            $ingredient = $em->getRepository("PizzaCookBundle:Ingredient")->find($ingredient_id);
            if(!$ingredient)
                throw new NotFoundHttpException("ingredient not found");

            $pizzaIngredient = new PizzaIngredient($pizza, $ingredient);
            $em->persist($pizzaIngredient);
            $em->flush();
        }

        $view = $this->view($pizzaIngredient, 200);
        return $this->handleView($view);
    }

    /**
     * DELETE Route annotation
     * @Delete("/pizzas/{pizza_id}/ingredients/{ingredient_id}")
     */
    public function deleteAction($pizza_id, $ingredient_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pizzaIngredient = $em->getRepository("PizzaCookBundle:PizzaIngredient")->findOneBy(array(
            "ingredient" => $ingredient_id,
            "pizza" => $pizza_id
        ));

        if(!$pizzaIngredient)
            throw new NotFoundHttpException("pizza's ingredient not found");

        $pizza = $pizzaIngredient->getPizza();
        $em->remove($pizzaIngredient);
        $em->flush();

        $view = $this->view($pizza, 200);
        return $this->handleView($view);
    }


}