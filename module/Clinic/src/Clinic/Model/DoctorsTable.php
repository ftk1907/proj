<?php
namespace Clinic\Model;

use Zend\Db\TableGateway\TableGateway;

class DoctorsTable {

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
    	$resultSet = $this->tableGateway->select();
    	return $resultSet;
    }

	public function saveDoctor(Doctors $doctor) 
	{
		// Fetch data to save
		$data = array(
			'name' 		=> $doctor->name,
			'surname' 	=> $doctor->surname,
			'email' 	=> $doctor->email,
			'password' 	=> $doctor->password,
		);
		
		// Insert the data to the table
		$this->tableGateway->insert($data);
	}

	public function deleteDoctor($id) 
	{		
		$this->tableGateway->delete(array('id' => $id));
	}


}