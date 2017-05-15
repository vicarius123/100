<?php

/**
 * @version     CVS: 1.0.0
 * @package     com_quiz_fabrika
 * @subpackage  mod_quiz_fabrika
 * @author      Cristopher Chong <chris@none.ru>
 * @copyright   2017 Cristopher Chong
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the syndicate functions only once
JLoader::register('ModQuiz_fabrikaHelper', dirname(__FILE__) . '/helper.php');

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/media/mod_quiz_fabrika/css/style.css');

/* */
$doc->addScript(JURI::base() . '/media/mod_quiz_fabrika/js/script.js');

require JModuleHelper::getLayoutPath('mod_quiz_fabrika', $params->get('content_type', 'blank'));
