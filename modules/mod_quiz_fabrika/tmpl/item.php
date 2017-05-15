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
$element = ModQuiz_fabrikaHelper::getItem($params);
?>

<?php if (!empty($element)) : ?>
	<div>
		<?php $fields = get_object_vars($element); ?>
		<?php foreach ($fields as $field_name => $field_value) : ?>
			<?php if (ModQuiz_fabrikaHelper::shouldAppear($field_name)): ?>
				<div class="row">
					<div class="span4">
						<strong><?php echo ModQuiz_fabrikaHelper::renderTranslatableHeader($params, $field_name); ?></strong>
					</div>
					<div
						class="span8"><?php echo ModQuiz_fabrikaHelper::renderElement($params->get('item_table'), $field_name, $field_value); ?></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif;
