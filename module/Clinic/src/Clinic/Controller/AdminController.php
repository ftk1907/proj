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
		$name  = $this->params('entity');
		$id    = $this->params('id');
		$table = $this->getTable($name);
		$table->delete($id);
	}


	public function patientsAction()
	{
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$patients = $em->getRepository('Clinic\Entity\Patients')->findAll();
		return array('patients' => $patients);
	}

	public function deleteDoctorAction()
	{
		$id = $this->params('id');
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$doctor = $em->getRepository('Clinic\Entity\Doctors')->findBy(array('id' => $id));
		$em->remove($doctor);
		$em->flush();
		$this->redirect()->toRoute('admin', array('action' => 'doctors'));
	}

	public function appointmentsAction()
	{
		$id = $this->params('id');
		$data = array('appointments' => array());
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$appointments = $em->getRepository('Clinic\Entity\Appointments');

		if(!$id) {
			$data['appointments'] = $appointments->findAll();
		}
		else {
			$data['appointments'] = $appointments->findBy(array('doctor' => $id));
		}

		return $data;
	}

	public function practitionersAction()
	{
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$practitioners = $em->getRepository('Clinic\Entity\Practitioners')->findAll();
		return array('practitioners' => $practitioners);
	}
}