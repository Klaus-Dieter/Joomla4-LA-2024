<?php


defined("\137\x4a\x45\130\105\x43") or die("\122\x65\163\164\162\151\143\164\145\144\x20\141\x63\143\145\x73\163");
jimport("\x6a\x6f\x6f\x6d\154\141\x2e\160\154\165\147\x69\x6e\x2e\x70\x6c\165\147\151\156");
require_once JPATH_SITE . DIRECTORY_SEPARATOR . "\141\x64\155\x69\156\151\x73\164\162\x61\164\157\x72" . DIRECTORY_SEPARATOR . "\x63\x6f\155\160\x6f\156\145\x6e\x74\163" . DIRECTORY_SEPARATOR . "\x63\x6f\x6d\137\155\x69\156\151\157\162\141\x6e\147\145\x5f\151\155\x70\157\x72\164\145\x78\x70\x6f\162\164\165\163\145\x72\x73" . DIRECTORY_SEPARATOR . "\150\145\154\160\x65\x72\x73" . DIRECTORY_SEPARATOR . "\155\x6f\137\151\155\x70\x6f\x72\x74\145\170\160\157\162\164\137\x75\164\151\154\151\x74\171\56\160\150\x70";
class plgSystemMiniorangeimportexportusers extends JPlugin
{
    public function onAfterInitialise()
    {
        $Kn = MoImportExportUtility::getConfig("\43\137\x5f\x6d\x69\x6e\x69\x6f\x72\x61\x6e\x67\x65\x5f\x63\162\157\x6e\151\155\x70\157\x72\164");
        $Cy = isset($Kn["\155\x6f\x5f\145\156\x61\x62\154\145\x5f\143\162\x6f\156\x5f\151\x6d\x70\157\162\x74"]) ? $Kn["\155\157\x5f\x65\156\141\x62\x6c\145\137\143\x72\157\x6e\137\151\x6d\x70\x6f\x72\x74"] : 0;
        if (!$Cy) {
            goto mx;
        }
        MoImportExportUtility::runCron();
        mx:
        $dh = MoImportExportUtility::is_customer_registered();
        if (!$dh) {
            goto Eh;
        }
        $za = MoImportExportUtility::getCustomerDetails();
        $Um = isset($za["\154\151\143\x65\156\163\x65\x45\170\160\151\162\171"]) ? $za["\x6c\151\x63\145\156\163\x65\x45\x78\x70\x69\162\x79"] : NULL;
        if (!($Um != NULL)) {
            goto AR;
        }
        $JH = strtotime($Um);
        if (!(time() > $JH - 2629743)) {
            goto G7;
        }
        MoImportExportUtility::cle();
        G7:
        AR:
        Eh:
    }
}
