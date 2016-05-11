<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Cancion
 *
 * @ORM\Table(name="cancion")
 * @ORM\Entity(repositoryClass="GaryBundle\Repository\CancionRepository")
 */
class Cancion
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255)
     * 
     */
    private $autor;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="Genero", inversedBy="canciones")
     * @ORM\JoinTable(name="canciones_generos",
     *      joinColumns={@ORM\JoinColumn(name="cancion_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="genero_id", referencedColumnName="id")}
     * )
     */
    private $generos;

    /**
     * @ORM\ManyToMany(targetEntity="Mood", inversedBy="canciones")
     * @ORM\JoinTable(name="canciones_moods",
     *      joinColumns={@ORM\JoinColumn(name="cancion_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="mood_id", referencedColumnName="id")}
     * )
     */
    private $moods;

    /**
     * @ORM\ManyToMany(targetEntity="Tempo", inversedBy="canciones")
     * @ORM\JoinTable(name="canciones_tempos",
     *      joinColumns={@ORM\JoinColumn(name="cancion_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tempo_id", referencedColumnName="id")}
     * )
     */
    private $tempos;

    /**
     * @ORM\ManyToMany(targetEntity="Duracion", inversedBy="canciones")
     * @ORM\JoinTable(name="canciones_duraciones",
     *      joinColumns={@ORM\JoinColumn(name="cancion_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="duracion_id", referencedColumnName="id")}
     * )
     */
    private $duracion;

    public function __construct() {
        $this->generos = new ArrayCollection();
        $this->moods= new ArrayCollection();
        $this->tempos= new ArrayCollection();
        $this->duracion= new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cancion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set autor
     *
     * @param string $autor
     *
     * @return Cancion
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Cancion
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Cancion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add genero
     *
     * @param \GaryBundle\Entity\Genero $genero
     *
     * @return Cancion
     */
    public function addGenero(\GaryBundle\Entity\Genero $genero)
    {
        $this->generos[] = $genero;

        return $this;
    }

    /**
     * Remove genero
     *
     * @param \GaryBundle\Entity\Genero $genero
     */
    public function removeGenero(\GaryBundle\Entity\Genero $genero)
    {
        $this->generos->removeElement($genero);
    }

    /**
     * Get generos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGeneros()
    {
        return $this->generos;
    }

    /**
     * Add mood
     *
     * @param \GaryBundle\Entity\Mood $mood
     *
     * @return Cancion
     */
    public function addMood(\GaryBundle\Entity\Mood $mood)
    {
        $this->moods[] = $mood;

        return $this;
    }

    /**
     * Remove mood
     *
     * @param \GaryBundle\Entity\Mood $mood
     */
    public function removeMood(\GaryBundle\Entity\Mood $mood)
    {
        $this->moods->removeElement($mood);
    }

    /**
     * Get moods
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMoods()
    {
        return $this->moods;
    }

    /**
     * Add tempo
     *
     * @param \GaryBundle\Entity\Tempo $tempo
     *
     * @return Cancion
     */
    public function addTempo(\GaryBundle\Entity\Tempo $tempo)
    {
        $this->tempos[] = $tempo;

        return $this;
    }

    /**
     * Remove tempo
     *
     * @param \GaryBundle\Entity\Tempo $tempo
     */
    public function removeTempo(\GaryBundle\Entity\Tempo $tempo)
    {
        $this->tempos->removeElement($tempo);
    }

    /**
     * Get tempos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTempos()
    {
        return $this->tempos;
    }

    /**
     * Add duracion
     *
     * @param \GaryBundle\Entity\Duracion $duracion
     *
     * @return Cancion
     */
    public function addDuracion(\GaryBundle\Entity\Duracion $duracion)
    {
        $this->duracion[] = $duracion;

        return $this;
    }

    /**
     * Remove duracion
     *
     * @param \GaryBundle\Entity\Duracion $duracion
     */
    public function removeDuracion(\GaryBundle\Entity\Duracion $duracion)
    {
        $this->duracion->removeElement($duracion);
    }

    /**
     * Get duracion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDuracion()
    {
        return $this->duracion;
    }
}
