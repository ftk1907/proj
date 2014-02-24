<?php
	
namespace Clinic\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Doctors implements InputFilterAwareInterface {

	public $id;
	public $name;
	public $surname;
	public $email;
	// public $password;
	protected $inputFilter;

	public function exchangeArray($data)
	{
		$this->id     	= (isset($data['id'])) ? $data['id'] : null;
        $this->name 	= (isset($data['name'])) ? $data['name'] : null;
        $this->surname  = (isset($data['surname'])) ? $data['surname'] : null;
        $this->email  	= (isset($data['email'])) ? $data['email'] : null;
		// $this->password = (isset($data['password'])) ? $data['password'] : null;
	}

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used!");
	}

	public function getInputFilter( )
	{
		if(!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$inputFilter->add(
				array(
					'name' => 'name',
					'required' => true,
					'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
					),
				)
			);	

			$inputFilter->add(
				array(
					'name' => 'surname',
					'required' => true,
					'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
					),
				)
			);
			$inputFilter->add(
				array(
					'name' => 'email',
					'required' => true,
					'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
					),
				)
			);
			$inputFilter->add(
				array(
					'name' => 'password',
					'required' => true,
					'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
					),
				)
			);
			$this->inputFilter = $inputFilter;
		}	

		return $this->inputFilter;
	}


}