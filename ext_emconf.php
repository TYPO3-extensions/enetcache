<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Plugin cache engine',
	'description' => 'Provides an interface to cache plugin content elements based on 4.3 caching framework',
	'category' => 'Frontend',
	'version' => '1.1.1',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 1,
	'author' => 'Michael Knabe',
	'author_email' => 'mk@e-netconsulting.de',
	'author_company' => 'e-netconsulting KG',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.2.99',
			'php' => '5.3.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
);