<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Catering
 * @author     Cristopher Chong <chris@none.ru>
 * @copyright  2017 nOne
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Item controller class.
 *
 * @since  1.6
 */
class CateringControllerItem extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'items';
		parent::__construct();
	}
}
