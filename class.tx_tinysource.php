<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Armin Ruediger Vieweg <info@professorweb.de>
 * (c) 2012 Dennis Römmich <dennis@roemmich.eu>
*
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
 * Main tinysource class
 *
 * @author	Armin Ruediger Vieweg <info@professorweb.de>
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @package	TYPO3
 * @subpackage	tx_tinysource
 */
class tx_tinysource {

	/**
	 * @var array Configuration of tx_tinysource
	 */
	public $conf = array();

	/**
	 * @var string
	 */
	const TINYSOURCE_HEAD = 'head.';

	/**
	 * @var string
	 */
	const TINYSOURCE_BODY = 'body.';

	public function tinysource(&$params, &$obj) {
		$this->conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_tinysource.'];

		if ($this->conf['enable'] && !$GLOBALS['TSFE']->config['config']['disableAllHeaderCode']) {
			$source = $GLOBALS['TSFE']->content;
			preg_match_all('/(.*?<head.*?>)(.*)(<\/head>.*?<body.*?>)(.*)(<\/body>.*)/is', $source, $parts);

			$beforeHead = $parts[1][0];
			$head = $parts[2][0];
			$afterHead = $parts[3][0];
			$body = $parts[4][0];
			$afterBody = $parts[5][0];

			$head = $this->makeTiny($head, self::TINYSOURCE_HEAD);
			$body = $this->makeTiny($body, self::TINYSOURCE_BODY);

			$GLOBALS['TSFE']->content = $this->customReplacements($beforeHead. $head . $afterHead . $body . $afterBody);

		}
	}

	/**
	 * Gets the configuration and makes the source tiny, <head> and <body>
	 * separated
	 *
	 * @param string $source
	 * @param string $type BODY or HEAD
	 *
	 * @return string the tiny source code
	 */
	private function makeTiny($source, $type) {
		// Get replacements
		$replacements = array();

		if ($this->conf[$type]['stripTabs']) {
			$replacements[] = "\t";
		}
		if ($this->conf[$type]['stripNewLines']) {
			$replacements[] = "\n";
			$replacements[] = "\r";
		}

		// Do replacements
		$source = str_replace($replacements, '', $source);

		// Strip comments (only for <body>)
		if ($this->conf[$type]['stripComments'] && $type == self::TINYSOURCE_BODY) {
			$source = preg_replace('/<\!\-\-.*?\-\->/is', '', $source);
		}

		// Strip double spaces
		if ($this->conf[$type]['stripDoubleSpaces']) {
			$source = preg_replace('/( {2,})/is', ' ', $source);
		}
		if ($this->conf[$type]['stripTwoLinesToOne']) {
			$source = preg_replace('/(\n{2,})/is', "\n", $source);
		}
		return $source;
	}

	/**
	 * @param string $source
	 *
	 * @return string the tiny source code with custom replacements
	 */
	private function customReplacements($source) {
		$customReplacements = $this->conf['customReplacements.'];
		ksort($customReplacements);
		foreach($customReplacements as $parameters) {
			switch($parameters['type']) {
				case 'str_replace':
					$source = str_replace($parameters['search'], $parameters['replace'], $source);
					break;
				case 'preg_replace';
					$source = preg_replace($parameters['pattern'], $parameters['replace'], $source);
					break;
			}
		}
		return $source;
	}

}
?>