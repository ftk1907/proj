<?php

namespace Clinic\Model;

class Appointments
{
	public $id;
    public $patient;
    public $doctor;
	public $practitioner;
	public $date;
    public $confirmed;
    public $missed;

	public function exchangeArray($data)
	{
		$this->id           = (isset($data['id'])) ? $data['id'] : null;
		$this->patient      = (isset($data['patient'])) ? $data['patient'] : null;
        $this->doctor       = (isset($data['doctor'])) ? $data['doctor'] : null;
        $this->practitioner = (isset($data['practitioner'])) ? $data['practitioner'] : null;
        $this->date         = (isset($data['date'])) ? $data['date'] : null;
        $this->confirmed    = (isset($data['confirmed'])) ? $data['confirmed'] : null;
        $this->missed       = (isset($data['missed'])) ? $data['missed'] : null;
	}
}