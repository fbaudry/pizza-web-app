<?php

namespace Pizza\CookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * PizzaIngredient
 *
 * @ORM\Table(name="pizza_ingredient")
 * @ORM\Entity(repositoryClass="Pizza\CookBundle\Repository\PizzaIngredientRepository")
 */
class PizzaIngredient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="string", length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Pizza\CookBundle\Entity\Pizza", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     */
    private $pizza;

    /**
     * @ORM\ManyToOne(targetEntity="Pizza\CookBundle\Entity\Ingredient")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     */
    private $ingredient;


    public function __construct(Pizza $pizza, Ingredient $ingredient)
    {
        $this->pizza = $pizza;
        $this->ingredient = $ingredient;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pizza
     *
     * @param \Pizza\CookBundle\Entity\Pizza $pizza
     *
     * @return PizzaIngredient
     */
    public function setPizza(\Pizza\CookBundle\Entity\Pizza $pizza)
    {
        $this->pizza = $pizza;

        return $this;
    }

    /**
     * Get pizza
     *
     * @return \Pizza\CookBundle\Entity\Pizza
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * Set ingredient
     *
     * @param \Pizza\CookBundle\Entity\Ingredient $ingredient
     *
     * @return PizzaIngredient
     */
    public function setIngredient(\Pizza\CookBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get ingredient
     *
     * @return \Pizza\CookBundle\Entity\Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
}
