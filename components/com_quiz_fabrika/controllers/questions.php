<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Quiz_fabrika
 * @author     Cristopher Chong <chris@none.ru>
 * @copyright  2017 Cristopher Chong
 * @license    Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Questions list controller class.
 *
 * @since  1.6
 */
class Quiz_fabrikaControllerQuestions extends Quiz_fabrikaController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Questions', $prefix = 'Quiz_fabrikaModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
	
	public function moreAnswer(){
		echo '<div class="quiz-next quiz-start">';
		$model = $this->getModel();
		$get = (object)JRequest::get();
		$question = $model->getQuestion2($get->answer1);
		if(!empty($question)){
			$question2 = $model->getQuestion3($question[0]->id);
			echo '<form method="POST" action="">';
			echo '<label>'.$question[0]->question.'</label>';
			echo '<div>';
			foreach($question2 as $q2){
			
				echo '<input type="radio" name="answer1" value="'.$q2->id.'"> <span>'.$q2->question.'</span><br>';
				
				if(!empty($q2->answer)){
				
				}
			}
			echo '</div>';
			echo '<button class="quiz1">Next</button><input type="hidden" name="task" value="questions.moreAnswer"/></form>';
		}else{
		
			$final = $model->finalAnswer($get->answer1);
			
			echo 'You might like: <b>'.$final[0]->name.'</b>';
		}
		echo "<script>
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

</script>";
		echo '</div>';
	}
}
