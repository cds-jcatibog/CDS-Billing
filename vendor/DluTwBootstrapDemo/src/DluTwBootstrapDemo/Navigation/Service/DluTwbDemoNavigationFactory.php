<?php
namespace DluTwBootstrapDemo\Navigation\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

/**
 * DluTwbDemoNavigationFactory
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class DluTwbDemoNavigationFactory extends AbstractNavigationFactory
{
    /**
     * @abstract
     * @return string
     */
    protected function getName() {
        return 'dlu_twb_demo';
    }
}