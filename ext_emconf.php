<?php

########################################################################
# Extension Manager/Repository config file for ext "tinysource".
#
# Auto generated 09-03-2011 23:56
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Tiny Source',
	'description' => 'The tinysource extension is a small extension which compress the output source code of every page. Basicly it removes linebreaks, tabs, comments and double spaces. The setup of tinysource allows to configure which of these strip-methods shoould be used, separately for <head> and <body>.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '1.0.0',
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
	'author' => 'Armin Rüdiger Vieweg',
	'author_email' => 'info@professorweb.de',
	'author_company' => 'Professor Web - Webdesign Blog',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:6:{s:23:"class.tx_tinysource.php";s:4:"d3fb";s:12:"ext_icon.gif";s:4:"43ce";s:17:"ext_localconf.php";s:4:"ef05";s:14:"ext_tables.php";s:4:"3884";s:14:"doc/manual.sxw";s:4:"5f69";s:16:"static/setup.txt";s:4:"f34e";}',
	'suggests' => array(
	),
);

?>