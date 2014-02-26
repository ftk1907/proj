<?php

namespace Clinic\Model\Calendar;

class WorkingDay
{

    private $timeSlots;

    public function __construct()
    {
        $timeSlots = array();
    }

    public function nextWorkingDay()
    {
        return new \DateTime();
    }

}