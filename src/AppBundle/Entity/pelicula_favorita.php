<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pelicula_favorita
 *
 * @ORM\Table(name="pelicula_favorita")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\pelicula_favoritaRepository")
 */
class pelicula_favorita
{
      //..Relaciones..

         //.. Relación con la entidad pelicula.

             /**
             * @ORM\ManyToOne(targetEntity="pelicula", inversedBy="pelicula_favorita")
             * @ORM\JoinColumn(name="pelicula_id", referencedColumnName="id")
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
     * @var int
     *
     * @ORM\Column(name="pelicula_id", type="integer")
     */
    private $peliculaId;

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
     * Set peliculaId
     *
     * @param integer $peliculaId
     *
     * @return pelicula_favorita
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
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return pelicula_favorita
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
