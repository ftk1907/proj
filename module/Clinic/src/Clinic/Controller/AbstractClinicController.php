<?php

namespace Clinic\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
*
*/
abstract class AbstractClinicController extends AbstractActionController
{
	private   $loggedIn = true;

	protected $doctorsTable;
	protected $appointmentsTable;
	protected $practitionersTable;
	protected $patientsTable;

	protected static const Patients = 0;
	protected static const Doctors = 1;
	protected static const Practitioners = 2;
	protected static const Appointments = 3;


	public function indexAction()
	{
		new ViewModel();
	}

	public function loginAction()
	{

	}

	public function checkIfLoggedIn()
	{
		if($this->loggedIn) {
			return;
		} else {
			$this->redirect()->toRoute('admin', array('action' => 'login'));
		}
	}

	public function getTable($entity)
	{
		$table = null;
		switch ($entity) {
			case "patients":
				$table = $this->getPatientsTable();
				break;
			case "doctors":
				$table = $this->getDoctorsTable();
				break;
			case "practitioners":
				$table = $this->getPractitionersTable();
				break;
			case "patients":
				$table = $this->getPatientsTable();
				break;
			default:
				# code...
				break;
		}

		return $table;
	}

	public function getPatientsTable()
	{
		if (!$this->patientsTable) {
			$sm = $this->getServiceLocator();
			$this->patientsTable = $sm->get('Clinic\Model\PatientsTable');
		}
		return $this->patientsTable;
	}

	public function getDoctorsTable()
	{
		if (!$this->doctorsTable) {
		 $sm = $this->getServiceLocator();
		 $this->doctorsTable = $sm->get('Clinic\Model\DoctorsTable');
		}
		return $this->doctorsTable;
	}

	public function getAppointmentsTable()
	{
		if (!$this->appointmentsTable) {
		 $sm = $this->getServiceLocator();
		 $this->appointmentsTable = $sm->get('Clinic\Model\AppointmentsTable');
		}
		return $this->appointmentsTable;
	}

	public function getPractitionersTable()
	{
		if (!$this->practitionersTable) {
		 $sm = $this->getServiceLocator();
		 $this->practitionersTable = $sm->get('Clinic\Model\PractitionersTable');
		}
		return $this->practitionersTable;
	}

}