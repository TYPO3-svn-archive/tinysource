<?php
if (!defined('TYPO3_MODE'))
	die ('Access denied.');

if (!is_array($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'])) {
	$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'] = array();
}

array_unshift($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'],
	'EXT:tinysource/class.tx_tinysource.php:&tx_tinysource->tinysource');


$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
	'EXT:tinysource/class.tx_tinysource.php:&tx_tinysource->tinysource';

?>