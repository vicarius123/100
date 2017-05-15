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

/**
 * Catering helper.
 *
 * @since  1.6
 */
class CateringHelpersCatering
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE_ITEMS'),
			'index.php?option=com_catering&view=items',
			$vName == 'items'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE___CATERING_SERVICE2024S'),
			'index.php?option=com_catering&view=__catering_service2024s',
			$vName == '__catering_service2024s'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE_CUISINES'),
			'index.php?option=com_catering&view=cuisines',
			$vName == 'cuisines'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE_CATEGORIES'),
			'index.php?option=com_catering&view=categories',
			$vName == 'categories'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE_RESERVES'),
			'index.php?option=com_catering&view=reserves',
			$vName == 'reserves'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_CATERING_TITLE_ADDSERVICES'),
			'index.php?option=com_catering&view=addservices',
			$vName == 'addservices'
		);

	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_catering';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}


class CateringHelper extends CateringHelpersCatering
{

}
