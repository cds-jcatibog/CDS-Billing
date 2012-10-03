<?php
return array(
	'modules' => array(
		'DluTwBootstrap',
		'DluTwBootstrapDemo',
		'AnalyticsAPI',
		'Application',
		'ZfcBase',
		'ZfcUser',
		'CdliTwoStageSignup',
		'Analytics',
		'Basecamp',
		'Clients',
	),
	'module_listener_options' => array(
		'config_glob_paths'    => array(
			'config/autoload/{,*.}{global,local}.php',
		),
		'module_paths' => array(
			'./module',
			'./vendor',
		),
	),
);