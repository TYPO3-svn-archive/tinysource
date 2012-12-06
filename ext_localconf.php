<?php
if (!defined('TYPO3_MODE'))
	die ('Access denied.');

array_unshift($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'],
	'EXT:tinysource/class.tx_tinysource.php:&tx_tinysource->tinysource');

?>