<?php
namespace DluTwBootstrapDemo;

use Zend\ServiceManager\ServiceManager;

/**
 * Module class
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class Module
{
    /* ********************** METHODS ************************** */

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        $moduleConfig   = include __DIR__ . '/config/module.config.php';
        $navConfig      = include __DIR__ . '/config/nav.config.php';
        $config         = array_merge($moduleConfig, $navConfig);
        return $config;
    }

    public function init(\Zend\ModuleManager\ModuleManager $moduleManager) {
        $sharedEvents   = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', array($this, 'onModuleDispatch'));
    }

    public function onModuleDispatch(\Zend\Mvc\MvcEvent $e) {
        //Set the layout template for every action in this module
        $controller         = $e->getTarget();
        $controller->layout('layout/layouttwb-demo');

        //Set the main menu into the layout view model
        $serviceManager     = $e->getApplication()->getServiceManager();
        $navbarContainer    = $serviceManager->get('dlu_twb_demo_navigation');

        $viewModel          = $e->getViewModel();
        $viewModel->setVariable('navbar', $navbarContainer);

        //Set the version information into the layout view model
        $config = $e->getApplication()->getConfig();
        $viewModel->setVariable('supVerZf2', $config['dlu_tw_bootstrap']['sup_ver_zf2']);
        $viewModel->setVariable('supVerTwb', $config['dlu_tw_bootstrap']['sup_ver_twb']);
    }
}
