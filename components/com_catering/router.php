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
	
	JLoader::registerPrefix('Catering', JPATH_SITE . '/components/com_catering/');
	
	/**
		* Class CateringRouter
		*
		* @since  3.3
	*/
	class CateringRouter extends JComponentRouterBase
	{
		/**
			* Build method for URLs
			* This method is meant to transform the query parameters into a more human
			* readable form. It is only executed when SEF mode is switched on.
			*
			* @param   array  &$query  An array of URL arguments
			*
			* @return  array  The URL arguments to use to assemble the subsequent URL.
			*
			* @since   3.3
		*/
		public function build(&$query)
		{
			$segments = array();
			$view     = null;
			if($query['view'] == 'category'){
				$app  = JFactory::getApplication('com_catering');
				$menu   = $app->getMenu();
				$items   = $menu->getItems('component', 'com_catering');
				foreach($items as $item){
					$params = $item->params;
					$item_id = $params->get('item_id');
					if(!empty($item_id)){
						if($query['id'] == $item_id){
							$route = $item->route;
							
							$segments[] = $route;
							$view = $route;
							
							unset($query['view']);
							
							
						}
					}
					
					
				}
				if (isset($query['id'])){
					
					
					unset($query['id']);
				}
				
				
			}
			else
			{
				
				
				if (isset($query['task']))
				{
					$taskParts  = explode('.', $query['task']);
					$segments[] = implode('/', $taskParts);
					$view       = $taskParts[0];
					unset($query['task']);
				}
				
				if (isset($query['view']))
				{
					$segments[] = $query['view'];
					$view = $query['view'];
					
					unset($query['view']);
				}
				
				if (isset($query['id']))
				{
					if ($view !== null)
					{
						$segments[] = $query['id'];
					}
					else
					{
						$segments[] = $query['id'];
					}
					
					unset($query['id']);
				}
			}
			return $segments;
			
		}
		
		/**
			* Parse method for URLs
			* This method is meant to transform the human readable URL back into
			* query parameters. It is only executed when SEF mode is switched on.
			*
			* @param   array  &$segments  The segments of the URL to parse.
			*
			* @return  array  The URL attributes to be used by the application.
			*
			* @since   3.3
		*/
		public function parse(&$segments)
		{
			$vars = array();
			
			// View is always the first element of the array
			$vars['view'] = array_shift($segments);
			$model        = CateringHelpersCatering::getModel($vars['view']);
			
			while (!empty($segments))
			{
				$segment = array_pop($segments);
				
				// If it's the ID, let's put on the request
				if (is_numeric($segment))
				{
					$vars['id'] = $segment;
				}
				else
				{
					$vars['task'] = $vars['view'] . '.' . $segment;
				}
			}
			
			return $vars;
		}
	}
