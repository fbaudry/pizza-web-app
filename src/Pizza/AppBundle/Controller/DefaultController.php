<?php

namespace Pizza\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PizzaAppBundle:Default:index.html.twig');
    }
}
