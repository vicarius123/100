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
$elements = ModCateringHelper::getList($params);
?>

<?php if (!empty($elements)) : ?>
	<table class="table">
		<?php foreach ($elements as $element) : ?>
			<tr>
				<th><?php echo ModCateringHelper::renderTranslatableHeader($params, $params->get('field')); ?></th>
				<td><?php echo ModCateringHelper::renderElement(
						$params->get('table'), $params->get('field'), $element->{$params->get('field')}
					); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif;
