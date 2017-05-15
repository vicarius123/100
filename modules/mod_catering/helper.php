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

/**
 * Helper for mod_catering
 *
 * @package     com_catering
 * @subpackage  mod_catering
 * @since       1.6
 */
class ModCateringHelper
{
	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return array Array with all the elements
	 */
	public static function getList(&$params)
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($params->get('table'))
			->where('state = 1');

		$db->setQuery($query, $params->get('offset'), $params->get('limit'));
		$rows = $db->loadObjectList();

		return $rows;
	}

	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return mixed stdClass object if the item was found, null otherwise
	 */
	public static function getItem(&$params)
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($params->get('item_table'))
			->where('id = ' . intval($params->get('item_id')));

		$db->setQuery($query);
		$element = $db->loadObject();

		return $element;
	}

	/**
	 * Render element
	 *
	 * @param   Joomla\Registry\Registry $table_name  Table name
	 * @param   string                   $field_name  Field name
	 * @param   string                   $field_value Field value
	 *
	 * @return string
	 */
	public static function renderElement($table_name, $field_name, $field_value)
	{
		$result = '';
		        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
		switch ($table_name)
		{
			
		case '#__catering_items':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'picture':
						if (!empty($field_value)) {
							$result = JPATH_ADMINISTRATOR . 'components/com_catering/images/food/' . $field_value;
						} else {
							$result = $field_value;
						}
		break;
		case 'category':
		$query = "SELECT id, name FROM `#__catering_category` WHERE state = 1 HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->name) ? $field_value : $results->name;
		break;
		case 'type':
		$result = $field_value;
		break;
		case 'price':
		$result = $field_value;
		break;
		case 'weight':
		$result = $field_value;
		break;
		case 'cuisine':
		$query = "SELECT id,name FROM `#__catering_cuisine` WHERE state = 1 HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->name) ? $field_value : $results->name;
		break;
		}
		break;
		case '#__catering_service':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'name':
		$result = $field_value;
		break;
		}
		break;
		case '#__catering_cuisine':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'name':
		$result = $field_value;
		break;
		}
		break;
		case '#__catering_category':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'picture':
						if (!empty($field_value)) {
							$result = JPATH_ADMINISTRATOR . 'components/com_catering/images/category/' . $field_value;
						} else {
							$result = $field_value;
						}
		break;
		}
		break;
		case '#__catering_reserve':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__catering_services':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'type':
		$query = "SELECT id,name FROM #__catering_service WHERE state = 1 HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->title) ? $field_value : $results->title;
		break;
		case 'desc':
		$result = $field_value;
		break;
		}
		break;
		}

		return $result;
	}

	/**
	 * Returns the translatable name of the element
	 *
	 * @param   Joomla\Registry\Registry &$params Module parameters
	 * @param   string                   $field   Field name
	 *
	 * @return string Translatable name.
	 */
	public static function renderTranslatableHeader(&$params, $field)
	{
		return JText::_(
			'MOD_CATERING_HEADER_FIELD_' . str_replace('#__', '', strtoupper($params->get('table'))) . '_' . strtoupper($field)
		);
	}

	/**
	 * Checks if an element should appear in the table/item view
	 *
	 * @param   string $field name of the field
	 *
	 * @return boolean True if it should appear, false otherwise
	 */
	public static function shouldAppear($field)
	{
		$noHeaderFields = array('checked_out_time', 'checked_out', 'ordering', 'state');

		return !in_array($field, $noHeaderFields);
	}

	
}
