<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="programme")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ProgrammeRepository")
 */
class Programme
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
     * @ORM\ManyToOne(targetEntity = "Nutrition")
     */
    private $nutrition;

    /**
     * @ORM\ManyToOne(targetEntity = "Jour")
     */
    private $jour;

    /**
     * @ORM\ManyToOne(targetEntity = "Cours")
     */
    private $cours;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nutrition
     *
     * @param \BackendBundle\Entity\Nutrition $nutrition
     *
     * @return Programme
     */
    public function setNutrition(\BackendBundle\Entity\Nutrition $nutrition = null)
    {
        $this->nutrition = $nutrition;

        return $this;
    }

    /**
     * Get nutrition
     *
     * @return \BackendBundle\Entity\Nutrition
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * Set jour
     *
     * @param \BackendBundle\Entity\Jour $jour
     *
     * @return Programme
     */
    public function setJour(\BackendBundle\Entity\Jour $jour = null)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \BackendBundle\Entity\Jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set cours
     *
     * @param \BackendBundle\Entity\Cours $cours
     *
     * @return Programme
     */
    public function setCours(\BackendBundle\Entity\Cours $cours = null)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return \BackendBundle\Entity\Cours
     */
    public function getCours()
    {
        return $this->cours;
    }
}
