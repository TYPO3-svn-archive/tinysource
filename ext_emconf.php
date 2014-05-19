<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "tinysource".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Tiny Source',
	'description' => 'Compresses the output source code of every page by removing line breaks, tabs, comments and double spaces. Highly configurable. Works with static file cache extensions.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '3.0.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'armin@v.ieweg.de',
	'author_company' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
);

?>