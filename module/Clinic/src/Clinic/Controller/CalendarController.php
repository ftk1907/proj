<?php

namespace Clinic\Controller;

use Clinic\Controller\AbstractClinicController;
use Clinic\Model\Calendar;

class CalendarController extends AbstractClinicController
{

    function indexAction()
    {
        return array(
            'calendar' => new Calendar()
        );
    }

    public function bookAction()
    {
        $this->checkIfLoggedIn();
        $patient = $this->getUserId();

        $appointment = new Appointments();

        $doctor = $this->args('doctor');
        $date   = $this->args('date');

        $appointment->exchangeArray(array(
            'patient'       => $patient,
            'practitioner'  => $doctor,
            'date'          => $date,
        ));

        $this->getAppointmentsTable()->bookAppointment($appointment);
        $message = 'booked';

        return array('message' => $message);
    }

    public function cancelAction()
    {

    }
}