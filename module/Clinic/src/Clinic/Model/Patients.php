<?php

namespace Clinic\Model;

/**
* 
*/
class Patients
{
	public $id;
	public $email;
	public $name;
	public $surname;
	public $joined;

	function exchangeArray($data)
	{
		$this->id     	= (isset($data['id'])) ? $data['id'] : null;
        $this->email 	= (isset($data['email'])) ? $data['email'] : null;
        $this->name  	= (isset($data['name'])) ? $data['name'] : null;
        $this->surname  = (isset($data['surname'])) ? $data['surname'] : null;
        $this->joined  	= (isset($data['joined'])) ? $data['joined'] : null;
	}
}