<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genero
 *
 * @ORM\Table(name="genero")
 * @ORM\Entity(repositoryClass="GaryBundle\Repository\GeneroRepository")
 */
class Genero
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
     * @ORM\Column(name="genero", type="string", length=255, unique=true)
     */
    private $genero;

    /**
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="generos")
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
     * Set genero
     *
     * @param string $genero
     *
     * @return Genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Add cancione
     *
     * @param \GaryBundle\Entity\Cancion $cancione
     *
     * @return Genero
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
