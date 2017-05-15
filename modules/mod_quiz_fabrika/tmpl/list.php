<?php
/**
 * @version     CVS: 1.0.0
 * @package     com_quiz_fabrika
 * @subpackage  mod_quiz_fabrika
 * @author      Cristopher Chong <chris@none.ru>
 * @copyright   2017 Cristopher Chong
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 */
defined('_JEXEC') or die;
$elements = ModQuiz_fabrikaHelper::getList($params);
?>

<?php if (!empty($elements)) : ?>
	<table class="table">
		<?php foreach ($elements as $element) : ?>
			<tr>
				<th><?php echo ModQuiz_fabrikaHelper::renderTranslatableHeader($params, $params->get('field')); ?></th>
				<td><?php echo ModQuiz_fabrikaHelper::renderElement(
						$params->get('table'), $params->get('field'), $element->{$params->get('field')}
					); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif;
