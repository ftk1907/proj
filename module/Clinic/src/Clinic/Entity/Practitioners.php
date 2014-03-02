<?php

namespace Clinic\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Clinic\Entity\PractitionersRepository")
 **/
class Practitioners
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\id
     * @ORM\GeneratedValue
     **/
    protected $id;

    /** @ORM\Column(unique=true, nullable=false, type="String") */
    protected $email;

    /** @ORM\Column(nullable=false, type="String") */
    protected $name;

    /** @ORM\Column(nullable=false, type="String") */
    protected $surname;

    /** @ORM\Column(type="DateTime", nullable=false) */
    protected $joined;

    /** @ORM\Column(type="String(255)", nullable=false) */
    protected $password;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\OneToMany(targetEntity="Doctors", mappedBy="id")
     **/
    protected $supervisor;

    public function __construct($name, $surname, $email, $password)
    {
        $this->name     = $name;
        $this->surname  = $surname;
        $this->password = $password;
        $this->joined   = new \DateTime("Now");
    }
} // END public class Practitioners