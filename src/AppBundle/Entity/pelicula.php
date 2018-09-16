<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * pelicula
 *
 * @ORM\Table(name="pelicula")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\peliculaRepository")
 */
class pelicula
{
    //..Relaciones..

      //..Relación con entidad servidor.

          /**
          * @ORM\OneToMany(targetEntity="servidor", mappedBy="pelicula")
          */
          private $servidor;

          public function __constructServidor()
          {
            $this->servidor = new ArrayCollection();
          }

      //..Relación con la entidad imagenes

          /**
          * @ORM\OneToMany(targetEntity="imagenes", mappedBy="pelicula")
          */
          private $imagenes;

          public function __constructImagenes()
          {
            $this->imagenes = new ArrayCollection();
          }

      //..Relación con la entidad pelicula_favorita

          /**
          * @ORM\OneToMany(targetEntity="pelicula_favorita", mappedBy="pelicula")
          */
          private $pelicula_favorita;

          public function __constructPelicula_favorita()
          {
            $this->pelicula_favorita = new ArrayCollection();
          }

      //..Relación con la entidad pelicula_actor

          /**
          * @ORM\OneToMany(targetEntity="pelicula_actor", mappedBy="pelicula")
          */
          private $pelicula_actor;

          public function __constructPelicula_actor()
          {
            $this->pelicula_actor = new ArrayCollection();
          }

     //.. Relación con la entidad usuario.

         /**
         * @ORM\ManyToOne(targetEntity="usuario", inversedBy="pelicula")
         * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
         */
         private $usuario;

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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="año", type="string", length=10)
     */
    private $año;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=100)
     */
    private $duracion;

    /**
     * @var string
     *
     * @ORM\Column(name="sipnosis", type="string", length=600)
     */
    private $sipnosis;

    /**
     * @var string
     *
     * @ORM\Column(name="estreno", type="string", length=2)
     */
    private $estreno;

    /**
     * @var string
     *
     * @ORM\Column(name="calidad", type="string", length=5)
     */
    private $calidad;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255)
     */
    private $genero;

    /**
     * @var int
     *
     * @ORM\Column(name="usuario_id", type="integer")
     */
    private $usuarioId;



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
     * @return pelicula
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
     * Set año
     *
     * @param string $año
     *
     * @return pelicula
     */
    public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get año
     *
     * @return string
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return pelicula
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
     * Set sipnosis
     *
     * @param string $sipnosis
     *
     * @return pelicula
     */
    public function setSipnosis($sipnosis)
    {
        $this->sipnosis = $sipnosis;

        return $this;
    }

    /**
     * Get sipnosis
     *
     * @return string
     */
    public function getSipnosis()
    {
        return $this->sipnosis;
    }

    /**
     * Set estreno
     *
     * @param string $estreno
     *
     * @return pelicula
     */
    public function setEstreno($estreno)
    {
        $this->estreno = $estreno;

        return $this;
    }

    /**
     * Get estreno
     *
     * @return string
     */
    public function getEstreno()
    {
        return $this->estreno;
    }

    /**
     * Set calidad
     *
     * @param string $calidad
     *
     * @return pelicula
     */
    public function setCalidad($calidad)
    {
        $this->calidad = $calidad;

        return $this;
    }

    /**
     * Get calidad
     *
     * @return string
     */
    public function getCalidad()
    {
        return $this->calidad;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return pelicula
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
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return pelicula
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return int
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }
}
