<?php
namespace DluTwBootstrapDemo\Form;

use Zend\Form\Form;
use Zend\Form\Element;

/**
 * SearchForm
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class SearchForm extends Form
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
               'placeholder'        => 'Search term...',
            ),
            'options'       => array(
               'label'              => 'Text',
            ),
        ));

        //Csrf
        $this->add(new Element\Csrf('csrf'));

        //Submit button
        $this->add(array(
            'name' => 'submitBtn',
            'attributes' => array(
               'type'  => 'submit',
               'value' => 'Search',
            ),
        ));
    }
}