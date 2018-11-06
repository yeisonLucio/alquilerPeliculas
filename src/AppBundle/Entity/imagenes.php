<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * imagenes
 *
 * @ORM\Table(name="imagenes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\imagenesRepository")
 */
class imagenes
{
    //..Relaciones..

       //.. Relación con la entidad pelicula.

           /**
           * @ORM\ManyToOne(targetEntity="pelicula", inversedBy="imagenes")
           * @ORM\JoinColumn(name="peliculaid", referencedColumnName="id")
           */
           private $pelicula;


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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta", type="string", length=255)
     */
    private $ruta;

    /**
     * @var int
     *
     * @ORM\Column(name="peliculaId", type="integer")
     */
    private $peliculaId;


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
     * @return imagenes
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
     * Set ruta
     *
     * @param string $ruta
     *
     * @return imagenes
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set peliculaId
     *
     * @param integer $peliculaId
     *
     * @return imagenes
     */
    public function setPeliculaId($peliculaId)
    {
        $this->peliculaId = $peliculaId;

        return $this;
    }

    /**
     * Get peliculaId
     *
     * @return int
     */
    public function getPeliculaId()
    {
        return $this->peliculaId;
    }
    /**
     * Set pelicula
     *
     * @param integer $pelicula
     *
     * @return imagenes
     */
    public function setPelicula($pelicula)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    /**
     * Get pelicula
     *
     * @return int
     */
    public function getPelicula()
    {
        return $this->pelicula;
    }
}
