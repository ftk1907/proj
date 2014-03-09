<?php

namespace Clinic\Controller;
use Clinic\Controller\AdminController;

class AdminPractitionersController extends AdminController {

	private $form;

	public function addAction()
	{
		if ( is_null($this->form) ) {
            $this->form =
                $this->getServiceManager()->get('PractitionerRegisterForm');
        }
        return $this->form;
	}

	public function editAction() {
		// Not yet implemented
	}

	public function getAction()
	{
		$practitioners = $this->getRepository('Practitioners')->findAll();
		return array('practitioners' => $practitioners);
	}

	public function deleteAction($id)
	{
		$id = $this->params('id');
		if(!empty($id)) {
			$em = $this->getEntityManager();
			$entity = $em->find($id, 'Clinic\Entity\Practitioners');
			$this->getEntityManager()->remove($entity);
			$em->flush();
			return array(
				'message' => 'Practitioners Deleted',
				'redirectTo' => 'AdminPractitioners'
			);
		} else {
			return array(
				'message' => 'Error: Practitioner not found',
				'redirectTo' => 'AdminPractitioners'
			);
		}
	}
}