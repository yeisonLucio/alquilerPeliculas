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
     * @ORM\Column(name="fechaLanzamiento", type="date")
     */
    private $fechaLanzamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=100)
     */
    private $duracion;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="string", length=600)
     */
    private $sinopsis;

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
    private $usuario_id;



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
     * Set fechaLanzamiento
     *
     * @param string $fechaLanzamiento
     *
     * @return pelicula
     */
    public function setFechaLanzamiento($fechaLanzamiento)
    {
        $this->fechaLanzamiento = $fechaLanzamiento;

        return $this;
    }

    /**
     * Get fechaLanzamiento
     *
     * @return string
     */
    public function getFechaLanzamiento()
    {
        return $this->fechaLanzamiento;
    }

    public function __toString(){
        return $this->fechaLanzamiento;
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
     * Set sinopsis
     *
     * @param string $sinopsis
     *
     * @return pelicula
     */
    public function setsinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    /**
     * Get sinopsis
     *
     * @return string
     */
    public function getsinopsis()
    {
        return $this->sinopsis;
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
     * Set usuario_id
     *
     * @param integer $usuario_id
     *
     * @return pelicula
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get usuario_id
     *
     * @return int
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servidor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pelicula_favorita = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pelicula_actor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servidor
     *
     * @param \AppBundle\Entity\servidor $servidor
     *
     * @return pelicula
     */
    public function addServidor(\AppBundle\Entity\servidor $servidor)
    {
        $this->servidor[] = $servidor;

        return $this;
    }

    /**
     * Remove servidor
     *
     * @param \AppBundle\Entity\servidor $servidor
     */
    public function removeServidor(\AppBundle\Entity\servidor $servidor)
    {
        $this->servidor->removeElement($servidor);
    }

    /**
     * Get servidor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * Add imagene
     *
     * @param \AppBundle\Entity\imagenes $imagene
     *
     * @return pelicula
     */
    public function addImagene(\AppBundle\Entity\imagenes $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \AppBundle\Entity\imagenes $imagene
     */
    public function removeImagene(\AppBundle\Entity\imagenes $imagene)
    {
        $this->imagenes->removeElement($imagene);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Add peliculaFavoritum
     *
     * @param \AppBundle\Entity\pelicula_favorita $peliculaFavoritum
     *
     * @return pelicula
     */
    public function addPeliculaFavoritum(\AppBundle\Entity\pelicula_favorita $peliculaFavoritum)
    {
        $this->pelicula_favorita[] = $peliculaFavoritum;

        return $this;
    }

    /**
     * Remove peliculaFavoritum
     *
     * @param \AppBundle\Entity\pelicula_favorita $peliculaFavoritum
     */
    public function removePeliculaFavoritum(\AppBundle\Entity\pelicula_favorita $peliculaFavoritum)
    {
        $this->pelicula_favorita->removeElement($peliculaFavoritum);
    }

    /**
     * Get peliculaFavorita
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeliculaFavorita()
    {
        return $this->pelicula_favorita;
    }

    /**
     * Add peliculaActor
     *
     * @param \AppBundle\Entity\pelicula_actor $peliculaActor
     *
     * @return pelicula
     */
    public function addPeliculaActor(\AppBundle\Entity\pelicula_actor $peliculaActor)
    {
        $this->pelicula_actor[] = $peliculaActor;

        return $this;
    }

    /**
     * Remove peliculaActor
     *
     * @param \AppBundle\Entity\pelicula_actor $peliculaActor
     */
    public function removePeliculaActor(\AppBundle\Entity\pelicula_actor $peliculaActor)
    {
        $this->pelicula_actor->removeElement($peliculaActor);
    }

    /**
     * Get peliculaActor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeliculaActor()
    {
        return $this->pelicula_actor;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\usuario $usuario
     *
     * @return pelicula
     */
    public function setUsuario(\AppBundle\Entity\usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
