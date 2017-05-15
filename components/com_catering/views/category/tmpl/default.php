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
$get = (object)JRequest::get();
$model = $this->getModel();
$app = JFactory::getApplication();
$menu = $app->getMenu();
$item = $menu->getItem($get->Itemid);
$params = $item->params;
$item_id = $params->get('item_id');

$items = $model->getItems($item_id);

$categories = $model->getCuisine();
$n = 0;
$count = 1;

?>
<div class="inner-category food-list">
	<div class="wrapper">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="text-center category-title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
				
				<? foreach($categories as $category): $n++;?>
				<h3 class="food-type text-center"><?=$n.'. '.$category->name;?></h3>
				<? foreach($items as $item):?>
					<? if($category->id == $item->cuisine):?>
						<? if ($count%3 == 1){ ?>
						<div class="row">
						<? } ?>
						<a href="#item-<?=$item->id;?>" class="fancybox popup-ctn"><div class="col-sm-4 text-center">
							<div class="food-pic">
								<img src="/images/food/<?=$item->picture;?>"/>
							</div>
							<br>
							<p class="food-title"><?=$item->name;?></p>
						</div></a>
						
						<div class="popup-item text-center" style="display:none" id="item-<?=$item->id;?>">
							<div class="popup-image">
								<img src="/images/food/<?=$item->picture;?>"/>
							</div>
							<h3 class="popup-title"><?=$item->name;?></h3>
							<p class="popup-item-desc">
								<i>Состав:</i><br>
								<?=$item->desc;?>
							</p>
						</div>
						<? if ($count%3 == 0){?>
						</div>
						<? } $count++;?>
					
					<? endif;?>
				<? endforeach; if ($count%3 != 1) echo "</div>";?>
				<? endforeach;?>
				<br><br><br>
				<div class="text-center buttons-ctn">
					<a href="#" class="button-back">выбрать Другое меню</a>
					<a href="#" class="button-next">ДАЛЕЕ</a>
				</div>
				<br><br><br>
			</div>
			<div class="col-sm-4 text-center">
				<p class="qt-title">Количество Гостей</p>
				<div class="spinner">
					<input id="spinner" class="spin" name="value" value="20" readonly>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6 text-center">
						<a href="#" class="banquet-selector active">БАНКЕТ</a>
					</div>
					<div class="col-sm-6 text-center">
						<a href="#" class="banquet-selector">ФУРШЕТ</a>
					</div>
				</div>
				<div class="separator-right"></div>
				<div class="banquet-type">
					<a href="#" class="">Попроще</a>
					<a href="#" class="active">Наш вариант</a>
					<a href="#" class="">понаряднее</a>
				</div>
				<div class="order-info-ctn">
					<p class="nomargin"><b>ИТОГО:</b></p>
					<h2 class="order-price">57 868 <small>₽</small></h2>
					<div class="row preorder-info">
						<div class="col-sm-8 text-left">
							<p class="nomargin">Еда на персону</p>
							<p class="nomargin">Напитки на персону</p>
							<p class="nomargin">Итого на персону</p>
						</div>
						<div class="col-sm-4">
							<p class="nomargin">900 гр.</p>
							<p class="nomargin">500 мл.</p>
							<p class="nomargin">5 678 ₽</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
