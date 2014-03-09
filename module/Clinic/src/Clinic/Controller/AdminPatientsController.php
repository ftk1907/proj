<?php

namespace Clinic\Controller;
use Clinic\Controller\AdminController;

class AdminPatientsController extends AdminController {

	/**
	 * @access public
	 * @param a$id
	 */
	public function addAction($aId) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function editAction($aId) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function getAction($aId)
	{
		$patients = $this->getRepository('Patients')->findAll();
		return array('patients' => $patients);
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function deleteAction()
	{
		$id = $this->params('id');
		if(!empty($id))) {
			$em = $this->getEntityManager();
			$entity = $em->find($id, 'Clinic\Entity\Patients'));
			$this->getEntityManager()->remove($entity);
			$em->flush();
			return array(
				'message' => 'Patient Deleted',
				'redirectTo' => 'AdminAppointments'
			);
		} else {
			return array(
				'message' => 'Error: Patients not found',
				'redirectTo' => 'AdminPatients'
			);
		}
	}
}