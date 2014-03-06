<?php

namespace Clinic\Controller;
use Zend\Mvc\Controller\AbstractActionController;

abstract AdminController extends AbstractActionController {

	private $repository;

	private function setRepository($entityName)
	{
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repository = $em->getRepository("Clinic\Entity\{$entityName}")->findAll();
		return $this->repository;
	}

	private function getRepository()
	{
		return $this->repository;
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function addAction($entity)
	{
		$this->repository->persist($entity);
		$repository->flush();
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public abstract function editAction();

	/**
	 * @access public
	 * @param a$id
	 */
	public function getAction($attributes)
	{
		return array('entities', $repository->findBy($attributes));
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public function deleteAction($id);
}
?>