<?php
/**
 * @package    DPAttachments
 * @copyright  Copyright (C) 2013 Digital Peak GmbH. <https://www.digital-peak.com>
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

namespace DigitalPeak\Component\DPAttachments\Administrator\View\Attachment;

use DigitalPeak\Component\DPAttachments\Administrator\Helper\DPAttachmentsHelper;
use Exception;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
	protected $form;
	protected $item;
	protected $state;

	public function display($tpl = null)
	{
		$this->form  = $this->get('Form');
		$this->item  = $this->get('Item');
		$this->state = $this->get('State');
		$this->canDo = DPAttachmentsHelper::getActions();

		// Check for errors.
		if ($errors = $this->get('Errors')) {
			throw new Exception($errors);
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		Factory::getApplication()->input->set('hidemainmenu', true);
		$user       = Factory::getUser();
		$isNew      = ($this->item->id == 0);
		$checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->id);
		$canDo      = DPAttachmentsHelper::getActions();
		ToolbarHelper::title(
			Text::_('COM_DPATTACHMENTS_VIEW_ATTACHMENT_' . ($checkedOut ? 'ATTACHMENT' : ($isNew ? 'ADD_ATTACHMENT' : 'EDIT_ATTACHMENT')))
		);

		// Built the actions for new and existing records.

		// For new records, check the create permission.
		if ($isNew && (count($user->getAuthorisedCategories('com_dpattachments', 'core.create')) > 0)) {
			ToolbarHelper::apply('attachment.apply');
			ToolbarHelper::save('attachment.save');
			ToolbarHelper::save2new('attachment.save2new');
			ToolbarHelper::cancel('attachment.cancel');

			return;
		}

		// Can't save the record if it's checked out.
		if (!$checkedOut) {
			// Since it's an existing record, check the edit permission, or
			// fall back to edit own if the owner.
			if ($canDo->get('core.edit') || ($canDo->get('core.edit.own') && $this->item->created_by == $user->id)) {
				ToolbarHelper::apply('attachment.apply');
				ToolbarHelper::save('attachment.save');

				// We can save this record, but check the create permission
				// to see if we can return to make a new one.
				if ($canDo->get('core.create')) {
					ToolbarHelper::save2new('attachment.save2new');
				}
			}
		}

		// If checked out, we can still save
		if ($canDo->get('core.create')) {
			ToolbarHelper::save2copy('attachment.save2copy');
		}

		ToolbarHelper::cancel('attachment.cancel', 'JTOOLBAR_CLOSE');
	}
}
