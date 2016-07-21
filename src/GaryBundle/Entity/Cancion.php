<?php

namespace GaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

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

    // <VichUploader>

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="musica_sonido", fileNameProperty="sonidoName")
     *
     * @var File
     */
    private $sonidoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $sonidoName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="musica_thumbnail", fileNameProperty="thumbnailName")
     *
     * @var File
     */
    private $thumbnailFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $thumbnailName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="musica_preview", fileNameProperty="previewName")
     *
     * @var File
     */
    private $previewFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $previewName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $sonido
     *
     * @return Cancion
     */
    public function setSonidoFile(File $sonido = null)
    {
        $this->sonidoFile = $sonido;

        if ($sonido) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getsonidoFile()
    {
        return $this->sonidoFile;
    }

    /**
     * @param string $sonidoName
     *
     * @return Cancion
     */
    public function setSonidoName($sonidoName)
    {
        $this->sonidoName = $sonidoName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSonidoName()
    {
        return $this->sonidoName;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $thumbnail
     *
     * @return Cancion
     */
    public function setThumbnailFile(File $thumbnail = null)
    {
        $this->sonidoFile = $thumbnail;

        if ($thumbnail) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param string $thumbnailName
     *
     * @return Cancion
     */
    public function setThumbnailName($thumbnailName)
    {
        $this->thumbnailName = $thumbnailName;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailName()
    {
        return $this->thumbnailName;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $preview
     *
     * @return Cancion
     */
    public function setPreviewFile(File $preview = null)
    {
        $this->previewFile = $preview;

        if ($preview) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getPreviewFile()
    {
        return $this->previewFile;
    }

    /**
     * @param string $previewName
     *
     * @return Cancion
     */
    public function setpreviewName($previewName)
    {
        $this->previewName = $previewName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPreviewName()
    {
        return $this->previewName;
    }

    // </VichUploader>

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
