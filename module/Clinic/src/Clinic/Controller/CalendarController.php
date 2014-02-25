<?php

namespace Clinic\Controller;

use Clinic\Controller\AbstractClinicController;
use Clinic\Model\Calendar;

class CalendarController extends AbstractClinicController
{

    function indexAction()
    {
        return array(
            'calendar' => new Calendar();
        );
    }

    public function bookAction()
    {
        $this->checkIfLoggedIn();
    }

    public function cancelAction()
    {

    }
}