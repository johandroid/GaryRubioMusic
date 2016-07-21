<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Duracion
 *
 * @ORM\Table(name="duracion")
 * @ORM\Entity(repositoryClass="GaryBundle\Repository\DuracionRepository")
 */
class Duracion
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
     * @ORM\Column(name="duracion", type="string", length=255, unique=true)
     */
    private $duracion;


    /**
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="duracion")
     */
    private $canciones;

    public function __construct()
    {
        $this->canciones = new ArrayCollection();
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
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Add cancione
     *
     * @param \GaryBundle\Entity\Cancion $cancione
     *
     * @return Duracion
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
