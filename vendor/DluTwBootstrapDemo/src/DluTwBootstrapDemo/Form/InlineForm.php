<?php
namespace DluTwBootstrapDemo\Form;

use Zend\Form\Form;
use Zend\Form\Element;

/**
 * InlineForm
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class InlineForm extends Form
{
    public function __construct() {
        parent::__construct();

        $this->setName('demoFormInline');
        $this->setAttribute('method', 'post');

        //Text
        $this->add(array(
            'name'          => 'text',
            'type'          => 'Zend\Form\Element\Text',
            'attributes'    => array(
               'placeholder'        => 'Placeholder',
            ),
            'options'       => array(
               'label'              => 'Text',
            ),
        ));

        //Password
        $this->add(array(
            'name'          => 'password',
            'type'          => 'Zend\Form\Element\Password',
            'attributes'    => array(
               'placeholder'       => 'Placeholder',
            ),
            'options'       => array(
               'label'             => 'Password',
            ),
         ));

        //Select
        $this->add(array(
            'name'          => 'select',
            'type'          => 'Zend\Form\Element\Select',
            'options'       => array(
               'label'              => 'Select',
                'value_options'     => array(
                    'alpha'             => 'Alpha',
                    'beta'              => 'Beta',
                    'gamma'             => 'Gamma',
                    'delta'             => 'Delta',
                ),
            ),
        ));

        //Text with append / prepend
        $this->add(array(
            'name'          => 'textAp',
            'type'          => 'Zend\Form\Element\Text',
            'attributes'    => array(
               'placeholder'   => 'Placeholder',
            ),
            'options'       => array(
               'label'         => 'Prepend/Append',
               'appendText'    => 'Append',
            ),
        ));

        //Checkbox
        $this->add(array(
            'name'          => 'checkbox',
            'type'          => 'Zend\Form\Element\Checkbox',
            'options'       => array(
               'label'             => 'Checkbox',
            ),
        ));

        //Csrf
        $this->add(new Element\Csrf('csrf'));

        //Submit button
        $this->add(array(
            'name'       => 'submitBtn',
            'type'       => 'Zend\Form\Element\Submit',
            'attributes' => array(
               'value'      => 'Submit',
            ),
            'options'    => array(
               'primary'    => true,
            ),
        ));

        //Reset button
        $this->add(array(
            'name'       => 'resetBtn',
            'attributes' => array(
               'type'       => 'reset',
               'value'      => 'Reset',
            ),
        ));

        //Plain button
        $this->add(array(
            'name'      => 'plainBtn',
            'type'      => 'Zend\Form\Element\Button',
            'options'   => array(
               'label'      => 'Button',
            ),
        ));
    }
}