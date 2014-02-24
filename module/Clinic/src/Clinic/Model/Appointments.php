<?php

namespace Clinic\Model;

class Appointments
{
	public $id;
	public $practitioner;
	public $date;

	public function exchangeArray($data)
	{
		$this->id = (isset($data['id'])) ? $data['id'] : null;
		$this->practitioner = (isset($data['practitioner'])) ? $data['practitioner'] : null;
		$this->date = (isset($data['date'])) ? $data['date'] : null;
	}
}