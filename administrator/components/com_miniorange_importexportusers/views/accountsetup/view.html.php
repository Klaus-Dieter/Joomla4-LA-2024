<?php


defined("\137\112\105\x58\x45\103") or die("\122\145\163\164\x72\151\x63\164\145\144\x20\x61\143\143\145\x73\x73");
class miniorangeimportexportusersViewAccountSetup extends JViewLegacy
{
    function display($UK = null)
    {
        $this->lists = $this->get("\114\x69\163\x74");
        if (!count($errors = $this->get("\105\x72\162\157\162\163"))) {
            goto JD;
        }
        JFactory::getApplication()->enqueueMessage(500, implode("\74\142\162\40\x2f\x3e", $errors));
        return false;
        JD:
        $this->setLayout("\x61\x63\143\157\x75\156\164\163\x65\x74\165\x70");
        $this->addToolBar();
        parent::display($UK);
    }
    protected function addToolBar()
    {
        JToolBarHelper::title(JText::_("\x43\117\115\x5f\x4d\111\116\x49\117\x52\101\x4e\x47\x45\x5f\120\x41\107\x45\137\x50\x4c\x55\107\111\116\x5f\x54\x49\x54\114\x45"), "\x6d\157\x5f\x70\141\x67\x65\x5f\x6c\x6f\147\157\40\155\157\137\x70\x61\147\145\x5f\x69\x63\x6f\x6e");
    }
}
