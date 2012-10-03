<?php
return array(
    'router' => array(
        'routes' => array(
            'dlu_twb_demo_demo' => array(
                'type'    => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/tw-bootstrap-demo[/:action]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'DluTwBootstrapDemo\Controller\Demo',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'DluTwBootstrapDemo\Controller\Demo'     => 'DluTwBootstrapDemo\Controller\DemoController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layouttwb-demo' => __DIR__ . '/../view/layout/layouttwb-demo.phtml',
        ),
        'template_path_stack' => array(
            'dluTwBootstrapDemo'    => __DIR__ . '/../view',
        ),
    ),
    'service_manager'   => array(
        'factories'         => array(
            'dlu_twb_demo_navigation'       => 'DluTwBootstrapDemo\Navigation\Service\DluTwbDemoNavigationFactory',
        ),
    ),
);
