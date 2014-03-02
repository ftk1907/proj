<?php
return array(

    'controllers' => array(
        'invokables' => array(
            'Clinic\Controller\Index' => 'Clinic\Controller\IndexController',
            'Clinic\Controller\Admin' => 'Clinic\Controller\AdminController',
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
);