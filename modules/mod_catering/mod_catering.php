<?php

/**
 * @version     CVS: 1.0.0
 * @package     com_catering
 * @subpackage  mod_catering
 * @author      Cristopher Chong <chris@none.ru>
 * @copyright   2017 nOne
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the syndicate functions only once
JLoader::register('ModCateringHelper', dirname(__FILE__) . '/helper.php');

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/media/mod_catering/css/style.css');

/* */
$doc->addScript(JURI::base() . '/media/mod_catering/js/script.js');

require JModuleHelper::getLayoutPath('mod_catering', $params->get('content_type', 'blank'));
