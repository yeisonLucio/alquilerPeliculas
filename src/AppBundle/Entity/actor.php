<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * actor
 *
 * @ORM\Table(name="actor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\actorRepository")
 */
class actor
{
      //..Relaciones..

        //..Relación con entidad pelicula_actor.

            /**
            * @ORM\OneToMany(targetEntity="pelicula_actor", mappedBy="actor")
            */
            private $pelicula_actor;

            public function __constructPelicula_actor()
            {
              $this->pelicula_actor = new ArrayCollection();
            }

        //..Relación con entidad actor_favorito.

            /**
            * @ORM\OneToMany(targetEntity="actor_favorito", mappedBy="actor")
            */
            private $actor_favorito;

            public function __constructActor_favorito()
            {
              $this->actor_favorito = new ArrayCollection();
            }



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
     * @ORM\Column(name="personaje", type="string", length=100)
     */
    private $personaje;

    /**
     * @var int
     *
     * @ORM\Column(name="pelicula_id", type="integer")
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
     * @return actor
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
     * Set personaje
     *
     * @param string $personaje
     *
     * @return actor
     */
    public function setPersonaje($personaje)
    {
        $this->personaje = $personaje;

        return $this;
    }

    /**
     * Get personaje
     *
     * @return string
     */
    public function getPersonaje()
    {
        return $this->personaje;
    }

    /**
     * Set peliculaId
     *
     * @param integer $peliculaId
     *
     * @return actor
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
}
