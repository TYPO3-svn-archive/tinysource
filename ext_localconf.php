<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
	'EXT:tinysource/class.tx_tinysource.php:&tx_tinysource->tinysource';

?>