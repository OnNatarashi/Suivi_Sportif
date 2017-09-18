<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Nutrition
 *
 * @ORM\Table(name="nutrition")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\NutritionRepository")
 */
class Nutrition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="menu", type="string", length=255)
     */
    private $menu;

    /**
     * @ORM\Column(name="illustration",type="string",length=255)
     *
     * @Assert\NotBlank(message="S'il vous plaît, télécharger une image.")
     * @Assert\File(mimeTypes= {"image/png", "image/jpeg"} )
     */
    private $illustration;

    public function __toString(){
        return $this->nom;
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
     * Set menu
     *
     * @param string $menu
     *
     * @return Nutrition
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return string
     */
    public function getMenu()
    {
        return $this->menu;
    }



    /**
     * Set illustration
     *
     * @param string $illustration
     *
     * @return Nutrition
     */
    public function setIllustration($illustration)
    {
        $this->illustration = $illustration;

        return $this;
    }

    /**
     * Get illustration
     *
     * @return string
     */
    public function getIllustration()
    {
        return $this->illustration;
    }
}
