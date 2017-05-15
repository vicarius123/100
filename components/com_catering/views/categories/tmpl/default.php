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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$items	=	$this->items;
$count = 1;
$get = (object)JRequest::get();

?>
<div class="menu-main-categories">
	<div class="wrapper">
		<? foreach($items as $item):?>
		<? if ($count%5 == 1): ?>
			<div class="row">
		<? endif;?>
		
		<a href="<?=JRoute::_('index.php?option=com_catering&view=category&id='.$item->id);?>" class="menu-selector"><div class="col-sm-2-5 text-center">
			<div class="category-image">
				<img src="/images/category/<?=$item->picture;?>"/>
			</div>
			<p class="category-title"><?=$item->name;?></p>
		</div></a>
		<? $count++; ?>
		<? if ($count%5 == 1): ?>
			</div>
		<? endif;?>
		<? endforeach; if ($count%5 != 1) echo "</div>";?>
		<div class="help-selector text-center">
			<img src="/images/fork2.svg">
			<p>ПОМОГИТЕ ВЫБРАТЬ</p>
		</div>	
	</div>
</div>