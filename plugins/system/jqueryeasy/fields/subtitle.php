<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
* @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

class JFormFieldSubtitle extends JFormField
{
	public $type = 'Subtitle';

	protected function getLabel()
	{
		$value = trim($this->element['title']);

		$color = $this->element['color'];
		if (empty($color)) {
			$color = '#e65100';
		}

		$html = '</div>';

		$style = array();

		$style[] = 'display: inherit; ';
		$style[] = 'position: relative; ';
		$style[] = 'background: '.$color.'; ';
		$style[] = 'background: linear-gradient(to right, '.$color.' 0%, #fff 100%); ';
		$style[] = 'height: 5px; ';

		$html .= '<div style="'.implode($style).'">';

		if ($value) {
				
			$style = array();

			$style[] = 'font-family: "Courier New", Courier, monospace; ';
			$style[] = 'letter-spacing: 2px; ';
			$style[] = 'font-size: 10px; ';
			$style[] = 'font-weight: bold; ';
			$style[] = 'background-color: #fff; ';
			$style[] = 'color: '.$color.'; ';
			$style[] = 'padding: 0 8px 0 10px; ';
			$style[] = 'position: absolute; ';
			$style[] = 'left: 20px; ';
			$style[] = 'top: -6px; ';
				
			$html .= '<div style=\''.implode($style).'\'>'.JText::_($value).'</div>';
		}

		//$html .= '</div>';

		return $html;
	}

	protected function getInput()
	{
		return '';
	}

}
?>