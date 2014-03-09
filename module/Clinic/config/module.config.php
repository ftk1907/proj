<?php
return array(

    'controllers' => array(
        'invokables' => array(
            'Clinic\Controller\Index' => 'Clinic\Controller\IndexController',
            'Clinic\Controller\Admin' => 'Clinic\Controller\AdminController',
            'Clinic\Controller\AdminDoctors' => 'Clinic\Controller\AdminDoctorsController',
            'Clinic\Controller\AdminPatients' => 'Clinic\Controller\AdminPatientsController',
            'Clinic\Controller\AdminPractitioners' => 'Clinic\Controller\AdminPractitionersController',
            'Clinic\Controller\AdminAppointments' => 'Clinic\Controller\AdminAppointmentsController',
            'Clinic\Controller\User'  => 'Clinic\Controller\UserController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'clinic' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/index[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'admin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\Admin',
                        'action'     => 'index',
                    ),
                ),
            ),
            'adminDoctors' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/doctors[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\AdminDoctors',
                        'action'     => 'index',
                    ),
                ),
            ),
            'adminPatients' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/patients[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\AdminPatients',
                        'action'     => 'index',
                    ),
                ),
            ),
            'adminPractitioners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/practitioners[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\AdminPractitioners',
                        'action'     => 'index',
                    ),
                ),
            ),
            'adminAppointments' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/appointments[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\AdminAppointments',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clinic\Controller\User',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'clinic' => __DIR__ . '/../view',
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Clinic/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Clinic\Entity' => 'application_entities'
                ),
            ),
        ),
    ),
);
