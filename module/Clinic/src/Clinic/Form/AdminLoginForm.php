<?php

namespace Clinic\Form;

use Zend\Form\Form;

 class AdminLoginForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('adminLogin');

         $this->add(array(
             'name' => 'email',
             'type' => 'email',
             'options' => array(
                 'label' => 'Email',
             ),
             'attributes' => array(
                'autofocus' => 'true',
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