<?php
namespace Clinic;
use Clinic\Model\Calendar;

use Clinic\Model\Appointments;
use Clinic\Model\AppointmentsTable;

use Clinic\Model\Doctors;
use Clinic\Model\DoctorsTable;

use Clinic\Model\Practitioners;
use Clinic\Model\PractitionersTable;

use Clinic\Model\Patients;
use Clinic\Model\PatientsTable;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;




class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                // Appointments
                'Clinic\Model\AppointmentsTable' =>  function($sm) {
                    $tableGateway = $sm->get('AppointmentsTableGateway');
                    $table = new AppointmentsTable($tableGateway);
                    return $table;
                },
                'AppointmentsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Appointments());
                    return new TableGateway('appointments', $dbAdapter, null, $resultSetPrototype);
                },
                // Doctors
                'Clinic\Model\DoctorsTable' =>  function($sm) {
                    $tableGateway = $sm->get('DoctorsTableGateway');
                    $table = new DoctorsTable($tableGateway);
                    return $table;
                },
                'DoctorsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Doctors());
                    return new TableGateway('doctors', $dbAdapter, null, $resultSetPrototype);
                },
                // Practitioners
                'Clinic\Model\PractitionersTable' =>  function($sm) {
                    $tableGateway = $sm->get('PractitionersTableGateway');
                    $table = new DoctorsTable($tableGateway);
                    return $table;
                },
                'PractitionersTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Practitioners());
                    return new TableGateway('practitioners', $dbAdapter, null, $resultSetPrototype);
                },

                'Clinic\Model\PatientsTable' =>  function($sm) {
                    $tableGateway = $sm->get('PatientsTableGateway');
                    $table = new PatientsTable($tableGateway);
                    return $table;
                },

                'PatientsTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Patients());
                    return new TableGateway('patients', $dbAdapter, null, $resultSetPrototype);
                },

                'Calendar' => function() {
                    return new Calendar();
                },

                'PractitionerRegisterForm' => 'Clinic\Form\PractitionerRegisterForm',
            ),
        );

    }
}
