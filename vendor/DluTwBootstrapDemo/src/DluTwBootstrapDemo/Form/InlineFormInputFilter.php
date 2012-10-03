<?php
namespace DluTwBootstrapDemo\Form;
use Zend\InputFilter\InputFilter;

/**
 * InlineFormInputFilter
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class InlineFormInputFilter extends InputFilter
{
    public function __construct() {
        //Text
        $this->add(array(
                       'name'          => 'text',
                       'required'      => false,
        ));
        //Password
        $this->add(array(
                       'name'          => 'password',
                       'required'      => true,
        ));
        //Select
        $this->add(array(
                       'name'          => 'select',
                       'required'      => false,
        ));
        //Text append / prepend
        $this->add(array(
                       'name'          => 'textAp',
                       'required'      => false,
        ));
        //Checkbox
        $this->add(array(
                       'name'          => 'checkbox',
                       'required'      => false,
        ));
    }
}