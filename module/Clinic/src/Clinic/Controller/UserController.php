<?php

namespace Clinic\Controller;

use Clinic\Controller\AbstractClinicController;

/**
* 
*/
class UserController extends AbstractClinicController
{
	protected $calendar;
	
	public function viewCalendarAction( )
	{
		return new ViewModel(array(
			'calendar' => $this->getCalendar()
		));
	}

	public function getCalendar()
	{
		$sm = $this->getServiceLocator();
		$this->calendar = $sm->get('Calendar');
		return $this->calendar;
	}

}