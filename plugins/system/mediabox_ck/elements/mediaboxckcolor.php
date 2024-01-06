<?php

/**
 * @copyright	Copyright (C) 2011 Cedric KEIFLIN alias ced1870
 * https://www.joomlack.fr
 * @license		GNU/GPL
 * */
// no direct access
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('color');

class JFormFieldMediaboxckcolor extends JFormFieldColor {

	protected $type = 'Mediaboxckcolor';

	protected function getInput() {
		// Initialize some field attributes.
		$icon = $this->element['icon'];
		$suffix = $this->element['suffix'];

		$html = '';
		if (version_compare(JVERSION, '4') < 0) {
		$html .= '<div style="display:inline-block;vertical-align:top;margin-top:4px;width:20px;"><img src="' . JUri::root(true) . '/plugins/system/mediabox_ck/assets' . '/images/color.png" style="margin-right:5px;" /></div>';
		}

		$html .= parent::getInput();
		if ($suffix)
			$html .= '<span style="display:inline-block;line-height:25px;">' . $suffix . '</span>';
		return $html;
	}
}

