<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Quiz_fabrika
 * @author     Cristopher Chong <chris@none.ru>
 * @copyright  2017 Cristopher Chong
 * @license    Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Class Quiz_fabrikaController
 *
 * @since  1.6
 */
class Quiz_fabrikaController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean $cachable  If true, the view output will be cached
	 * @param   mixed   $urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController   This object to support chaining.
	 *
	 * @since    1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
        $app  = JFactory::getApplication();
        $view = $app->input->getCmd('view', 'questions');
		$app->input->set('view', $view);

		parent::display($cachable, $urlparams);

		return $this;
	}
}
