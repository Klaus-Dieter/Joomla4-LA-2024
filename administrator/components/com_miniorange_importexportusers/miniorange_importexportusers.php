<?php


defined("\137\x4a\105\130\x45\x43") or die("\122\x65\163\164\x72\151\x63\164\x65\x64\40\141\143\x63\145\163\163");
require_once JPATH_COMPONENT . "\x2f\x68\145\x6c\160\x65\x72\x73\57\x6d\x6f\x5f\143\165\x73\164\157\155\145\x72\137\163\x65\x74\165\160\x2e\160\x68\160";
require_once JPATH_COMPONENT . "\57\150\145\x6c\160\145\x72\163\x2f\x6d\157\137\x69\155\160\157\x72\x74\x65\170\x70\x6f\x72\164\x5f\x75\164\151\x6c\151\x74\x79\x2e\x70\x68\160";
if (JFactory::getUser()->authorise("\143\157\162\145\x2e\155\x61\x6e\141\x67\145", "\143\157\x6d\x5f\155\151\156\x69\x6f\162\141\156\147\145\137\151\x6d\x70\x6f\x72\x74\145\170\x70\x6f\162\x74\x75\163\x65\162\163")) {
    goto TG;
}
throw new Exception(JText::_("\x4a\105\x52\x52\117\122\x5f\x41\114\105\x52\x54\x4e\x4f\x41\x55\124\x48\x4f\x52"));
TG:
jimport("\x6a\x6f\157\155\154\141\56\141\160\x70\x6c\x69\143\x61\x74\x69\157\156\x2e\143\x6f\155\x70\x6f\156\x65\156\164\56\143\157\156\164\162\157\154\154\x65\162");
JLoader::registerPrefix("\x6d\x69\156\x69\x6f\162\x61\x6e\x67\145\x5f\x70\x61\x67\145\x72\x65\x73\164\x72\x69\x63\164\x69\x6f\x6e", JPATH_COMPONENT_ADMINISTRATOR);
$FH = JControllerLegacy::getInstance("\x4d\x69\156\x69\x6f\162\141\156\147\145\x49\155\160\157\x72\x74\x45\x78\160\157\x72\164\125\x73\x65\162\163");
$FH->execute(JFactory::getApplication()->input->get("\164\x61\x73\153"));
$FH->redirect();
