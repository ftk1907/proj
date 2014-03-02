<?php

namespace Clinic\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patients Entity
 * @ORM\Entity(repositoryClass="Clinic\Entity\PatientsRepository")
 **/
 class Patients
 {
    /**
     * @ORM\Column(type="integer")
     * @ORM\id
     * @ORM\GeneratedValue
     **/
    protected $id;

    /** @ORM\Column(type="String", unique=true, nullable=false, ) */
    protected $email;

    /** @ORM\Column(type="String", nullable=false)  */
    protected $name;

    /** @ORM\Column(type="String", nullable=false) */
    protected $surname;

    /** @ORM\Column(type="DateTime", nullable=false) */
    protected $joined;

    /** @ORM\Column(type="String(255)", nullable=false) */
    protected $password;

    /** @ORM\Column(type="boolean", nullable=false) */
    protected $verified;

    public function __construct($name, $surname, $email, $password)
    {
        $this->name     = $name;
        $this->surname  = $surname;
        $this->email    = $email;
        $this->password = $password;
        $this->joined   = new \DateTime("Now");
        $this->verified = 0;
    }

 } // END public class Patients