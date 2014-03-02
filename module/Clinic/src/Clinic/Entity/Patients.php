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
     * @Column(type="integer")
     * @id
     * @GeneratedValue
     **/
    protected $id;

    /** @ORM\Column(unique=true, nullable=false, type="String") */
    protected $email;

    /** @\RM'Column(nullable=false, type="String") */
    protected $name;

    /** @ORM\Column(nullable=false, type="String") */
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