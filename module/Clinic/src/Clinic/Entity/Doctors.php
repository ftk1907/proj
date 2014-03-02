<?php

namespace Clinic\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
  * Doctors Entity
  * @ORM\Entity(repositoryClass="Clinic\Entity\DoctorsRepository")
  **/
 class Doctors
 {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /** @ORM\Column(type="String", unique=true, nullable=false) */
    protected $email;

    /** @ORM\Column(type="String", nullable=false) */
    protected $name;

    /** @ORM\Column(type="String", nullable=false) */
    protected $surname;

    /** @ORM\Column(type="DateTime", nullable=false) */
    protected $joined;

    /** @ORM\Column(type="String(255)", nullable=false) */
    protected $password;

    /** @ORM\OneToMany(targetEntity="Practitioners", mappedBy="supervisor") */
    protected $practitioners;

    public function __construct($name, $surname, $email, $password)
    {
        $this->name     = $name;
        $this->surname  = $surname;
        $this->email    = $email;
        $this->password = $password;
        $this->joined   = new \DateTime("Now");
        $this->practitioners = new ArrayCollection();
    }
 }