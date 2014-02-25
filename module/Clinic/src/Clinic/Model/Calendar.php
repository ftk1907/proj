<?php

namespace Clinic\Model;


class Calendar
{
    protected $date;
    protected $slot_duration_minutes;
    protected $end_of_day;
    protected $end_of_week;
    protected $next_slot;
    protected $day_count;
    protected $slots;

	function __construct()
	{
        $this->date = new \DateTime("Europe/London");
        $this->beginning_of_day = 9;
        $this->end_of_day = '16:40';
        $this->slot_duration_minutes = 20;
        $this->slots = array();
	}

    public function isEndOfDay()
    {
        return ($this->date->format('H:i') >= $this->end_of_day);
    }

    public function isEndOfWeek()
    {
        $date = new \DateTime('Europe/London');
        $date->modify('+ 1 week 2 days');
        return ($date->diff($this->date)->days <= 0 && $this->isEndOfDay());
    }

    public function testWeek()
    {
        $date = new \DateTime('Europe/London');
        $date->modify('+ 1 week');
        echo ($date->diff($this->date)->days <= 0);
    }

    public function nextWorkingDay()
    {
        $day = $this->date->format('D');

        if(!($day == 'Fri')){
            // Normal day
            $this->date->modify('+ 1 day');
        } else {
            // Skip weekends
            $this->date->modify('+ 3 day');
        }
        // To control end of week
        $this->day_count ++;

        return $this->date;
    }

    public function nextSlot()
    {
        if(!$this->isEndOfDay()){
            // Not end of the day
            $this->date->add(new \DateInterval("PT20M"));
        } else {
            // End of day
            $this->nextWorkingDay();
            $this->date->setTime($this->beginning_of_day, 00);
        }

        return $this->date;
    }

    public function getSlots()
    {
        while(!$this->isEndOfWeek()) {
            // seperate into days
            $this->slots[$this->nextSlot()->format('D dS Y')][] = $this->date->format("H:i");
        }

        return $this->slots;
    }
}