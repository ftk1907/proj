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

    public function fetchPatientsAppointments($patientId)
    {
        $resultSet = $this->tableGateway->select(array('patient'=>$patientId));
        return $resultSet;
    }

    public function fetchPractitionersAppointments($practitionerId)
    {
        $resultSet = $this->tableGateway->select(array('patient'=>$patientId));
        return $resultSet;
    }

    public function bookAppointment($appointment)
    {
        $data = array(
            'patient'  => $appointment->patient,
            'doctor'   => $appointment->doctor,
            'date'     => $appointment->date,
        );

        // Insert the data to the table
        $this->tableGateway->insert($data);
    }

    public function cancelAppointment($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

    public function fetchThisWeek()
    {
        $where_clause = "date between CURDATE() AND ADDDATE(CURDATE(), INTERVAL 7 DAY);";
       	$resultSet = $this->tableGateway->select($where_clause);
       	return $resultSet;
    }
}