<?php

namespace Clinic\Form;

use Zend\Form\Form;


class DoctorRegisterForm extends Form {

    public function __construct($name = null)
    {
        parent::__construct("doctorRegister");


        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'autofocus' => 'true',
                'placeholder' => ''
            ),
        ));
        $this->add(array(
            'name' => 'surname',
            'type' => 'text',
            'options' => array(
                'label' => 'Surname',
            ),
            'attributes' => array(
                'placeholder' => ''
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'placeholder' => 'your@email.com'
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'password',  
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}