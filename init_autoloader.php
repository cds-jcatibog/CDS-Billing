<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * This autoloading setup is really more complicated than it needs to be for most
 * applications. The added complexity is simply to reduce the time it takes for
 * new developers to be productive with a fresh skeleton. It allows autoloading
 * to be correctly configured, regardless of the installation method and keeps
 * the use of composer completely optional. This setup should work fine for
 * most users, however, feel free to configure autoloading however you'd like.
 */

// Composer autoloading
if (file_exists('vendor/autoload.php')) {
	$loader = include 'vendor/autoload.php';
}

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	$zf2Path = '/var/www/html/libs/zf2/library';
} else {
	$zf2Path = '/var/vwebs/'.$_SERVER['SERVER_NAME'].'/zf2/library';
}

if ($zf2Path) {
	if (isset($loader)) {
		$loader->add('Zend', $zf2Path . '/Zend');
	} else {
		include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
		Zend\Loader\AutoloaderFactory::factory(array(
			'Zend\Loader\StandardAutoloader' => array(
				'autoregister_zf' => true,
			)
		));
	}
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) {
	throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}
