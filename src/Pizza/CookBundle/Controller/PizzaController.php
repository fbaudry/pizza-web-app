<?php

namespace Pizza\CookBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class PizzaController extends FOSRestController implements ClassResourceInterface
{

    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pizzas = $em->getRepository("PizzaCookBundle:Pizza")->findBy(array("isDeleted" => false));

        $view = $this->view($pizzas, 200);
        return $this->handleView($view);
    }
}