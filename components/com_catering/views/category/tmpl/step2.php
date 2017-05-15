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
		</div>
	</div>
	<div class="services-ctn">
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-8 text-center">
					<br>
					<h1 class="nomargin">Дополнительные услуги</h1>
					<br>
					<div class="each-service">
						<? foreach($services as $service):?>
						<? if ($count%3 == 1){ ?>
							<div class="row">
							<? } ?>
							<a href="#service-<?=$service->id;?>" class="fancybox" style="color:#333333;"><div class="col-sm-4">
								<div class="service-<?=$service->id;?> service-pic"></div>
								<p class="food-title"><?=$service->name;?></p>
							</div></a>
							<div class="inner-service text-center srvice-<?=$service->id;?>" style="display:none" id="service-<?=$service->id;?>">
									<h3 class="nomargin" style="font-weight: 400;"><?=$service->name;?></h3><br>
									<p>НА КАКОЕ КОЛИЧЕСТВО ЧЕЛОВЕК?</p>
									<br>
									<div class="spinner">
										<input id="spinner" class="spin" name="value" value="20" readonly>
									</div>
									
									<br>
									
							<? 
								$inner_services = $model->getService($service->id);
								
								if(!empty($inner_services)){
									foreach($inner_services as $in_service){?>
									<div class="input-service">
										<input type="checkbox" name="checkboxG1<?=$in_service->id;?>" id="checkboxG1<?=$in_service->id;?>" class="css-checkbox" /><label for="checkboxG1<?=$in_service->id;?>" class="css-label"><?=$in_service->name;?></label>
									</div>	
									
									<?}
									
									foreach($inner_services as $in_service){?>
									<div class="desc-<?=$in_service->id;?>" style="display:none">
										<p><?=$in_service->desc;?></p>
									</div>
									<script>
									jQuery('#checkboxG1<?=$in_service->id;?>').click(function(){
									
										if(jQuery(this).is(':checked')){
											jQuery(this).addClass('checked');
											jQuery('.desc-<?=$in_service->id;?>').fadeIn('fast');
										}else{
											jQuery('.desc-<?=$in_service->id;?>').fadeOut('fast');
										}
										
										var asd = jQuery('.srvice-<?=$service->id;?> .css-checkbox:checked').length;
										if(asd > 0){
											jQuery('.service-<?=$service->id;?>').addClass('active');
										}else{
											jQuery('.service-<?=$service->id;?>').removeClass('active');
										}
									});
									</script>
									<?}
								}
							?>
							<br>
							<div class="service-buttons">
								<div class="text-center buttons-ctn">
									<a href="#" class="button-cancel">ОТМЕНИТЬ</a>
									<a href="#" class="button-save">ДАЛЕЕ</a>
								</div>
							</div>
							
							</div>
							<? if ($count%3 == 0){?>
							</div>
						<? } $count++;?>
						<? endforeach; if ($count%3 != 1) echo "</div>";?>
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
