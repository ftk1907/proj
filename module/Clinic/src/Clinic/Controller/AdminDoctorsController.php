<?php

namespace Clinic\Controller;
use Clinic\Controller\AdminController;

class AdminDoctorsController extends AdminController {

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
	public function editAction($aId)
	{

	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function getAction($aId)
	{
		$doctors = $this->getRepository('Doctors')->findAll();
		return array('doctors' => $doctors);
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
			$entity = $em->find($id, 'Clinic\Entity\Doctors'));
			$this->getEntityManager()->remove($entity);
			$em->flush();
			return array(
				'message' => 'Doctor Deleted',
				'redirectTo' => 'AdminDoctors'
			);
		} else {
			return array(
				'message' => 'Error: Doctor not found',
				'redirectTo' => 'AdminDoctors'
			);
		}
	}
}