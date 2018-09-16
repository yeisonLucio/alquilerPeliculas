<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pelicula_actor
 *
 * @ORM\Table(name="pelicula_actor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\pelicula_actorRepository")
 */
class pelicula_actor
{

      //..Relaciones..

         //.. Relación con la entidad pelicula.

             /**
             * @ORM\ManyToOne(targetEntity="pelicula", inversedBy="pelicula_actor")
             * @ORM\JoinColumn(name="pelicula_id", referencedColumnName="id")
             */
             private $pelicula;

         //.. Relación con la entidad actor.

             /**
             * @ORM\ManyToOne(targetEntity="actor", inversedBy="pelicula_actor")
             * @ORM\JoinColumn(name="actor_id", referencedColumnName="id")
             */
             private $actor;
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
     * @ORM\Column(name="actor_id", type="integer")
     */
    private $actorId;


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
     * @return pelicula_actor
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
     * Set actorId
     *
     * @param integer $actorId
     *
     * @return pelicula_actor
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;

        return $this;
    }

    /**
     * Get actorId
     *
     * @return int
     */
    public function getActorId()
    {
        return $this->actorId;
    }
}
