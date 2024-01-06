<?php
/**
 * @package    DPAttachments
 * @copyright  Copyright (C) 2013 Digital Peak GmbH. <https://www.digital-peak.com>
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

defined('_JEXEC') or die();

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('script', 'com_dpattachments/dpattachments/views/attachments/default.min.js', ['relative' => true, 'version' => 'auto'], ['defer' => true]);
?>
<div class="com-dpattachments-attachments">
	<form action="<?php echo Route::_('index.php?option=com_dpattachments&view=attachments'); ?>"
			method="post" name="adminForm" id="adminForm">
		<?php if ($this->sidebar) { ?>
			<div id="j-sidebar-container"><?php echo $this->sidebar; ?></div>
		<?php } ?>
		<div id="j-main-container">
			<?php echo $this->loadTemplate('filters'); ?>
			<?php echo $this->loadTemplate('attachments'); ?>
		</div>
		<?php echo $this->loadTemplate('batch'); ?>
		<input type="hidden" name="task" value=""/>
		<input type="hidden" name="boxchecked" value="0"/>
		<?php echo HTMLHelper::_('form.token'); ?>
	</form>
</div>
