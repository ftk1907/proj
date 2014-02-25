<?php

namespace Clinic\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Clinic\Model\Calendar;

class IndexController extends AbstractActionController
{

	protected $appointmentsTable;

	public function indexAction()
	{
		return array(
			'appointments' => $this->getAppointmentsTable()->fetchThisWeek(),
		);
	}

    public function calendarAction()
    {
        return array('calendar' => new Calendar());
    }

	public function getAppointmentsTable()
    {
    	if (!$this->appointmentsTable) {
            $sm = $this->getServiceLocator();
            $this->appointmentsTable = $sm->get('Clinic\Model\AppointmentsTable');
        }
        return $this->appointmentsTable;
    }
}