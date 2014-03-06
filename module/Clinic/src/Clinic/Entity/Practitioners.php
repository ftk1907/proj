<?php

namespace Clinic\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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

    /** @ORM\Column(unique=true, nullable=false, type="string") */
    protected $email;

    /** @ORM\Column(nullable=false, type="string") */
    protected $name;

    /** @ORM\Column(nullable=false, type="string") */
    protected $surname;

    /** @ORM\Column(type="datetime", nullable=false) */
    protected $joined;

    /** @ORM\Column(type="string", nullable=false) */
    protected $password;

    /**
     * @ORM\JoinColumn(name="supervisor", referencedColumnName="id", nullable=false)
     * @ORM\ManyToOne(targetEntity="Doctors", inversedBy="practitioners")
     **/
    protected $supervisor;

    /** @ORM\OneToMany(targetEntity="Appointments", mappedBy="practitioner") */
    protected $appointments;

    public function __construct($name, $surname, $email, $password)
    {
        $this->name     = $name;
        $this->surname  = $surname;
        $this->password = $password;
        $this->joined   = new \DateTime("Now");
        $this->appointments = new ArrayCollection();
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
     * Gets the value of supervisor.
     *
     * @return mixed
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * Sets the value of supervisor.
     *
     * @param mixed $supervisor the supervisor
     *
     * @return self
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;

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
} // END public class Practitioners