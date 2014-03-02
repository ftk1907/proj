<?php

namespace Clinic\Entity;

/**
 * @Entity(repositoryClass="Clinic\Entity\PractitionersRepository")
 *
 * @package Clinic/Entity
 * @author
 **/
class Practitioners
{
    /**
     * @Column(type="integer")
     * @id
     * @GeneratedValue
     **/
    protected $id;

    /** @Column(unique=true, nullable=false, type="String") */
    protected $email;

    /** @Column(nullable=false, type="String") */
    protected $name;

    /** @Column(nullable=false, type="String") */
    protected $surname;

    /** @Column(type="DateTime", nullable=false) */
    protected $joined;

    /** @Column(type="String(255)", nullable=false) */
    protected $password;

    /**
     * @Column(type="integer", nullable=false)
     * @OneToMany(targetEntity="Doctors", mappedBy="id")
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