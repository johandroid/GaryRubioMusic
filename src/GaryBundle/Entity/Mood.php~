<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mood
 *
 * @ORM\Table(name="mood")
 * @ORM\Entity(repositoryClass="GaryBundle\Repository\MoodRepository")
 */
class Mood
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
     * @ORM\Column(name="mood", type="string", length=255, unique=true)
     */
    private $mood;


    /**
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="moods")
     */
    private $canciones;

    public function __construct() {
        $this->mood = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set mood
     *
     * @param string $mood
     *
     * @return Mood
     */
    public function setMood($mood)
    {
        $this->mood = $mood;

        return $this;
    }

    /**
     * Get mood
     *
     * @return string
     */
    public function getMood()
    {
        return $this->mood;
    }

    /**
     * Add cancione
     *
     * @param \GaryBundle\Entity\Cancion $cancione
     *
     * @return Mood
     */
    public function addCancione(\GaryBundle\Entity\Cancion $cancione)
    {
        $this->canciones[] = $cancione;

        return $this;
    }

    /**
     * Remove cancione
     *
     * @param \GaryBundle\Entity\Cancion $cancione
     */
    public function removeCancione(\GaryBundle\Entity\Cancion $cancione)
    {
        $this->canciones->removeElement($cancione);
    }

    /**
     * Get canciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCanciones()
    {
        return $this->canciones;
    }
}
