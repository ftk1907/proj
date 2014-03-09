 <?php

namespace Clinic\Form;

use Zend\Form\Form;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PractitionerRegisterForm implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $form = new Form;

        $form->add(array(
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

        $form->add(array(
            'name' => 'surname',
            'type' => 'text',
            'options' => array(
                'label' => 'Surname',
            ),
            'attributes' => array(
                'placeholder' => ''
            ),
        ));

        $form->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'placeholder' => 'your@email.com'
            ),
        ));

        $form->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
        ));

        $form->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

        return $form;
    }
}