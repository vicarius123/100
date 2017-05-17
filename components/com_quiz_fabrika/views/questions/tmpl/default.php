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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

$items = $this->items;

$model = $this->getModel();

$first = $items[0]->question;
$first_id = $items[0]->id;

$answers = $model->getQuestion($first_id);
?>
<div class="quiz-start">
	<form method="POST" action="">
		<label><?=$first;?></label>
		<div>
			<? foreach($answers as $answer):?>
			<input type="radio" name="answer1" value="<?=$answer->id;?>" /> <span><?=$answer->question;?></span><br>
			<? endforeach;?>
		</div>
		<button class="quiz1">Next</button>
		<input type="hidden" name="task" value="questions.moreAnswer"/>
	</form>
</div>


<script>
	jQuery('.quiz1').click(function(e){
		e.preventDefault();
		var url = '/index.php?option=com_quiz_fabrika&view=questions&task=questions.moreAnswer';
		
		var frm = jQuery('.quiz-start form').serialize();
		
		jQuery.ajax({
		
			type:'POST',
			url: url,
			data: frm,
			success: function(data){
			
				var results = jQuery(data).find('.quiz-next').html();
				console.log(results);
				
				jQuery('.quiz-start').empty().append(results).fadeIn();
				
				
				
			}
			
		});
	});

</script>