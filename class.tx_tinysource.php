<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2008-2010 Christopher Hlubek <hlubek@networkteam.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Main minify class doing the minification.
 *
 * Uses some code from the mc_css_js_compressor extension.
 *
 * @author	Christopher Hlubek <hlubek@networkteam.com>
 * @package	TYPO3
 * @subpackage	tx_minify
 */
class tx_tinysource {

	var $conf;

	public function tinysource(&$params, &$obj) {

		$this->conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_tinysource.'];
		
		if ($this->conf['enable']) {
			$tinySource = $GLOBALS['TSFE']->content;
			
			if (!$this->conf['makeEverythingTiny']) {
				preg_match_all('/(.*?<body.*?>)(.*)(<\/body>.*)/is', $tinySource, $parts);
				$beforeBody = $parts[1][0];
				$body = $parts[2][0];
				$afterBody = $parts[3][0];
				
				$GLOBALS['TSFE']->content = $beforeBody . $this->makeTiny($body) . $afterBody;
			} else {
				$GLOBALS['TSFE']->content = $this->makeTiny($tinySource);
			}
		}
	}
	
	private function makeTiny($source) {
		$source = str_replace(array("\t", "\r", "\n"), '', $source);
		$source = str_replace("  ", " ", $source);
		if ($this->conf['stripComments']) {
			$source = preg_replace('/<\!\-\-.*?\-\->/is', '', $source);
		}
		return $source;
	}
}

?>