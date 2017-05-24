<?php

namespace Pizza\CookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pizza
 *
 * @ORM\Table(name="pizza")
 * @ORM\Entity(repositoryClass="Pizza\CookBundle\Repository\PizzaRepository")
 */
class Pizza
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
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotNull()
     */
    private $name;

    /**
     * @ORM\Column(name="isDeleted", type="boolean", nullable=false)
     * @Assert\NotNull()
     */
    private $isDeleted;


    /**
     * @ORM\OneToMany(targetEntity="Pizza\CookBundle\Entity\PizzaIngredient", mappedBy="pizza", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     */
    private $ingredients;


    public function __construct(){

        $this->isDeleted = false;
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
     * Set name
     *
     * @param string $name
     *
     * @return Pizza
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return Pizza
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }


    /**
     * Add ingredient
     *
     * @param \Pizza\CookBundle\Entity\Ingredient $ingredient
     *
     * @return Pizza
     */
    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = new PizzaIngredient($this, $ingredient);
        return $this;
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
