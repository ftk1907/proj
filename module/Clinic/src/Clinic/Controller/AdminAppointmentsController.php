<?php

namespace Clinic\Controller;
use Clinic\Controller\AdminController;

class AdminAppointmentsController extends AdminController {

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
		$appointments = $this->getRepository('Appointments')->findAll();
		return array('appointments' => $appointments);
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
			$entity = $em->find($id, 'Clinic\Entity\Appointments'));
			$this->getEntityManager()->remove($entity);
			$em->flush();
			return array(
				'message' => 'Appointment Deleted',
				'redirectTo' => 'AdminAppointments'
			);
		} else {
			return array(
				'message' => 'Error: Appointment not found',
				'redirectTo' => 'AdminAppointments'
			);
		}
	}
}
?>