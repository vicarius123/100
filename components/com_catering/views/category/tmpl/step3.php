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
	
	$services = $model->getServices();
	$count = 1;
	
	
?>
<div class="second-step">
	<div class="selected-menu">
		<div class="wrapper">
			<div class="row flex-middle">
				<div class="col-sm-9">
					<h3 class="nomargin">Кавказский банкет</h3>
				</div>
				<div class="col-sm-3 text-right">
					<p class="nomargin">Гостей: 20</p>
				</div>
			</div>
				<div class="col-sm-7">
				<p>АЛКОГОЛЬ, ТОРТ, МЕБЕЛЬ, ПОДБОР ПЛОЩАДКИ, БОКАЛЫ ПОД СВОЙ АЛКОГОЛЬ, ТЕКСТИЛЬ</p>	
				</div>
		</div>
	</div>
	<div class="services-ctn">
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-8 text-center">
					<br>
					<h1 class="nomargin">Дата, время и место банкета</h1>
					<br>
					<div class="each-service">
						
						<div class="row">
							<div class="col-sm-8">
								<div id="calendar"></div>
							</div>
						</div>
						
						
						
						<script type="text/javascript">
							jQuery(function(){
								jQuery('#calendar').datepicker({
									inline: true,
									showOtherMonths: false,
									firstDay: 1,
									dayNamesMin: ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'],
								});
							});
						</script>
						<br><br><br>
						<div class="text-center buttons-ctn">
							<a href="#" class="button-back">НАЗАД</a>
							<a href="#" class="button-next">ДАЛЕЕ</a>
						</div>
						<br><br><br>
					</div>
				</div>
				<div class="col-sm-4">
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
							</div>
														