<?php


defined("\137\x4a\x45\130\x45\x43") or die("\x52\x65\x73\x74\x72\151\x63\x74\x65\x64\x20\x61\143\x63\145\163\163");
class plgSystemMiniorangeimportexportusersInstallerScript
{
    public function install($ds)
    {
        $V0 = JFactory::getDbo();
        $oO = $V0->getQuery(true);
        $oO->update("\43\137\x5f\x65\170\x74\x65\x6e\x73\151\157\x6e\163");
        $oO->set($V0->quoteName("\145\x6e\x61\142\x6c\145\x64") . "\x20\75\40\x31");
        $oO->where($V0->quoteName("\x65\x6c\x65\155\x65\x6e\164") . "\x20\75\x20" . $V0->quote("\x6d\x69\x6e\x69\x6f\162\141\x6e\x67\145\x69\155\x70\x6f\162\164\145\170\x70\x6f\162\164\x75\163\x65\162\163"));
        $oO->where($V0->quoteName("\164\x79\160\145") . "\40\x3d\40" . $V0->quote("\160\154\165\147\151\x6e"));
        $V0->setQuery($oO);
        $V0->execute();
    }
    public function uninstall($ds)
    {
    }
    public function update($ds)
    {
    }
    public function preflight($hH, $ds)
    {
    }
    function postflight($hH, $ds)
    {
    }
}
