<?php 

namespace Clinic\Controller;

use Clinic\Controller\AbstractClinicController;
use Clinic\Form\AdminLoginForm;
use Clinic\Model\Doctors;
use Clinic\Form\DoctorRegisterForm;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractClinicController {

	protected $alf;
	protected $drf;

	public function indexAction()
	{
		$this->alf = new AdminLoginForm();
		return array(
			'form' => $this->alf,			
		);
	}

	public function loginAction()
	{
		//TODO: use filters
		$email = $this->getRequest()->getPost('email');
		return array(
			'email' => $email,
		);
	}

	public function registerDoctorAction()
	{
		$form = new DoctorRegisterForm();
		$form->get('submit')->setValue('Add');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$doctor = new Doctors();
			$form->setInputFilter($doctor->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$doctor->exchangeArray($form->getData());
				$this->getDoctorsTable()->saveDoctor($doctor);

				// Redirect to list of Doctors
				return $this->redirect()->toRoute('home');
			}
		}
		return array('form' => $form);
	}

	public function doctorsAction()
	{
		$this->checkIfLoggedIn();
		$doctors = $this->getDoctorsTable()->fetchAll();
		$doctorsView = new ViewModel(array('doctors' => $doctors));
		$loginActionView = new ViewModel($this->indexAction());
		$loginActionView->setTemplate('clinic/admin/index');

		$doctorsView->addChild($loginActionView, 'block');

		return $doctorsView;
	}

	public function editAction()
	{
		# code... 
		# read table name from param
		# read id
		# show form or update table
	}
	
	public function addAction()
	{
		# code... 
		# read table name from param
		# show form or update table
	}

	public function deleteAction()
	{
		# code... 
		# read table name from param
		# read id
		# delete from table
	}


	public function patientsAction()
	{
		$patients = $this->getPatientsTable()->fetchAll();
		return array('patients' => $patients);
	}

	public function deleteDoctorAction()
	{
		try {
			$id = $this->params('id');
			$this->getDoctorsTable()->deleteDoctor($id);
			$this->redirect()->toRoute('admin', array('action' => 'doctors'));
		}
		catch (Exception $e) {
			return array('exception' => $e);
		}
	}

	public function appointmentsAction()
	{
		$id = $this->params('id');
		$data = array('appointments' => array());
		if(!$id) {
			$data['appointments'] = $this->getAppointmentsTable()->fetchAll();
		}
		else {
			$data['appointments'] = $this->getAppointmentsTable()->fetchDoctorsAppointments($id);
		}

		return $data;
	}

	public function practitionersAction()
	{
		$practitioners = $this->getPractitionersTable()->fetchAll();
		return array('practitioners' => $practitioners);
	}

}