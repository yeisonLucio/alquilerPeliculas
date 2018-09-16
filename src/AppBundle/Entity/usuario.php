<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\usuarioRepository")
 */
class usuario
{
    //..Relaciones..

        //..Relación con la entidad pelicula

            /**
            * @ORM\OneToMany(targetEntity="pelicula", mappedBy="usuario")
            */
            private $pelicula;

            public function __constructPelicula()
            {
              $this->pelicula = new ArrayCollection();
            }

        //..Relación con la entidad pelicula_favorita

            /**
            * @ORM\OneToMany(targetEntity="pelicula_favorita", mappedBy="usuario")
            */
            private $pelicula_favorita;

            public function __constructPelicula_favorita()
            {
              $this->pelicula_favorita = new ArrayCollection();
            }

        //..Relación con la entidad actor_favorito

            /**
            * @ORM\OneToMany(targetEntity="actor_favorito", mappedBy="usuario")
            */
            private $actor_favorito;

            public function __constructActor_favor()
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;


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
     * Set username
     *
     * @param string $username
     *
     * @return usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
