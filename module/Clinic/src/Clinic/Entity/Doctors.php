<?php

namespace Clinic\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 **/
 class Doctors
 {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /** @ORM\Column(type="string", unique=true, nullable=false) */
    protected $email;

    /** @ORM\Column(type="string", nullable=false) */
    protected $name;

    /** @ORM\Column(type="string", nullable=false) */
    protected $surname;

    /** @ORM\Column(type="datetime", nullable=false) */
    protected $joined;

    /** @ORM\Column(type="string", nullable=false) */
    protected $password;

    /** @ORM\OneToMany(targetEntity="Practitioners", mappedBy="supervisor") */
    protected $practitioners;

    /** @ORM\OneToMany(targetEntity="Appointments", mappedBy="doctor") */
    protected $appointments;

    public function __construct($name, $surname, $email, $password)
    {
        $this->name     = $name;
        $this->surname  = $surname;
        $this->email    = $email;
        $this->password = $password;
        $this->joined   = new \DateTime("Now");
        $this->practitioners = new ArrayCollection();
        $this->appointments  = new ArrayCollection();
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of surname.
     *
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Sets the value of surname.
     *
     * @param mixed $surname the surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Gets the value of joined.
     *
     * @return mixed
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * Sets the value of joined.
     *
     * @param mixed $joined the joined
     *
     * @return self
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the value of practitioners.
     *
     * @return mixed
     */
    public function getPractitioners()
    {
        return $this->practitioners;
    }

    /**
     * Sets the value of practitioners.
     *
     * @param mixed $practitioners the practitioners
     *
     * @return self
     */
    public function setPractitioners($practitioners)
    {
        $this->practitioners = $practitioners;

        return $this;
    }

    /**
     * Gets the value of appointments.
     *
     * @return mixed
     */
    public function getAppointments()
    {
        return $this->appointments;
    }

    /**
     * Sets the value of appointments.
     *
     * @param mixed $appointments the appointments
     *
     * @return self
     */
    public function setAppointments($appointments)
    {
        $this->appointments = $appointments;

        return $this;
    }
}