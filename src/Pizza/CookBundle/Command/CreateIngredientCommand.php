<?php

namespace Pizza\CookBundle\Command;



use Pizza\CookBundle\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateIngredientCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('ingredient:create');

    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get("doctrine.orm.default_entity_manager");

        // CHEESE
        $cheese = new Ingredient();
        $cheese->setName("CHEESE");
        $cheese->setPrice(2.0);
        $em->persist($cheese);


        // CHICKEN
        $chicken = new Ingredient();
        $chicken->setName("CHICKEN");
        $chicken->setPrice(2.0);
        $em->persist($chicken);


        // FISH
        $fish = new Ingredient();
        $fish->setName("FISH");
        $fish->setPrice(2.0);
        $em->persist($fish);


        // AVOCADO
        $avocado = new Ingredient();
        $avocado->setName("AVOCADO");
        $avocado->setPrice(2.0);
        $em->persist($avocado);


        // BROCCOLI
        $broccoli = new Ingredient();
        $broccoli->setName("BROCCOLI");
        $broccoli->setPrice(2.0);
        $em->persist($broccoli);


        // PEPPERONI
        $pepperoni = new Ingredient();
        $pepperoni->setName("PEPPERONI");
        $pepperoni->setPrice(2.0);
        $em->persist($pepperoni);


        // OLIVES
        $olives = new Ingredient();
        $olives->setName("OLIVES");
        $olives->setPrice(1.0);
        $em->persist($olives);


        // ONION
        $onions = new Ingredient();
        $onions->setName("ONIONS");
        $onions->setPrice(1.0);
        $em->persist($onions);


        // PAPRIKA
        $paprika = new Ingredient();
        $paprika->setName("PAPRIKA");
        $paprika->setPrice(1.0);
        $em->persist($paprika);


        // PRAWNS
        $prawns = new Ingredient();
        $prawns->setName("PRAWNS");
        $prawns->setPrice(3.0);
        $em->persist($prawns);


        // HAM
        $ham = new Ingredient();
        $ham->setName("HAM");
        $ham->setPrice(2.0);
        $em->persist($ham);


        // TOMATOES
        $tomatoes = new Ingredient();
        $tomatoes->setName("TOMATOES");
        $tomatoes->setPrice(1.0);
        $em->persist($tomatoes);


        // EGGPLANT
        $eggPlant = new Ingredient();
        $eggPlant->setName("EGGPLANT");
        $eggPlant->setPrice(1.0);
        $em->persist($eggPlant);


        // GARLIC
        $garlic = new Ingredient();
        $garlic->setName("GARLIC");
        $garlic->setPrice(1.0);
        $em->persist($garlic);


        // LEEK
        $leek = new Ingredient();
        $leek->setName("LEEK");
        $leek->setPrice(1.0);
        $em->persist($leek);


        // MUSHROOMS
        $mushroom = new Ingredient();
        $mushroom->setName("MUSHROOMS");
        $mushroom->setPrice(1.0);
        $em->persist($mushroom);


        // SPINACH
        $spinach = new Ingredient();
        $spinach->setName("SPINACH");
        $spinach->setPrice(1.0);
        $em->persist($spinach);


        // PINEAPPLE
        $pineapple = new Ingredient();
        $pineapple->setName("PINEAPPLE");
        $pineapple->setPrice(1.0);
        $em->persist($pineapple);


        $em->flush();
    }

}
