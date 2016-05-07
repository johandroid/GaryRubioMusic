<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tempo
 *
 * @ORM\Table(name="tempo")
 * @ORM\Entity(repositoryClass="GaryBundle\Repository\TempoRepository")
 */
class Tempo
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
     * @ORM\Column(name="tempo", type="string", length=255, unique=true)
     */
    private $tempo;


    /**
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="tempos")
     */
    private $canciones;

    public function __construct() {
        $this->canciones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tempo
     *
     * @param string $tempo
     *
     * @return Tempo
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;

        return $this;
    }

    /**
     * Get tempo
     *
     * @return string
     */
    public function getTempo()
    {
        return $this->tempo;
    }
}

