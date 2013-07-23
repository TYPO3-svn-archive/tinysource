<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "tinysource".
 *
 * Auto generated 22-04-2013 12:06
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
	'version' => '2.1.2',
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
			'typo3' => '4.5.0-6.1.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:6:{s:23:"class.tx_tinysource.php";s:4:"6ac4";s:12:"ext_icon.gif";s:4:"43ce";s:17:"ext_localconf.php";s:4:"929e";s:14:"ext_tables.php";s:4:"3884";s:14:"doc/manual.sxw";s:4:"befa";s:16:"static/setup.txt";s:4:"e3ba";}',
	'suggests' => array(
	),
);

?>