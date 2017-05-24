<?php

namespace Pizza\CookBundle\Command;



use Pizza\CookBundle\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePizzaCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('pizza:create');

    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get("doctrine.orm.default_entity_manager");

        $elements = $em->getRepository("PizzaCookBundle:Ingredient")->findBy(array("isDeleted" => false));
        $ingredients = array();
        foreach($elements as $element)
            $ingredients[$element->getName()] = $element;

        // MARGHERITA
        $margherita = new Pizza();
        $margherita->setName("MARGHERITA");
        $margherita->addIngredient($ingredients["CHEESE"]);
        $margherita->addIngredient($ingredients["TOMATOES"]);
        $margherita->addIngredient($ingredients["GARLIC"]);
        $em->persist($margherita);


        // POLLO
        $pollo = new Pizza();
        $pollo->setName("POLLO");
        $pollo->addIngredient($ingredients["CHEESE"]);
        $pollo->addIngredient($ingredients["TOMATOES"]);
        $pollo->addIngredient($ingredients["GARLIC"]);
        $pollo->addIngredient($ingredients["CHICKEN"]);
        $em->persist($pollo);

        // ITALIANA
        $italiana = new Pizza();
        $italiana->setName("ITALIANA");
        $italiana->addIngredient($ingredients["CHEESE"]);
        $italiana->addIngredient($ingredients["TOMATOES"]);
        $italiana->addIngredient($ingredients["OLIVES"]);
        $italiana->addIngredient($ingredients["HAM"]);
        $em->persist($italiana);

        $em->flush();
    }

}
