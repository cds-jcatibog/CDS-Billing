<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Basecamp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Sirprize\Basecamp\Service;

class ProjectsController extends AbstractActionController
{
	public function indexAction()
	{
		$config = array(
			'baseUri' => 'https://indas.basecamphq.com',
			'username' => 'jcatibog',
			'password' => 'tj208259mc'
		);
		
		$service = new Service($config);
		$projects = $service->getProjectsInstance()->startAll();
		
		foreach($projects as $project)
		{
			print $project->getName()."\n";
		}
		return array();
	}

	public function fooAction()
	{
		// This shows the :controller and :action parameters in default route
		// are working when you browse to /module-specific-root/skeleton/foo
		return array();
	}
}
