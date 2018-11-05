<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * servidor
 *
 * @ORM\Table(name="servidor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\servidorRepository")
 */
class servidor
{
     //..Relaciones..

        //.. Relación con la entidad pelicula.

        /**
        * @ORM\ManyToOne(targetEntity="pelicula", inversedBy="servidor")
        * @ORM\JoinColumn(name="peliculaId", referencedColumnName="id")
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="url_pelicula", type="string", length=255)
     */
    private $urlPelicula;

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
     * @return servidor
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
     * Set urlPelicula
     *
     * @param string $urlPelicula
     *
     * @return servidor
     */
    public function setUrlPelicula($urlPelicula)
    {
        $this->urlPelicula = $urlPelicula;

        return $this;
    }

    /**
     * Get urlPelicula
     *
     * @return string
     */
    public function getUrlPelicula()
    {
        return $this->urlPelicula;
    }

    /**
     * Set peliculaId
     *
     * @param integer $peliculaId
     *
     * @return servidor
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
     * @param \AppBundle\Entity\pelicula $pelicula
     *
     * @return servidor
     */
    public function setPelicula(\AppBundle\Entity\pelicula $pelicula = null)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    /**
     * Get pelicula
     *
     * @return \AppBundle\Entity\pelicula
     */
    public function getPelicula()
    {
        return $this->pelicula;
    }
}
