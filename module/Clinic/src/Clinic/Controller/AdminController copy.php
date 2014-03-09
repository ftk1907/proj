<?php

namespace Clinic\Controller;
use Zend\Mvc\Controller\AbstractActionController;

abstract AdminController extends AbstractActionController {

	private $repository;
	private $entityName;

	/**
	 * Service locator function for repository.
	 * @param $entityName
	 * @return Repository
	 **/
	protected function getRepository($entityName)
	{
		$this->entityName = $entityName;
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repository = $em->getRepository("Clinic\Entity\{$entityName}")->findAll();
		return $this->repository;
	}

	protected function getEntityManager()
	{
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		return $em;
	}

	/**
	 * @access public
	 * @param a$id
	 */
	public abstract function addAction($entity);

	/**
	 * @access public
	 * @param a$id
	 */
	public abstract function editAction($id);

	/**
	 * @access public
	 * @param a$id
	 */
	public abstract function getAction($attributes);

	/**
	 * @access public
	 * @param a$id
	 */
	public abstract function deleteAction($id);
}
?>