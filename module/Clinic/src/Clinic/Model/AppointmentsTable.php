<?php

namespace Clinic\Model;

use Zend\Db\TableGateway\TableGateway;

class AppointmentsTable {

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

    public function fetchDoctorsAppointments($doctorId)
    {
        $resultSet = $this->tableGateway->select(array('doctor'=>$doctorId));
        return $resultSet;
    }

    public function fetchThisWeek()
    {
        $where_clause = "date between CURDATE() AND ADDDATE(CURDATE(), INTERVAL 7 DAY);";
       	$resultSet = $this->tableGateway->select($where_clause);
       	return $resultSet;
    }
}