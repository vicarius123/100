<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Quiz_fabrika
 * @author     Cristopher Chong <chris@none.ru>
 * @copyright  2017 Cristopher Chong
 * @license    Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Questions list controller class.
 *
 * @since  1.6
 */
class Quiz_fabrikaControllerQuestions extends Quiz_fabrikaController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Questions', $prefix = 'Quiz_fabrikaModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
