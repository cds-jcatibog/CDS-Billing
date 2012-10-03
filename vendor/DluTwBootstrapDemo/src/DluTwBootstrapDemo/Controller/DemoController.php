<?php
namespace DluTwBootstrapDemo\Controller;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

/**
 * DemoController
 * @package DluTwBootstrapDemo
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap-demo
 */
class DemoController extends AbstractActionController
{

    /* ***************************** METHODS ****************************** */

    public function formHorizontalAction()
    {
        $form               = new \DluTwBootstrapDemo\Form\BlockForm();
        $inputFilter        = new \DluTwBootstrapDemo\Form\BlockFormInputFilter();
        $formFile           = '/src/DluTwBootstrapDemo/Form/BlockForm.php';
        $inputFilterFile    = '/src/DluTwBootstrapDemo/Form/BlockFormInputFilter.php';
        $viewScriptFile     = '/view/dlu-tw-bootstrap-demo/demo/form-block-form.phtml';
        $formTemplate       = 'dlu-tw-bootstrap-demo/demo/form-block-form';
        $formType           = \DluTwBootstrap\Form\FormUtil::FORM_TYPE_HORIZONTAL;
        $pageHeading        = 'Horizontal form';
        return $this->formGeneral($form, $inputFilter, $formFile, $inputFilterFile, $viewScriptFile,
                                  $formTemplate, $formType, $pageHeading);
    }

    public function formVerticalAction()
    {
        $form               = new \DluTwBootstrapDemo\Form\BlockForm();
        $inputFilter        = new \DluTwBootstrapDemo\Form\BlockFormInputFilter();
        $formFile           = '/src/DluTwBootstrapDemo/Form/BlockForm.php';
        $inputFilterFile    = '/src/DluTwBootstrapDemo/Form/BlockFormInputFilter.php';
        $viewScriptFile     = '/view/dlu-tw-bootstrap-demo/demo/form-block-form.phtml';
        $formTemplate       = 'dlu-tw-bootstrap-demo/demo/form-block-form';
        $formType           = \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL;
        $pageHeading        = 'Vertical form';
        return $this->formGeneral($form, $inputFilter, $formFile, $inputFilterFile, $viewScriptFile,
                                  $formTemplate, $formType, $pageHeading);
    }

    public function formInlineAction()
    {
        $form               = new \DluTwBootstrapDemo\Form\InlineForm();
        $inputFilter        = new \DluTwBootstrapDemo\Form\InlineFormInputFilter();
        $formFile           = '/src/DluTwBootstrapDemo/Form/InlineForm.php';
        $inputFilterFile    = '/src/DluTwBootstrapDemo/Form/InlineFormInputFilter.php';
        $viewScriptFile     = '/view/dlu-tw-bootstrap-demo/demo/form-inline-form.phtml';
        $formTemplate       = 'dlu-tw-bootstrap-demo/demo/form-inline-form';
        $formType           = \DluTwBootstrap\Form\FormUtil::FORM_TYPE_INLINE;
        $pageHeading        = 'Inline form';
        return $this->formGeneral($form, $inputFilter, $formFile, $inputFilterFile, $viewScriptFile,
                                  $formTemplate, $formType, $pageHeading);
    }

    public function formSearchAction() {
        $form               = new \DluTwBootstrapDemo\Form\SearchForm();
        $inputFilter        = new \DluTwBootstrapDemo\Form\SearchFormInputFilter();
        $formFile           = '/src/DluTwBootstrapDemo/Form/SearchForm.php';
        $inputFilterFile    = '/src/DluTwBootstrapDemo/Form/SearchFormInputFilter.php';
        $viewScriptFile     = '/view/dlu-tw-bootstrap-demo/demo/form-search-form.phtml';
        $formTemplate       = 'dlu-tw-bootstrap-demo/demo/form-search-form';
        $formType           = \DluTwBootstrap\Form\FormUtil::FORM_TYPE_SEARCH;
        $pageHeading        = 'Search form';
        return $this->formGeneral($form, $inputFilter, $formFile, $inputFilterFile, $viewScriptFile,
                                  $formTemplate, $formType, $pageHeading);
    }

    protected function formGeneral($form, $inputFilter, $formFile, $inputFilterFile, $viewScriptFile,
                                 $formTemplate, $formType, $pageHeading
    ) {
        $form->setInputFilter($inputFilter);
        $validData      = null;
        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                $formData   = $form->getData();
                $validData  = \Zend\Debug\Debug::dump($formData, 'Valid form data', false);
            }
        }
        //Source code
        $moduleDir          = realpath(__DIR__ . '/../../../');
        $formSource         = file_get_contents($moduleDir . $formFile);
        $inputFilterSource  = file_get_contents($moduleDir . $inputFilterFile);
        $viewScriptSource   = file_get_contents($moduleDir . $viewScriptFile);
        $viewModelForm      = new ViewModel();
        $viewModelForm->setVariables(array(
                                         'form'         => $form,
                                         'formType'     => $formType,
                                         'validData'    => $validData,
                                     ));
        $viewModelForm->setTemplate($formTemplate);
        $viewModel  = new ViewModel();
        $viewModel->setVariables(array(
                                     'pageHeading'       => $pageHeading,
                                     'formFile'          => $formFile,
                                     'formSource'        => $formSource,
                                     'inputFilterFile'   => $inputFilterFile,
                                     'inputFilterSource' => $inputFilterSource,
                                     'viewScriptFile'    => $viewScriptFile,
                                     'viewScriptSource'  => $viewScriptSource,
                                 ));
        $viewModel->addChild($viewModelForm, 'formOutput');
        $viewModel->setTemplate('dlu-tw-bootstrap-demo/demo/form-demo');
        return $viewModel;
    }

    public function indexAction() {
        return new ViewModel();
    }
}