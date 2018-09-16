<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * actor_favorito
 *
 * @ORM\Table(name="actor_favorito")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\actor_favoritoRepository")
 */
class actor_favorito
{
      //..Relaciones..

         //.. Relación con la entidad actor.

             /**
             * @ORM\ManyToOne(targetEntity="actor", inversedBy="actor_favorito")
             * @ORM\JoinColumn(name="actor_id", referencedColumnName="id")
             */
             private $actor;

         //.. Relación con la entidad usuario.

             /**
             * @ORM\ManyToOne(targetEntity="usuario", inversedBy="actor_favorito")
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
     * @var int
     *
     * @ORM\Column(name="actor_id", type="integer")
     */
    private $actorId;

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
     * Set actorId
     *
     * @param integer $actorId
     *
     * @return actor_favorito
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

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return actor_favorito
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
