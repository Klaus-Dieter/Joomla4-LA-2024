<?php


defined("\137\112\x45\x58\x45\x43") or die("\122\x65\163\x74\162\x69\x63\x74\x65\x64\40\141\143\x63\x65\x73\x73");
require_once JPATH_ROOT . DIRECTORY_SEPARATOR . "\141\x64\x6d\x69\x6e\151\163\164\x72\141\x74\157\x72" . DIRECTORY_SEPARATOR . "\143\157\155\160\157\x6e\x65\x6e\x74\x73" . DIRECTORY_SEPARATOR . "\143\157\x6d\137\155\151\x6e\151\x6f\x72\141\x6e\x67\x65\x5f\151\155\x70\x6f\x72\164\145\x78\160\157\162\x74\x75\x73\145\x72\163" . DIRECTORY_SEPARATOR . "\150\x65\x6c\x70\145\x72\x73" . DIRECTORY_SEPARATOR . "\x6d\x6f\137\143\x75\x73\164\x6f\155\x65\162\x5f\x73\145\x74\x75\x70\56\x70\150\x70";
class MoImportExportUtility
{
    public static function cle()
    {
        $QK = self::getCustomerDetails();
        $z1 = isset($QK["\x6c\151\x63\145\156\163\x65\105\170\160\151\x72\x79"]) ? $QK["\154\x69\143\145\x6e\x73\x65\x45\170\160\x69\x72\x79"] : "\60\x30\60\60\55\x30\60\55\60\x30\40\60\60\x3a\x30\60\x3a\60\x30";
        if (!($z1 != "\60\x30\x30\x30\x2d\x30\x30\55\60\60\40\x30\x30\x3a\60\60\x3a\x30\60")) {
            goto H5;
        }
        $FU = strtotime($z1);
        $fV = $QK["\x70\x6c\141\156\x5f\164\x79\160\x65"];
        $Aw = (int) floor(($FU - time()) / 60 / 60 / 24);
        if ($Aw <= 30 && $Aw > 15 && !$QK["\x6d\151\x6e\x69\157\162\141\156\x67\145\x5f\145\x78\154\151\137\x74\150\x69\162\164\x79\144"]) {
            goto lA;
        }
        if ($Aw <= 15 && $Aw > 5 && !$QK["\155\x69\x6e\151\x6f\x72\x61\x6e\147\145\x5f\145\170\x6c\x69\x5f\146\x69\x66\x74\145\x65\156\x64"]) {
            goto vB;
        }
        if ($Aw <= 10 && $Aw > 5 && !$QK["\155\x69\156\151\157\x72\x61\156\147\x65\137\x65\x78\x6c\x69\x5f\164\145\156\x74\x68"] && $fV == "\x6d\x6f\156\164\150\154\171") {
            goto JJ;
        }
        if ($Aw <= 5 && $Aw > 1 && !$QK["\x6d\151\156\151\157\x72\x61\x6e\x67\x65\x5f\145\170\x6c\x69\x5f\x66\151\166\145\x64"]) {
            goto u_;
        }
        if ($Aw == 1 && !$QK["\155\151\x6e\x69\157\x72\x61\156\x67\x65\137\x65\170\154\x69\x5f\146\151\x72\x73\x74"]) {
            goto b_;
        }
        if ($Aw == 0 && !$QK["\155\151\x6e\151\157\x72\x61\156\x67\x65\x5f\x65\x78\154\x69\x64"]) {
            goto LX;
        }
        if (!($Aw < 0 && !$QK["\155\x69\x6e\x69\x6f\x72\141\x6e\147\x65\x5f\154\145\170\x70\151\162\145\144"])) {
            goto Rb;
        }
        if (self::licensevalidity($FU)) {
            goto Js;
        }
        self::_update_lid("\x6d\x69\156\x69\x6f\x72\x61\156\147\145\x5f\x6c\x65\x78\160\151\162\145\144");
        json_decode(self::send_email_alert($z1, 4, $fV, 0, $Aw), true);
        self::freeLicenseKey();
        header("\114\x6f\143\x61\164\151\157\x6e\72\x20" . JURI::base());
        Js:
        Rb:
        goto SS;
        LX:
        if (self::licensevalidity($FU)) {
            goto Lz;
        }
        self::_update_lid("\x6d\x69\x6e\151\x6f\162\x61\156\x67\x65\137\x65\x78\x6c\x69\x64");
        json_decode(self::send_email_alert($z1, 2, $fV, 0, $Aw), true);
        Lz:
        SS:
        goto d4;
        b_:
        if (self::licensevalidity($FU)) {
            goto Gn;
        }
        self::_update_lid("\155\x69\x6e\x69\157\162\141\156\147\145\137\x65\x78\x6c\x69\x5f\146\151\162\x73\164");
        json_decode(self::send_email_alert($z1, 3, $fV, 0, $Aw), true);
        Gn:
        d4:
        goto ke;
        u_:
        if (self::licensevalidity($FU)) {
            goto K0;
        }
        self::_update_lid("\x6d\151\x6e\151\157\x72\x61\156\147\x65\x5f\145\170\154\x69\x5f\146\151\x76\x65\144");
        json_decode(self::send_email_alert($z1, 1, $fV, 0, $Aw), true);
        K0:
        ke:
        goto jC;
        JJ:
        if (self::licensevalidity($FU)) {
            goto NB;
        }
        self::_update_lid("\x6d\151\x6e\151\157\x72\141\x6e\x67\x65\137\x65\170\154\151\x5f\x74\145\x6e\164\150");
        json_decode(self::send_email_alert($z1, 1, $fV, 0, $Aw), true);
        NB:
        jC:
        goto Oj;
        vB:
        if (self::licensevalidity($FU)) {
            goto gu;
        }
        self::_update_lid("\x6d\x69\x6e\x69\157\x72\141\x6e\x67\x65\137\x65\170\x6c\x69\137\146\151\x66\164\x65\x65\x6e\x64");
        json_decode(self::send_email_alert($z1, 1, $fV, 0, $Aw), true);
        gu:
        Oj:
        goto Zc;
        lA:
        self::_update_lid("\155\x69\x6e\151\157\x72\141\x6e\147\145\x5f\145\x78\154\x69\137\164\x68\x69\162\164\x79\x64");
        json_decode(self::send_email_alert($z1, 1, $fV, 0, $Aw), true);
        Zc:
        H5:
    }
    public static function freeLicenseKey()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($Fx->quoteName("\x65\x6d\141\x69\154") . "\x20\75\40" . $Fx->quote(''), $Fx->quoteName("\x70\x61\163\163\x77\x6f\162\x64") . "\40\75\40" . $Fx->quote(''), $Fx->quoteName("\143\165\163\164\157\x6d\145\x72\x5f\x6b\145\x79") . "\40\x3d\x20" . $Fx->quote(''), $Fx->quoteName("\141\144\155\151\x6e\x5f\160\150\157\x6e\145") . "\40\75\40" . $Fx->quote(''), $Fx->quoteName("\143\165\x73\164\157\155\145\162\x5f\x74\x6f\x6b\x65\156") . "\40\x3d\x20" . $Fx->quote(''), $Fx->quoteName("\x61\160\151\137\153\x65\171") . "\40\75\x20" . $Fx->quote(''), $Fx->quoteName("\x72\x65\x67\x69\163\x74\x72\141\164\151\x6f\x6e\x5f\163\164\141\x74\x75\x73") . "\40\x3d\40" . $Fx->quote(''), $Fx->quoteName("\154\x6f\x67\151\x6e\137\163\164\x61\x74\x75\163") . "\x20\x3d\40" . $Fx->quote(0), $Fx->quoteName("\164\x72\x61\x6e\163\141\x63\x74\151\157\x6e\x5f\x69\144") . "\x20\75\40" . $Fx->quote(''), $Fx->quoteName("\x65\x6d\x61\x69\154\137\x63\157\x75\x6e\x74") . "\40\x3d\40" . $Fx->quote(0), $Fx->quoteName("\163\x6d\163\x5f\143\x6f\165\156\x74") . "\x20\75\x20" . $Fx->quote(0), $Fx->quoteName("\163\155\154\137\154\153") . "\x20\x3d\40" . $Fx->quote(''), $Fx->quoteName("\151\x6e\137\x63\x6d\x70") . "\x20\75\x20" . $Fx->quote(''), $Fx->quoteName("\163\164\141\x74\165\163") . "\x20\x3d\x20" . $Fx->quote(''), $Fx->quoteName("\154\x69\x63\x65\x6e\x73\145\105\x78\x70\x69\162\171") . "\x20\x3d\40" . $Fx->quote("\x30\x30\x30\x30\55\60\x30\x2d\60\x30\40\60\x30\x3a\x30\60\x3a\x30\60"), $Fx->quoteName("\x73\165\x70\160\x6f\162\164\x45\170\x70\x69\162\171") . "\40\x3d\40" . $Fx->quote("\x30\x30\x30\60\x2d\60\60\55\60\60\40\x30\60\72\x30\60\72\60\x30"), $Fx->quoteName("\x6c\x69\143\x65\156\163\145\120\x6c\141\156") . "\x20\x3d\x20" . $Fx->quote(''), $Fx->quoteName("\155\x69\x6e\151\x6f\x72\141\x6e\x67\x65\x5f\x65\170\154\x69\137\164\x68\x69\162\164\x79\144") . "\x20\x3d\40" . $Fx->quote(0), $Fx->quoteName("\x6d\x69\156\151\157\x72\141\x6e\147\145\x5f\145\170\154\151\137\x66\x69\x66\x74\x65\x65\x6e\144") . "\x20\x3d\40" . $Fx->quote(0), $Fx->quoteName("\155\x69\x6e\151\x6f\x72\x61\156\147\145\137\x65\x78\x6c\x69\x5f\146\x69\x76\145\x64") . "\40\x3d\x20" . $Fx->quote(0), $Fx->quoteName("\155\151\x6e\x69\157\162\141\156\147\145\137\145\x78\154\151\144") . "\40\x3d\x20" . $Fx->quote(0), $Fx->quoteName("\x6d\151\156\x69\157\x72\x61\156\x67\145\137\154\x65\170\160\x69\x72\x65\144") . "\40\75\x20" . $Fx->quote(0), $Fx->quoteName("\155\151\156\151\157\x72\141\x6e\147\145\x5f\x65\170\154\151\137\164\145\x6e\164\150") . "\x20\x3d\x20" . $Fx->quote(0), $Fx->quoteName("\155\151\156\151\157\162\141\156\x67\145\137\x65\170\154\x69\137\146\151\x72\x73\x74") . "\x20\75\40" . $Fx->quote(0), $Fx->quoteName("\x70\154\x61\156\137\164\171\160\x65") . "\40\75\x20" . $Fx->quote(''));
        $DO = array($Fx->quoteName("\x69\144") . "\x20\x3d\x20\x31");
        $Ng->update($Fx->quoteName("\x23\137\x5f\155\x69\x6e\151\x6f\162\141\156\147\145\x5f\x69\155\x70\x6f\x72\x74\x65\170\x70\x6f\162\164\137\143\x75\x73\164\157\155\x65\x72\137\x64\x65\164\x61\x69\154\x73"))->set($t0)->where($DO);
        $Fx->setQuery($Ng);
        $Fx->execute();
    }
    public static function _update_lid($R3)
    {
        $Fx = jFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($Fx->quoteName($R3) . "\x20\x3d\x20" . $Fx->quote(1));
        $DO = array($Fx->quoteName("\x69\x64") . "\40\x3d\x20" . $Fx->quote(1));
        $Ng->update($Fx->quoteName("\43\137\x5f\155\x69\x6e\x69\157\162\141\x6e\147\145\137\x69\x6d\x70\x6f\162\x74\x65\x78\x70\157\162\164\137\x63\165\163\164\x6f\x6d\x65\162\x5f\144\145\x74\x61\151\x6c\163"))->set($t0)->where($DO);
        $Fx->setQuery($Ng);
        $Fx->execute();
    }
    public static function send_email_alert($Hs, $Bn, $fV, $RV, $Aw)
    {
        $Ch = self::getHostname();
        $rH = $Ch . "\x2f\155\x6f\141\163\57\x61\x70\151\57\x6e\x6f\x74\x69\146\x79\x2f\163\x65\x6e\144";
        $qi = curl_init($rH);
        $QK = self::getCustomerDetails();
        $j3 = $QK["\x63\165\x73\x74\x6f\x6d\145\x72\x5f\153\x65\171"];
        $Gc = $QK["\141\x70\151\x5f\153\145\x79"];
        $KQ = $QK["\145\x6d\141\151\154"];
        $iG = round(microtime(true) * 1000);
        $EM = $j3 . number_format($iG, 0, '', '') . $Gc;
        $im = hash("\x73\150\x61\x35\61\x32", $EM);
        $uK = "\x43\x75\163\x74\157\x6d\145\x72\55\x4b\x65\171\x3a\x20" . $j3;
        $ys = "\124\x69\x6d\x65\x73\x74\141\x6d\x70\72\40" . number_format($iG, 0, '', '');
        $XC = "\x41\165\x74\150\x6f\162\x69\x7a\141\164\151\x6f\156\72\x20" . $im;
        $zW = $KQ;
        $dW = JFactory::getConfig();
        $Wh = $dW->get("\163\151\x74\x65\156\141\x6d\145");
        $gV = 5 + $Aw;
        JFactory::getLanguage()->load("\143\157\x6d\137\x6d\x69\156\x69\157\x72\141\x6e\147\x65\x5f\x69\x6d\x70\x6f\162\x74\145\170\160\x6f\162\164\165\x73\145\162\x73", JPATH_ADMINISTRATOR);
        if ($Bn == 1) {
            goto Ra;
        }
        if (!($Bn == 2)) {
            goto S2;
        }
        $mF = JText::sprintf("\x4c\111\x42\x5f\115\111\x4e\x49\117\x52\101\x4e\107\x45\112\x4f\117\x4d\114\101\111\x4d\120\117\x52\124\105\130\x50\117\x52\124\x50\114\x55\x47\111\116\137\x41\114\x45\x52\x54\x5f\105\115\101\111\x4c\x5f\x43\x4f\116\x54\x45\116\x54\137\62", $fV, $gV, $Wh);
        $Yx = JText::sprintf("\114\x49\102\x5f\x4d\x49\x4e\111\x4f\x52\101\x4e\107\105\x4a\x4f\x4f\x4d\x4c\x41\x49\115\120\117\x52\x54\105\130\120\117\122\124\120\114\125\107\x49\116\137\101\x4c\x45\122\124\x5f\105\x4d\101\111\114\137\x53\x55\x42\x4a\x45\103\x54\137\x32", $Wh);
        S2:
        goto zf;
        Ra:
        $mF = JText::sprintf("\x4c\111\x42\137\x4d\111\x4e\111\117\122\101\116\x47\x45\x4a\x4f\x4f\115\114\101\111\x4d\120\x4f\122\124\x45\x58\120\x4f\122\124\x50\x4c\x55\x47\x49\x4e\x5f\101\x4c\105\122\124\137\105\x4d\x41\111\114\137\x43\x4f\x4e\x54\105\x4e\124\x5f\x31", $fV, $Hs, $Wh);
        $Yx = JText::sprintf("\114\x49\102\x5f\115\111\x4e\x49\117\122\101\x4e\x47\x45\x4a\x4f\117\115\114\x41\111\115\x50\x4f\122\x54\105\x58\x50\117\x52\x54\120\x4c\125\x47\x49\116\x5f\101\x4c\x45\x52\124\137\105\115\x41\111\x4c\137\123\125\x42\x4a\105\103\124\x5f\61", $Wh);
        zf:
        if (!($Bn == 3)) {
            goto Qt;
        }
        $mF = JText::sprintf("\x4c\x49\x42\x5f\115\111\116\111\x4f\x52\x41\x4e\107\x45\112\x4f\x4f\115\114\101\x49\x4d\x50\117\122\124\105\x58\120\x4f\122\124\120\114\125\107\x49\x4e\137\x41\114\x45\122\124\137\x45\115\x41\111\114\137\x43\117\x4e\x54\x45\x4e\124\137\x33", $fV, $Hs, $Wh);
        $Yx = JText::sprintf("\114\x49\x42\137\115\111\x4e\x49\117\x52\x41\116\x47\105\x4a\117\x4f\115\x4c\101\111\115\x50\x4f\122\124\x45\x58\120\117\x52\x54\120\x4c\125\107\111\116\x5f\101\x4c\105\122\x54\x5f\105\x4d\101\111\114\137\123\x55\102\112\105\x43\124\137\61", $Wh);
        Qt:
        if (!($Bn == 4)) {
            goto MT;
        }
        $mF = JText::sprintf("\x4c\x49\102\x5f\x4d\111\116\x49\x4f\122\x41\116\x47\x45\x4a\117\x4f\x4d\114\101\x49\x4d\120\x4f\x52\x54\105\130\120\x4f\122\124\120\114\x55\x47\x49\116\x5f\101\x4c\105\x52\124\137\105\x4d\101\x49\x4c\x5f\x43\x4f\x4e\124\105\x4e\124\137\x34", $fV, $Wh);
        $Yx = JText::sprintf("\x4c\111\x42\x5f\115\x49\x4e\111\x4f\x52\101\116\107\105\112\x4f\x4f\115\x4c\x41\111\x4d\120\x4f\122\124\x45\x58\x50\x4f\x52\124\x50\x4c\x55\x47\x49\116\137\x41\x4c\x45\122\x54\137\x45\x4d\x41\111\x4c\x5f\123\125\102\x4a\x45\103\x54\x5f\x32", $Wh);
        MT:
        $wB = "\x6a\157\157\x6d\x6c\x61\x73\x75\160\x70\157\x72\x74\x40\x78\145\x63\x75\x72\x69\x66\171\56\x63\157\155";
        $t0 = array("\x63\x75\x73\x74\x6f\155\145\x72\113\145\171" => $j3, "\x73\x65\x6e\144\105\x6d\141\151\x6c" => true, "\x65\155\141\151\154" => array("\x63\165\163\164\157\x6d\145\x72\x4b\145\x79" => $j3, "\146\x72\x6f\x6d\105\x6d\x61\151\154" => $wB, "\142\143\x63\x45\x6d\141\x69\x6c" => $wB, "\x66\x72\157\x6d\116\x61\155\145" => "\x6d\x69\x6e\x69\x4f\x72\141\156\x67\x65", "\x74\x6f\105\x6d\141\x69\x6c" => $zW, "\164\157\x4e\141\x6d\x65" => $zW, "\163\165\142\x6a\145\x63\164" => $Yx, "\x63\157\156\164\x65\156\164" => $mF));
        $gH = json_encode($t0);
        curl_setopt($qi, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($qi, CURLOPT_ENCODING, '');
        curl_setopt($qi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($qi, CURLOPT_AUTOREFERER, true);
        curl_setopt($qi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($qi, CURLOPT_MAXREDIRS, 10);
        curl_setopt($qi, CURLOPT_HTTPHEADER, array("\103\157\156\x74\x65\x6e\x74\55\x54\171\x70\x65\72\x20\x61\160\160\154\151\x63\141\x74\x69\x6f\156\57\x6a\163\x6f\156", $uK, $ys, $XC));
        curl_setopt($qi, CURLOPT_POST, true);
        curl_setopt($qi, CURLOPT_POSTFIELDS, $gH);
        $mF = curl_exec($qi);
        if (!curl_errno($qi)) {
            goto Il;
        }
        return json_encode(array("\163\164\141\164\x75\x73" => "\105\122\x52\117\x52", "\x73\164\141\164\165\x73\115\145\163\163\x61\147\145" => curl_error($qi)));
        Il:
        curl_close($qi);
        return json_encode(array("\163\x74\141\164\165\163" => "\x53\x55\x43\x43\x45\123\123", "\x73\164\141\164\165\163\x4d\145\x73\163\141\147\x65" => "\123\125\103\x43\x45\123\123"));
    }
    public static function __genDBUpdate($nB, $Dc)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        foreach ($Dc as $cc => $jU) {
            $sL[] = $Fx->quoteName($cc) . "\x20\75\40" . $Fx->quote($jU);
            RH:
        }
        GQ:
        $Ng->update($Fx->quoteName($nB))->set($sL)->where($Fx->quoteName("\x69\x64") . "\40\75\x20\61");
        $Fx->setQuery($Ng);
        $Fx->execute();
    }
    public static function licensevalidity($FU)
    {
        $mF = self::ccl_for_plans();
        $RE = isset($mF["\154\151\x63\x65\x6e\x73\x65\x45\x78\160\151\x72\171"]) ? $mF["\154\x69\x63\x65\x6e\x73\x65\105\170\x70\x69\162\x79"] : "\x30\60\x30\60\55\x30\x30\55\x30\60\40\x30\60\x3a\60\60\x3a\60\60";
        if (!($RE != "\60\x30\x30\60\55\60\60\x2d\x30\x30\40\60\x30\x3a\60\60\x3a\x30\x30")) {
            goto k5;
        }
        $DY = strtotime($RE);
        k5:
        if ($DY > $FU) {
            goto KR;
        }
        return FALSE;
        goto Iq;
        KR:
        $nB = "\43\137\x5f\155\151\x6e\x69\157\x72\x61\x6e\147\145\137\151\155\x70\157\162\x74\x65\170\x70\157\162\x74\x5f\143\165\163\164\157\x6d\x65\162\x5f\x64\145\x74\141\x69\154\x73";
        $Dc = array("\x6c\x69\143\145\156\x73\145\x45\170\x70\151\x72\x79" => $DY);
        self::__genDBUpdate($nB, $Dc);
        return TRUE;
        Iq:
    }
    public static function ccl_for_plans()
    {
        $vH = self::get_all_import_export_license_plans();
        foreach ($vH as $vi) {
            $no = new MoImportExportCustomer();
            $mF = json_decode($no->ccl($vi), true);
            if (!(!empty($mF) && $mF["\x73\164\x61\164\x75\x73"] == "\123\125\103\103\105\123\x53")) {
                goto Vf;
            }
            goto b3;
            Vf:
            lU:
        }
        b3:
        return $mF;
    }
    public static function get_all_import_export_license_plans()
    {
        return array("\x6a\157\157\155\154\x61\x5f\151\x6d\160\x6f\162\x74\x5f\x65\170\x70\157\x72\x74\x5f\160\162\x65\x6d\151\165\155\x5f\x71\x75\x61\x72\x74\145\x72\x6c\x79\137\160\154\141\x6e", "\x6a\x6f\x6f\155\154\x61\137\x69\x6d\160\157\162\x74\137\145\170\160\x6f\x72\x74\137\x70\162\x65\x6d\151\x75\x6d\x5f\x68\141\x6c\x66\171\145\x61\x72\154\171\x5f\x70\x6c\x61\x6e", "\152\x6f\157\155\x6c\x61\137\151\x6d\160\x6f\x72\x74\x5f\x65\x78\160\x6f\x72\x74\137\160\162\145\155\x69\x75\x6d\x5f\160\x6c\141\x6e");
    }
    public static function isCustomerRegistered()
    {
        $QK = self::getCustomerDetails();
        $k0 = $QK["\x73\164\x61\x74\165\x73"];
        if (!self::is_customer_registered() || self::check($k0) != "\x74\162\x75\x65") {
            goto eo;
        }
        return $IO = '';
        goto YT;
        eo:
        return $IO = "\x64\x69\x73\141\142\154\145\x64";
        YT:
    }
    public static function is_customer_registered()
    {
        $Ff = self::getCustomerDetails();
        $KQ = $Ff["\x65\x6d\x61\151\154"];
        $j3 = $Ff["\x63\x75\x73\x74\x6f\x6d\145\162\x5f\x6b\x65\171"];
        if (!$KQ || !$j3 || !is_numeric(trim($j3))) {
            goto ED;
        }
        return 1;
        goto OM;
        ED:
        return 0;
        OM:
    }
    public static function check($R3)
    {
        if (empty($R3)) {
            goto I4;
        }
        return self::decrypt($R3);
        goto A1;
        I4:
        return '';
        A1:
    }
    public static function exportUserGroups()
    {
        $wv = MoImportExportUtility::readUserGroupsTable();
        self::parseDataAndDownloadGroupsCSV($wv);
    }
    public static function parseDataAndDownloadGroupsCSV($wv)
    {
        $AJ = '';
        $oM = count($wv);
        if (!is_array($wv)) {
            goto QX;
        }
        foreach ($wv[0] as $cc => $jU) {
            $AJ .= $cc . "\x2c";
            RD:
        }
        Ey:
        $AJ .= "\12";
        $Pj = 0;
        Xl:
        if (!($Pj < $oM)) {
            goto Vs;
        }
        if (!is_array($wv)) {
            goto Xz;
        }
        foreach ($wv[$Pj] as $cc => $jU) {
            $AJ .= $jU . "\x2c";
            pg:
        }
        K7:
        Xz:
        $AJ .= "\12";
        Qg:
        $Pj++;
        goto Xl;
        Vs:
        header("\103\x6f\x6e\164\145\x6e\x74\55\124\171\160\x65\72\40\141\x70\160\x6c\x69\x63\141\x74\x69\157\156\x2f\143\163\166");
        header("\x43\x6f\x6e\x74\x65\156\164\55\x44\x69\163\x70\x6f\163\x69\x74\151\157\156\72\40\141\x74\164\x61\143\150\x6d\145\x6e\x74\73\x20\x66\151\x6c\x65\156\x61\155\x65\x3d\42\141\x6c\x6c\x5f\147\x72\157\165\x70\163\137\x72\145\160\157\162\164\x2e\x63\163\x76\42");
        print_r($AJ);
        exit;
        QX:
        header("\103\157\x6e\x74\x65\x6e\x74\55\x54\171\x70\145\72\40\141\160\x70\x6c\151\x63\x61\x74\x69\157\156\57\143\x73\166");
        header("\x43\x6f\156\164\145\156\164\x2d\104\151\163\x70\x6f\x73\x69\x74\x69\157\156\72\40\x61\164\x74\x61\143\x68\155\145\156\164\x3b\40\146\151\154\145\x6e\x61\155\145\x3d\42\141\x6c\154\x5f\x67\162\x6f\x75\x70\x73\137\x72\x65\x70\x6f\x72\x74\x2e\x63\163\166\42");
        print_r($AJ);
        exit;
    }
    public static function readUserGroupsTable()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select("\x2a");
        $Ng->from($Fx->quoteName("\x23\x5f\x5f\165\163\x65\162\147\162\x6f\x75\x70\163"));
        $Fx->setQuery($Ng);
        return $Fx->loadAssocList();
    }
    public static function getAllGroups()
    {
        $Xa = MoImportExportUtility::loadGroups();
        $jw = array();
        foreach ($Xa as $cc => $jU) {
            array_push($jw, $jU["\x74\151\164\x6c\145"]);
            z7:
        }
        U0:
        return $jw;
    }
    public static function deleteUserIn()
    {
        $J7 = self::isColumnExist();
        if (!($J7 == "\x69\x6e\125\163\145\162")) {
            goto EG;
        }
        $Fx = JFactory::getDBO();
        $T7 = "\101\114\124\x45\x52\x20\124\x41\102\x4c\105\x20\43\x5f\x5f\x75\x73\x65\162\x73\40\x44\122\117\x50\x20\103\117\114\x55\115\x4e\x20\x69\x6e\125\163\x65\162";
        try {
            $Fx->setQuery($T7);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\x6e\x73\151\144\x65\x20\144\x65\x6c\145\164\x65\x55\163\145\x72\111\x6e\x20\146\165\x6e\143\x74\x69\157\x6e\x20\x61\x6e\144\40\x74\150\x69\x73\x20\161\165\x65\x72\171\x20\146\x61\x69\x6c\x65\x64\40\141\x74\40\45\x73\72\40" . __LINE__, $Je);
            JLog::add("\x54\150\x69\x73\x20\x71\165\145\x72\171\x20\146\141\151\154\145\144\72\40" . $T7);
            self::mo_log("\111\156\x73\x69\144\x65\40\144\145\154\x65\164\145\125\x73\x65\x72\x49\x6e\40\146\x75\156\x63\x74\151\157\156\40\x61\156\x64\40\146\141\151\x6c\x65\x64\40\164\x6f\40\x64\145\154\x65\x74\145\x20\164\x68\145\x20\165\163\x65\x72\x2e\x20" . $Je);
        }
        EG:
    }
    public static function isColumnExist()
    {
        $Fx = JFactory::getDBO();
        $Ng = "\x53\110\x4f\x57\x20\103\117\x4c\125\x4d\116\x53\x20\106\x52\117\115\40\x60\43\x5f\137\x75\x73\x65\162\x73\x60\x20\x4c\111\x4b\105\x20\x27\151\x6e\125\x73\x65\x72\47";
        $Fx->setQuery($Ng);
        return $Fx->loadResult();
    }
    public static function createAndUpdateUsersTable()
    {
        $J7 = self::isColumnExist();
        if (!($J7 != "\151\156\125\163\x65\x72")) {
            goto nh;
        }
        $Fx = JFactory::getDBO();
        $T7 = "\x41\114\x54\x45\122\x20\124\x41\x42\x4c\105\x20\43\137\137\x75\163\x65\x72\163\40\101\104\x44\40\103\117\114\x55\115\x4e\40\x69\x6e\125\x73\145\162\x20\126\101\122\x43\x48\x41\122\x28\x31\x35\51\40\116\x4f\124\x20\x4e\x55\x4c\x4c\40\104\105\x46\101\125\x4c\x54\40\47\x30\47";
        try {
            $Fx->setQuery($T7);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\156\163\151\144\x65\40\143\162\145\x61\x74\145\101\x6e\144\x55\x70\144\141\164\145\125\163\145\x72\163\x54\x61\x62\x6c\145\x20\x66\165\156\143\x74\x69\157\x6e\40\141\156\144\40\164\x68\151\x73\40\161\x75\145\162\171\40\146\141\x69\x6c\145\144\x20\141\164\40\45\163\x3a\40" . __LINE__, $Je);
            JLog::add("\124\x68\151\x73\x20\161\165\145\162\171\40\x66\x61\x69\154\x65\x64\72\x20" . $T7);
            self::mo_log("\x49\156\x73\151\x64\x65\40\143\x72\145\x61\164\x65\101\156\144\x55\x70\144\141\164\145\125\x73\x65\162\x73\x54\141\142\154\x65\x20\146\x75\156\x63\x74\x69\157\x6e\40\141\156\144\40\146\x61\151\154\145\144\x20\164\157\40\141\144\x64\40\x6e\x65\167\x20\143\x6f\154\x75\155\x6e\56\40" . $Je);
        }
        nh:
    }
    public static function parseDataAndGetArray($zQ)
    {
        $FK = 0;
        $fL = array();
        $O5 = array();
        foreach ($zQ as $cc => $jU) {
            if ($cc == 0) {
                goto PS;
            }
            $Dk = 0;
            $cD = count($jU);
            foreach ($Gz as $cc => $R3) {
                if (!($Dk < $cD)) {
                    goto jb;
                }
                $O5[$cc] = $jU[$Dk];
                $Dk++;
                jb:
                MO:
            }
            ge:
            $FK++;
            array_push($fL, $O5);
            goto JT;
            PS:
            if (!(is_array($jU) && isset($jU))) {
                goto Xn;
            }
            foreach ($jU as $yM) {
                $Gz[$yM] = '';
                ql:
            }
            JC:
            Xn:
            JT:
            ld:
        }
        np:
        return $fL;
    }
    public static function importGroups($zQ)
    {
        if (!(is_array($zQ) && isset($zQ[0]))) {
            goto f_;
        }
        $fL = array();
        $fL = self::parseDataAndGetArray($zQ);
        self::arrayParseToInsertGroups($fL);
        f_:
    }
    public static function arrayParseToInsertGroups($Xa)
    {
        foreach ($Xa as $Kv => $LL) {
            self::insertGroup($LL);
            Av:
        }
        Ne:
        $Qb = JFactory::getApplication();
        $Qb->enqueueMessage("\125\163\x65\162\40\147\x72\x6f\x75\x70\40\x68\141\x73\40\x62\x65\x65\156\40\x69\x6d\160\157\162\164\x65\x64\40\x73\165\143\143\145\163\x73\x66\165\154\154\171\56", "\x73\x75\143\x63\x65\x73\163");
        $Qb->redirect(JRoute::_("\151\x6e\144\145\x78\x2e\x70\150\x70\77\x6f\x70\x74\151\157\x6e\75\143\157\x6d\x5f\x6d\151\x6e\x69\157\162\141\x6e\147\x65\x5f\x69\x6d\x70\x6f\162\164\145\170\x70\x6f\162\164\165\163\145\162\x73\46\166\151\145\167\x3d\141\143\x63\157\165\x6e\164\x73\x65\x74\x75\x70\x26\164\141\x62\55\x70\x61\x6e\x65\x6c\75\x69\x6d\x70\157\162\x74\163\x65\164\x74\151\156\x67\x73"));
    }
    public static function insertGroup($Xh)
    {
        $u3 = array();
        $xK = array();
        $cT = '';
        $CK = count($Xh);
        $Pj = 1;
        $rO = 0;
        $FN = 0;
        $tZ = NULL;
        $jT = 0;
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        foreach ($Xh as $cc => $jU) {
            if (!($cc != "\x67\x72\x6f\165\160" && !$jT)) {
                goto KU;
            }
            array_push($u3, $cc);
            if ($Pj < $CK) {
                goto Id;
            }
            $cT .= $Fx->quote($jU);
            goto Uw;
            Id:
            $cT .= $Fx->quote($jU) . "\54";
            Uw:
            KU:
            $Pj++;
            if (!($Pj > $CK)) {
                goto Oi;
            }
            $rO = 1;
            Oi:
            Xr:
        }
        gH:
        if (!($rO == 1)) {
            goto nE;
        }
        $A3 = explode("\x2c", $cT);
        if (!(count($A3) > 5)) {
            goto q0;
        }
        $A3 = array_slice($A3, 0, count($A3) - 1);
        q0:
        array_shift($A3);
        $R3 = implode("\54", $A3);
        array_push($xK, $R3);
        array_shift($u3);
        if (!(count($Xh) > 5)) {
            goto c3;
        }
        $Xh = array_slice($Xh, 0, count($Xh) - 1);
        c3:
        if (!(count($u3) > 4)) {
            goto Py;
        }
        $u3 = array_slice($u3, 0, count($u3) - 1);
        Py:
        if (!isset($Xh["\151\144"])) {
            goto El;
        }
        $BJ = $Xh["\x69\x64"];
        $n_ = $Xh["\164\151\x74\x6c\145"];
        if (!($BJ > 9)) {
            goto se;
        }
        $NG = self::isGroupExist($n_);
        if (!($NG != $n_)) {
            goto uO;
        }
        $Ng->insert($Fx->quoteName("\43\x5f\137\x75\x73\145\x72\x67\x72\157\x75\x70\x73"))->columns($Fx->quoteName($u3))->values(implode("\x2c", $xK));
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\x6e\x73\x69\144\145\x20\x69\156\x73\145\x72\x74\x47\x72\x6f\165\160\x20\146\165\156\x63\164\x69\x6f\x6e\40\141\156\144\40\x74\x68\x69\163\x20\161\165\x65\x72\171\x20\x66\141\x69\154\x65\144\40\141\x74\40\45\163\x3a\x20" . __LINE__, $Je);
            JLog::add("\124\x68\151\163\x20\161\165\x65\162\171\x20\146\x61\x69\x6c\145\144\72\x20" . $Ng);
            self::mo_log("\111\156\163\151\144\x65\40\151\156\x73\x65\x72\x74\107\162\x6f\x75\x70\40\146\165\x6e\x63\x74\x69\x6f\156\x20\141\x6e\144\40\146\141\151\x6c\x65\x64\40\x74\157\x20\x69\x6e\163\x65\x72\164\x20\x74\x68\145\40\x76\141\154\165\x65\163\x2e\40" . $Je);
        }
        uO:
        se:
        El:
        nE:
        return TRUE;
    }
    public static function isGroupExist($n_)
    {
        $Fx = JFactory::getDBO();
        $Ng = $Fx->getQuery(true)->select("\x74\151\x74\x6c\145")->from("\x23\137\137\x75\x73\145\x72\x67\x72\x6f\165\x70\163")->where("\164\x69\164\154\x65\75" . $Fx->quote($n_));
        $Fx->setQuery($Ng);
        return $Fx->loadResult();
    }
    public static function importUsers($zQ, $w9)
    {
        if (!(is_array($zQ) && isset($zQ[0]))) {
            goto OW;
        }
        $FK = 0;
        $fL = array();
        $O5 = array();
        foreach ($zQ as $cc => $jU) {
            if ($cc == 0) {
                goto Yz;
            }
            $Dk = 0;
            $cD = count($jU);
            foreach ($Gz as $cc => $R3) {
                if (!($Dk < $cD)) {
                    goto fe;
                }
                $O5[$cc] = $jU[$Dk];
                $Dk++;
                fe:
                vl:
            }
            nF:
            $FK++;
            array_push($fL, $O5);
            goto cf;
            Yz:
            if (!(is_array($jU) && isset($jU))) {
                goto P9;
            }
            foreach ($jU as $yM) {
                $Gz[$yM] = '';
                QY:
            }
            Go:
            P9:
            cf:
            eg:
        }
        Xq:
        self::arrayParseToInsertUsers($fL, $w9);
        OW:
    }
    public static function runCron()
    {
        $Ca = MoImportExportUtility::getConfig("\x23\x5f\x5f\x6d\151\156\151\x6f\162\x61\x6e\147\145\137\143\162\157\156\x69\155\160\157\x72\164");
        $sM = isset($Ca["\155\157\x5f\143\x72\x6f\x6e\137\x70\145\162\151\x6f\144"]) ? $Ca["\155\x6f\137\x63\x72\x6f\x6e\x5f\x70\x65\162\151\x6f\x64"] : '';
        $w9 = TRUE;
        $Mt = time();
        if (!($Mt >= $Ca["\143\x72\x6f\x6e\x5f\x64\145\146\141\165\154\164\137\143\x68\x65\143\x6b\137\x74\x69\155\145\163\164\x61\155\160"] || $Ca["\143\x72\x6f\156\x5f\x64\x65\146\141\x75\x6c\x74\x5f\143\x68\x65\143\153\x5f\164\x69\x6d\x65\163\x74\x61\155\160"] == 0)) {
            goto RK;
        }
        if ($sM == "\x68\x6f\165\x72\x6c\x79") {
            goto cq;
        }
        if ($sM == "\x64\141\151\154\171") {
            goto qD;
        }
        if ($sM == "\x77\x65\x65\153\x6c\171") {
            goto aD;
        }
        $sM = 60 * 60 * 24 * 7 * 30;
        goto AP;
        aD:
        $sM = 60 * 60 * 24 * 7;
        AP:
        goto ui;
        qD:
        $sM = 60 * 60 * 24;
        ui:
        goto s4;
        cq:
        $sM = 60 * 60;
        s4:
        $Mt = time() + $sM;
        MoImportExportUtility::updateDBValue("\x23\137\137\155\x69\x6e\151\157\x72\141\x6e\x67\x65\x5f\143\x72\157\x6e\151\x6d\x70\157\x72\164", "\143\162\x6f\156\137\144\x65\x66\x61\x75\154\164\137\143\150\x65\143\x6b\137\164\151\x6d\x65\x73\164\x61\155\x70", $Mt);
        $mZ = $Ca["\x6d\x6f\137\x70\141\164\x68\137\164\157\137\x62\145\137\x69\x6d\160\157\162\164\x65\144\x5f\160\145\162\x69\157\x64\x69\143\x61\154\x6c\x79"];
        if (ini_set("\x64\x65\146\141\165\154\164\x5f\163\x6f\x63\153\x65\x74\137\x74\x69\155\145\157\x75\x74", 15)) {
            goto j4;
        }
        echo "\x3c\41\55\55\40\165\x6e\x61\142\154\145\x20\x74\x6f\x20\x63\150\141\x6e\x67\x65\40\x73\x6f\x63\153\145\x74\40\x74\x69\155\145\x6f\x75\164\40\x2d\x2d\76";
        j4:
        if (($tj = fopen($mZ, "\x72")) !== FALSE) {
            goto Pe;
        }
        die("\120\x72\x6f\x62\x6c\145\155\x20\x72\x65\x61\x64\x69\x6e\147\40\143\163\x76");
        goto rh;
        Pe:
        ZO:
        if (!(($sH = fgetcsv($tj, 10000, "\x2c")) !== FALSE)) {
            goto Cl;
        }
        $Ot[] = $sH;
        goto ZO;
        Cl:
        fclose($tj);
        rh:
        self::importUsers($Ot, $w9);
        RK:
    }
    public static function insertUpdateGroups($YD)
    {
        $tZ = NULL;
        $Wg = array();
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        foreach ($YD as $cc => $jU) {
            if (!($cc == "\165\163\x65\x72\156\x61\155\145")) {
                goto RT;
            }
            $tZ = self::getUserInfo($jU);
            if (empty($tZ)) {
                goto Ug;
            }
            $FN = $tZ->id;
            Ug:
            RT:
            if (!($cc == "\147\162\x6f\x75\160")) {
                goto Nt;
            }
            $Wg = explode("\x3b", $jU);
            Nt:
            if (!$tZ) {
                goto B1;
            }
            $FN = $tZ->id;
            $yu = self::getUserNameByGroupID($FN);
            $gw = array();
            foreach ($yu as $cc => $jU) {
                $gw[] = $jU["\x74\x69\x74\x6c\x65"];
                Hq:
            }
            SY:
            foreach ($Wg as $cc => $jU) {
                $e7 = self::loadUserGroupID($jU)["\x69\x64"];
                $NG = self::isGroupAlreadyExist($FN, $e7);
                if (!(!isset($NG["\x75\x73\x65\162\137\151\144"]) || empty($NG["\x75\163\x65\x72\x5f\151\144"]))) {
                    goto hW;
                }
                self::insertNewGroup($FN, $e7);
                hW:
                xl:
            }
            Rj:
            B1:
            du:
        }
        kH:
    }
    public static function insertNewGroup($FN, $e7)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $u3 = array("\x75\x73\145\162\x5f\151\x64", "\147\x72\x6f\165\160\x5f\x69\144");
        $xK = array($Fx->quote($FN), $Fx->quote((int) $e7));
        $Ng->insert($Fx->quoteName("\x23\x5f\x5f\x75\163\x65\x72\x5f\x75\163\145\x72\147\x72\x6f\165\160\137\155\x61\x70"))->columns($Fx->quoteName($u3))->values(implode("\54", $xK));
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\x6e\x73\x69\144\145\40\151\156\x73\145\162\x74\x4e\145\x77\107\162\x6f\165\x70\x20\146\x75\156\143\164\151\x6f\156\40\x61\156\x64\40\164\150\x69\163\x20\161\165\x65\x72\171\x20\146\x61\x69\154\145\x64\x20\x61\x74\40\x25\163\72\40" . __LINE__, $Je);
            JLog::add("\124\x68\x69\163\x20\161\x75\145\162\x79\40\146\141\x69\x6c\x65\144\x3a\40" . $Ng);
            self::mo_log("\x49\x6e\x73\x69\x64\145\x20\x69\x6e\163\x65\x72\x74\116\x65\167\107\x72\157\x75\160\40\x66\165\156\143\164\x69\157\156\x20\x61\156\x64\40\x66\141\x69\x6c\x65\x64\40\x74\157\x20\x69\156\163\145\162\164\x20\164\150\x65\40\x76\x61\154\x75\x65\x73\x2e\40" . $Je);
        }
    }
    public static function isGroupAlreadyExist($Ht, $BJ)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true)->select("\x75\163\145\x72\x5f\x69\x64")->from("\43\137\137\165\163\145\162\x5f\165\x73\145\162\147\162\x6f\165\160\x5f\155\141\x70")->where($Fx->quoteName("\x67\162\x6f\x75\x70\137\151\x64") . "\x3d" . $BJ)->andWhere($Fx->quoteName("\x75\163\x65\x72\x5f\x69\144") . "\75" . $Ht);
        $Fx->setQuery($Ng);
        $Fx->execute();
        return $Fx->loadAssoc();
    }
    public static function arrayParseToInsertUsers($YD, $w9)
    {
        $Ca = MoImportExportUtility::getConfig("\43\137\137\155\151\156\x69\157\x72\x61\156\x67\x65\137\x69\x6d\x70\x6f\162\x74\x75\x73\x65\x72\x73");
        $Ce = isset($Ca["\x6d\x6f\137\144\x65\x6c\145\164\x65\x5f\165\163\145\162\x73\x5f\x77\x68\x69\x63\150\x5f\x6e\157\x74\x5f\x69\156\x5f\x63\x73\x76"]) ? $Ca["\x6d\157\137\144\145\x6c\x65\164\x65\137\x75\x73\145\162\x73\x5f\x77\150\151\143\150\x5f\156\x6f\x74\x5f\x69\x6e\137\143\163\x76"] : 0;
        if (!$Ce) {
            goto Mx;
        }
        self::updateUserInColumnForSuperuser();
        self::updateUserInColumnValue();
        Mx:
        foreach ($YD as $U5 => $N7) {
            $Ff = self::insertUser($N7, $w9);
            self::insertUpdateGroups($N7);
            rL:
        }
        mt:
        if (!$Ce) {
            goto X0;
        }
        self::deleteUsersNotinCSV();
        X0:
        if ($Ff) {
            goto kF;
        }
        $Qb = JFactory::getApplication();
        $Qb->enqueueMessage("\106\141\151\x6c\x65\144\40\164\x6f\40\151\x6d\160\157\162\x74\40\x74\150\x65\x20\165\x73\x65\x72\163\56", "\x65\x72\162\x6f\x72");
        $Qb->redirect(JRoute::_("\x69\x6e\x64\x65\x78\56\x70\x68\160\77\x6f\160\164\x69\x6f\156\x3d\x63\x6f\x6d\x5f\x6d\x69\x6e\151\157\x72\x61\156\x67\x65\137\151\155\160\x6f\162\164\145\x78\160\157\x72\x74\165\x73\145\x72\163\x26\166\x69\x65\167\75\x61\143\x63\x6f\165\156\x74\x73\x65\164\x75\x70\46\164\141\x62\55\160\141\156\145\x6c\75\x69\155\x70\x6f\x72\164\163\145\164\x74\151\156\x67\163"));
        return;
        goto hd;
        kF:
        $Qb = JFactory::getApplication();
        $Qb->enqueueMessage("\x55\163\145\162\x20\x68\x61\x73\x20\142\x65\145\156\x20\x69\x6d\160\x6f\x72\164\145\144\40\x73\165\x63\143\x65\163\x73\x66\x75\x6c\x6c\x79\56", "\x73\165\x63\143\x65\163\x73");
        $Qb->redirect(JRoute::_("\x69\156\144\x65\170\x2e\x70\x68\160\77\x6f\x70\164\151\157\156\75\x63\157\155\137\155\x69\156\151\157\x72\x61\x6e\x67\x65\137\151\155\x70\157\x72\164\145\170\160\x6f\162\164\165\x73\145\162\163\46\x76\151\x65\167\x3d\x61\x63\x63\x6f\x75\156\x74\x73\x65\x74\165\160\x26\x74\141\142\x2d\160\x61\x6e\145\x6c\x3d\151\155\160\x6f\162\x74\163\145\164\x74\151\156\x67\163"));
        return;
        hd:
    }
    public static function insertUser($YD, $w9 = FALSE)
    {
        $u3 = array();
        $xK = array();
        $cT = '';
        $CK = count($YD);
        $Pj = 1;
        $rO = 0;
        $FN = 0;
        $tZ = NULL;
        $jT = 0;
        $Ca = MoImportExportUtility::getConfig("\x23\137\x5f\x6d\x69\x6e\x69\x6f\162\141\x6e\x67\145\x5f\x69\x6d\x70\157\x72\x74\x75\x73\145\162\x73");
        $sd = isset($Ca["\155\x6f\137\x64\x6f\x6e\157\x74\137\165\160\144\141\164\145\137\x65\x78\151\163\164\151\x6e\147\x5f\x75\163\x65\x72\163"]) ? $Ca["\x6d\157\x5f\x64\x6f\156\x6f\x74\x5f\x75\160\x64\x61\x74\x65\137\145\170\151\163\x74\151\156\x67\137\x75\x73\145\162\163"] : 0;
        $Ce = isset($Ca["\155\x6f\x5f\144\145\154\x65\164\x65\x5f\165\163\x65\162\x73\137\167\150\x69\x63\150\x5f\156\x6f\164\137\151\156\x5f\x63\x73\x76"]) ? $Ca["\155\157\x5f\144\x65\x6c\145\164\145\137\165\x73\x65\x72\163\137\x77\150\151\143\x68\x5f\156\x6f\x74\137\x69\x6e\x5f\x63\x73\x76"] : 0;
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        foreach ($YD as $cc => $jU) {
            if (!($cc == "\165\163\x65\162\156\x61\x6d\145")) {
                goto cz;
            }
            $tZ = self::getUserInfo($jU);
            if (empty($tZ)) {
                goto qt;
            }
            $FN = $tZ->id;
            if (!($Ce && !empty($FN))) {
                goto qB;
            }
            MoImportExportUtility::updateUserInColumn($FN);
            qB:
            qt:
            $Ka = self::loadUserGroups($FN);
            foreach ($Ka as $cc => $jU) {
                $Yf = $jU["\147\x72\157\x75\x70\137\151\144"];
                if (!($Yf == 7 || $Yf == 8)) {
                    goto k6;
                }
                $jT = TRUE;
                k6:
                m2:
            }
            mB:
            cz:
            if (!($cc == "\162\145\147\x69\163\164\145\162\104\141\x74\145")) {
                goto YQ;
            }
            $YD[$cc] = date("\131\x2d\x6d\x2d\x64\x20\x48\72\151\x3a\163");
            YQ:
            if (!($cc == "\154\x61\163\164\166\151\x73\x69\164\104\x61\164\145" || $cc == "\154\141\163\x74\122\x65\163\145\164\124\151\155\145")) {
                goto bD;
            }
            $YD[$cc] = "\x30\60\x30\60\x2d\x30\60\55\60\x30\40\60\x30\72\60\x30\x3a\60\60";
            bD:
            if (!($cc == "\x62\154\x6f\x63\153" || $cc == "\x73\145\156\144\105\155\x61\151\x6c" || $cc == "\x72\145\163\145\x74\x43\157\165\156\164" || $cc == "\x72\x65\161\165\x69\x72\x65\x52\145\163\145\164")) {
                goto Z7;
            }
            $YD[$cc] = (int) $jU;
            Z7:
            vY:
        }
        dA:
        if ($tZ) {
            goto wq;
        }
        foreach ($YD as $cc => $jU) {
            if (!($cc != "\147\162\x6f\x75\160" && !$jT)) {
                goto WQ;
            }
            array_push($u3, $cc);
            if ($Pj < $CK - 1) {
                goto Ls;
            }
            $cT .= $Fx->quote($jU);
            goto i0;
            Ls:
            $cT .= $Fx->quote($jU) . "\x2c";
            i0:
            WQ:
            $Pj++;
            if (!($Pj > $CK)) {
                goto wU;
            }
            $rO = 1;
            wU:
            G3:
        }
        XY:
        goto Pf;
        wq:
        $FN = $tZ->id;
        if ($jT) {
            goto uQ;
        }
        if ($sd) {
            goto O5;
        }
        $Ff = self::updateUserInfo($YD, $FN);
        if ($Ff) {
            goto ds;
        }
        return FALSE;
        goto pS;
        ds:
        return TRUE;
        pS:
        O5:
        uQ:
        Pf:
        if (!($rO == 1)) {
            goto CH;
        }
        $A3 = explode("\x2c", $cT);
        if (!$Ce) {
            goto Af;
        }
        array_push($A3, "\x27\61\47");
        Af:
        array_shift($A3);
        $R3 = implode("\x2c", $A3);
        array_push($xK, $R3);
        array_shift($u3);
        $bf = 0;
        if (!(count($YD) > 16)) {
            goto P7;
        }
        $YD = array_slice($YD, 0, count($YD) - 1);
        P7:
        foreach ($YD as $cc => $jU) {
            if (!($cc == "\160\x61\162\141\x6d\x73")) {
                goto Nx;
            }
            $YD[$cc] = "\173\175";
            Nx:
            if (!($cc == "\x75\163\x65\x72\156\x61\155\x65" && empty($jU) || $cc == "\x65\155\141\151\x6c" && empty($jU))) {
                goto fP;
            }
            $bf = 1;
            fP:
            LS:
        }
        pl:
        if (!$bf) {
            goto nw;
        }
        return;
        nw:
        if (!(count($u3) > 16)) {
            goto v7;
        }
        $u3 = array_slice($u3, 0, count($u3) - 1);
        $ep = explode("\x2c", $xK[0]);
        if (!(count($ep) > 16)) {
            goto O7;
        }
        $xK = array_slice($ep, 0, count($ep) - 1);
        O7:
        v7:
        if (!$Ce) {
            goto av;
        }
        array_push($u3, "\x69\156\x55\x73\145\x72");
        av:
        $Ng->insert($Fx->quoteName("\43\137\x5f\x75\163\x65\x72\x73"))->columns($Fx->quoteName($u3))->values(implode("\54", $xK));
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\111\156\x73\x69\x64\x65\40\x69\x6e\x73\145\162\164\125\x73\x65\162\x20\146\x75\x6e\143\164\151\x6f\156\40\141\x6e\144\x20\x74\150\x69\163\x20\x71\165\x65\162\171\x20\x66\141\x69\x6c\x65\144\40\x61\164\x20\45\x73\x3a\x20" . __LINE__, $Je);
            JLog::add("\x54\150\151\163\40\x71\165\145\x72\171\x20\146\141\151\x6c\x65\144\x3a\40" . $Ng);
            self::mo_log("\x49\x6e\x73\x69\x64\145\x20\x69\x6e\163\145\x72\164\x55\163\x65\162\40\146\165\x6e\143\x74\x69\157\x6e\40\141\156\144\x20\146\141\151\154\x65\144\x20\164\157\40\x69\156\163\x65\x72\164\x20\x74\x68\x65\x20\166\141\x6c\x75\145\x73\x2e\x20" . $Je);
            return FALSE;
        }
        CH:
        return TRUE;
    }
    public static function mo_log($hP)
    {
        $n2 = $_SERVER["\104\117\103\125\115\105\116\x54\137\x52\117\117\x54"] . "\x2f\x6c\157\x67\x2f\154\157\x67\56\x6c\x6f\x67";
        $U1 = filesize($n2);
        $TY = number_format($U1 / 1024, 2);
        if (!($TY >= 256)) {
            goto KM;
        }
        file_put_contents($n2, '');
        KM:
        $aA = $_SERVER["\104\x4f\x43\x55\x4d\x45\x4e\x54\x5f\122\117\117\x54"] . "\57\x6c\157\147";
        if (file_exists($aA)) {
            goto a8;
        }
        mkdir($aA, 0777, true);
        a8:
        file_put_contents($n2, var_export($hP, true) . "\12", FILE_APPEND);
    }
    public static function updateUserInColumnValue()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($Fx->quoteName("\x69\156\x55\x73\145\x72") . "\40\75\40" . $Fx->quote("\x30"));
        $Ng->update($Fx->quoteName("\x23\x5f\137\x75\163\145\x72\x73"))->set($t0);
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\111\x6e\163\151\x64\x65\x20\x75\x70\x64\141\164\145\x55\x73\x65\162\x49\156\103\x6f\154\x75\155\156\x56\141\x6c\x75\x65\40\x66\165\156\143\164\x69\157\156\x20\141\x6e\144\x20\164\150\x69\x73\x20\161\165\145\162\x79\x20\146\141\151\154\145\144\40\x61\164\x20\45\x73\x3a\40" . __LINE__, $Je);
            JLog::add("\x54\x68\x69\163\40\x71\165\145\162\x79\40\146\141\x69\x6c\145\144\72\40" . $Ng);
            self::mo_log("\111\156\x73\151\144\x65\x20\x75\x70\x64\141\x74\x65\125\163\145\x72\111\x6e\x43\x6f\x6c\x75\155\x6e\x56\141\154\x75\x65\x20\146\165\156\143\164\x69\157\156\40\x61\156\144\x20\146\x61\x69\154\145\144\x20\164\157\x20\165\x70\x64\141\x74\145\x20\164\x68\145\40\166\141\x6c\165\145\x73\56\x20" . $Je);
        }
    }
    public static function deleteUsersNotinCSV()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $DO = array($Fx->quoteName("\x69\156\x55\x73\x65\x72") . "\40\75\40" . $Fx->quote("\x30"));
        $Ng->delete($Fx->quoteName("\43\x5f\x5f\x75\163\145\x72\163"))->where($DO);
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\x6e\163\151\144\x65\40\144\x65\x6c\x65\164\x65\x55\x73\145\162\163\116\157\164\151\x6e\103\x53\126\40\x66\165\156\x63\x74\151\x6f\156\40\x61\x6e\144\40\x74\x68\x69\163\40\x71\165\145\x72\x79\x20\146\x61\x69\154\x65\144\40\141\164\40\45\163\x3a\x20" . __LINE__, $Je);
            JLog::add("\124\x68\151\163\x20\161\x75\145\162\171\40\146\141\151\x6c\x65\x64\x3a\40" . $Ng);
            self::mo_log("\111\x6e\163\151\x64\x65\40\144\145\x6c\x65\x74\x65\x55\x73\145\162\x73\116\x6f\x74\151\156\x43\x53\x56\x20\x66\x75\x6e\143\164\x69\x6f\x6e\x20\141\x6e\144\x20\x66\x61\151\154\145\x64\x20\164\x6f\40\x64\x65\154\x65\x74\x65\x20\164\x68\x65\40\166\141\154\x75\145\163\x2e\x20" . $Je);
        }
    }
    public static function updateUserInColumn($FN)
    {
        self::updateUserInColumnForSuperuser();
        $Ka = self::loadUserGroups($FN);
        $jT = FALSE;
        foreach ($Ka as $cc => $jU) {
            $Yf = $jU["\x67\162\157\x75\160\137\151\144"];
            if (!($Yf == 7 || $Yf == 8)) {
                goto jE;
            }
            $jT = TRUE;
            jE:
            f2:
        }
        Ax:
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        if ($jT) {
            goto wG;
        }
        $t0 = array($Fx->quoteName("\151\156\x55\163\x65\162") . "\x20\75\x20\x30");
        goto sz;
        wG:
        $t0 = array($Fx->quoteName("\151\156\x55\163\x65\162") . "\x20\75\40" . $Fx->quote("\x44\x4f\x4e\124\x5f\x44\x45\114\x45\124\x45"));
        sz:
        $DO = array($Fx->quoteName("\151\144") . "\x20\75\40" . $Fx->quote($FN));
        $Ng->update($Fx->quoteName("\x23\x5f\x5f\165\163\x65\x72\x73"))->set($t0)->where($DO);
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\156\x73\151\x64\x65\40\x75\160\x64\141\x74\145\125\x73\x65\x72\111\156\x43\157\154\x75\x6d\156\x20\x66\x75\x6e\x63\164\x69\157\x6e\x20\141\x6e\144\x20\164\150\x69\163\40\x71\165\x65\x72\x79\x20\x66\x61\151\154\x65\x64\40\141\164\40\x25\163\x3a\x20" . __LINE__, $Je);
            JLog::add("\x54\x68\x69\163\x20\x71\x75\x65\162\171\x20\x66\x61\x69\154\145\x64\x3a\40" . $Ng);
            self::mo_log("\111\156\163\x69\x64\145\40\x75\160\144\x61\164\145\x55\163\x65\x72\x49\156\103\157\x6c\165\155\x6e\40\146\x75\x6e\143\x74\x69\157\x6e\x20\x61\x6e\x64\40\x66\141\151\154\145\144\40\x74\x6f\40\x75\x70\x64\141\164\145\x20\164\x68\x65\x20\166\141\x6c\x75\145\x73\56\40" . $Je);
        }
    }
    public static function updateUserInColumnForSuperuser()
    {
        $QF = self::loadAdminSuperuserRole("\70");
        $vY = self::loadAdminSuperuserRole("\67");
        $lC = array_merge($QF, $vY);
        $SS = array_unique($lC, SORT_REGULAR);
        if (empty($SS)) {
            goto Y0;
        }
        foreach ($SS as $cc => $jU) {
            $FN = $jU["\165\163\x65\x72\137\x69\x64"];
            $hS = self::isUserExist($FN);
            if (!$hS) {
                goto CK;
            }
            self::updateUserInForSuperuser($FN);
            CK:
            we:
        }
        fr:
        Y0:
    }
    public static function updateUserInForSuperuser($FN)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($Fx->quoteName("\151\156\x55\x73\x65\162") . "\40\75\40" . $Fx->quote("\104\117\116\x54\x5f\104\x45\114\105\x54\x45"));
        $DO = array($Fx->quoteName("\151\144") . "\x20\75\x20" . $FN);
        $Ng->update($Fx->quoteName("\43\137\137\165\x73\145\x72\x73"))->set($t0)->where($DO);
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\x49\x6e\163\x69\144\x65\x20\165\160\144\x61\164\145\x55\163\x65\x72\x49\x6e\x46\x6f\162\123\165\x70\x65\x72\165\163\x65\x72\40\x66\x75\156\x63\164\151\157\156\x20\141\x6e\144\40\164\150\151\163\x20\x71\x75\x65\162\171\x20\x66\141\x69\x6c\x65\144\40\141\164\40\45\x73\x3a\x20" . __LINE__, $Je);
            JLog::add("\x54\150\x69\163\x20\x71\165\145\x72\171\40\146\141\151\154\x65\144\72\40" . $Ng);
            self::mo_log("\x49\x6e\x73\x69\x64\145\40\165\160\x64\141\x74\x65\x55\x73\x65\x72\111\x6e\x46\157\162\123\165\160\145\x72\x75\x73\145\x72\40\146\x75\156\x63\x74\x69\157\156\x20\141\x6e\144\x20\146\x61\x69\154\145\x64\x20\x74\157\40\x75\160\x64\141\x74\145\x20\164\x68\145\40\166\x61\x6c\165\x65\x73\x2e\40" . $Je);
        }
    }
    public static function isUserExist($Ht)
    {
        $Fx = JFactory::getDBO();
        $Ng = $Fx->getQuery(true)->select("\165\163\145\162\x6e\141\x6d\x65")->from("\x23\137\x5f\165\163\145\x72\x73")->where("\x69\144\75" . $Fx->quote($Ht));
        $Fx->setQuery($Ng);
        $Ff = $Fx->loadResult();
        return $Ff;
    }
    public static function getUserNameByGroupID($ry)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $jw = JAccess::getGroupsByUser($ry);
        $gZ = "\x28" . implode("\54", $jw) . "\x29";
        $Ng = $Fx->getQuery(true);
        $Ng->select("\151\144\54\x20\x74\151\x74\154\145");
        $Ng->from("\x23\x5f\x5f\165\x73\145\x72\x67\x72\157\165\x70\x73");
        $Ng->where("\x69\x64\x20\111\116\40" . $gZ);
        $Fx->setQuery($Ng);
        $ZV = $Fx->loadAssocList();
        return $ZV;
    }
    public static function updateUserInfo($YD, $FN)
    {
        $Rt = $YD;
        if (!(count($YD) > 16)) {
            goto wC;
        }
        array_shift($YD);
        wC:
        $t0 = array();
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        foreach ($YD as $cc => $jU) {
            if (!($cc != "\147\162\157\165\x70")) {
                goto Qh;
            }
            array_push($t0, $Fx->quoteName($cc) . "\x20\75\40" . $Fx->quote($jU));
            Qh:
            Fw:
        }
        ne:
        $DO = array($Fx->quoteName("\x69\x64") . "\40\x3d\x20" . $Fx->quote($FN));
        $Ng->update($Fx->quoteName("\x23\137\x5f\x75\163\x65\162\163"))->set($t0)->where($DO);
        $fG = MoImportExportUtility::getConfig("\x23\137\x5f\x6d\151\x6e\151\157\x72\x61\156\147\145\137\143\x72\x6f\x6e\151\155\x70\157\162\164");
        $m0 = isset($fG["\163\145\156\144\x5f\145\x6d\x61\151\154\137\x61\x66\164\145\162\x5f\x75\160\x64\141\164\x65"]) ? $fG["\163\145\156\x64\137\x65\155\x61\x69\154\x5f\141\146\164\145\x72\137\x75\160\144\x61\x74\145"] : 0;
        $CL = isset($fG["\x73\145\x6e\144\x5f\145\155\x61\151\x6c\137\x74\x6f\x5f\x75\160\x64\x61\x74\x65\x64\x5f\165\x73\145\162\163"]) ? $fG["\x73\x65\x6e\144\x5f\x65\x6d\141\151\154\137\x74\157\x5f\165\x70\x64\141\x74\145\x64\x5f\165\x73\145\x72\x73"] : 0;
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
            if (!($m0 || $CL)) {
                goto l8;
            }
            self::sendNotification($Rt);
            l8:
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\125\x73\x65\162\x20\x55\x70\x64\x61\x74\x65\x20\x55\163\x65\x72\x20\161\x75\x65\162\x79\40\146\x61\151\x6c\x65\x64\x20\141\164\x20\45\x73\72\x20" . __LINE__, $Je);
            JLog::add("\124\x68\x69\163\x20\161\x75\x65\x72\171\40\146\x61\151\154\145\x64\72\40" . $Ng);
            self::mo_log("\x49\x6e\x73\x69\x64\x65\x20\165\x70\x64\141\x74\x65\x55\163\145\162\x49\156\x66\157\x20\146\165\156\x63\x74\151\157\156\x20\x61\x6e\144\x20\146\x61\151\x6c\145\x64\x20\x74\157\x20\165\x70\x64\141\164\145\x20\x74\x68\145\40\166\x61\x6c\x75\x65\x73\x2e\40" . $Je);
            return FALSE;
        }
        return TRUE;
    }
    public static function sendNotification($YD)
    {
        $Ch = self::getHostname();
        $rH = $Ch . "\x2f\x6d\157\x61\163\57\x61\160\x69\57\156\x6f\x74\151\x66\x79\57\x73\x65\x6e\144";
        $qi = curl_init($rH);
        $QK = self::getCustomerDetails();
        $j3 = $QK["\x63\165\163\x74\157\155\145\x72\x5f\153\x65\171"];
        $Gc = $QK["\141\x70\151\137\153\145\x79"];
        $KQ = $QK["\145\155\x61\151\154"];
        $zW = $YD["\145\155\141\x69\x6c"];
        $r8 = json_encode($YD, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if (!(!empty($j3) && !empty($Gc) && !empty($KQ) && !empty($zW))) {
            goto uS;
        }
        $iG = round(microtime(true) * 1000);
        $EM = $j3 . number_format($iG, 0, '', '') . $Gc;
        $im = hash("\x73\150\x61\65\x31\62", $EM);
        $uK = "\103\x75\163\x74\157\155\145\x72\55\113\145\x79\72\40" . $j3;
        $ys = "\124\151\155\x65\x73\x74\x61\155\x70\x3a\40" . number_format($iG, 0, '', '');
        $XC = "\101\x75\164\150\157\x72\151\172\x61\164\x69\157\156\72\40" . $im;
        $dW = JFactory::getConfig();
        $Wh = $dW->get("\x73\151\x74\x65\156\141\x6d\x65");
        $Yx = "\125\x73\145\162\40\165\x70\144\x61\x74\x65\x20\x6e\x6f\x74\x69\146\151\143\x61\x74\x69\x6f\x6e";
        $mF = "\131\x6f\x75\162\x20\165\163\145\162\40\151\156\x66\x6f\x72\x6d\141\x74\x69\x6f\156\40\150\141\x73\40\x62\x65\145\x6e\40\143\150\141\x6e\x67\x65\144\x20\157\156\40\164\150\145\40\163\151\x74\x65\x3a\40" . $Wh . "\40\124\150\145\40\x66\157\154\x6c\157\167\x69\x6e\x67\40\x75\x73\x65\x72\x20\x64\141\x74\x61\40\150\x61\x73\x20\142\x65\x65\x6e\x20\x75\x70\144\141\x74\x65\144\x2e\74\142\162\x20\x2f\x3e\x3c\142\x72\x20\57\x3e\74\142\x72\40\57\76";
        $mF .= $r8;
        $wB = "\152\x6f\x6f\x6d\x6c\x61\163\165\x70\160\157\x72\164\x40\x78\145\143\x75\162\151\x66\x79\56\x63\x6f\x6d";
        $t0 = array("\x63\165\x73\164\157\155\x65\x72\x4b\x65\x79" => $j3, "\x73\x65\156\144\x45\155\x61\151\x6c" => true, "\x65\x6d\x61\x69\x6c" => array("\143\x75\x73\x74\157\x6d\x65\x72\x4b\x65\171" => $j3, "\146\x72\157\155\x45\x6d\x61\x69\154" => $wB, "\142\x63\x63\105\155\141\151\154" => $zW, "\x66\x72\x6f\155\116\x61\155\x65" => "\155\151\156\151\x4f\x72\141\x6e\147\145", "\164\157\x45\x6d\x61\x69\154" => $zW, "\x74\157\x4e\141\x6d\145" => $zW, "\163\x75\x62\152\x65\x63\x74" => "{$Yx}", "\143\157\x6e\x74\x65\156\164" => $mF));
        $gH = json_encode($t0);
        curl_setopt($qi, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($qi, CURLOPT_ENCODING, '');
        curl_setopt($qi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($qi, CURLOPT_AUTOREFERER, true);
        curl_setopt($qi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($qi, CURLOPT_MAXREDIRS, 10);
        curl_setopt($qi, CURLOPT_HTTPHEADER, array("\x43\157\156\x74\x65\156\x74\55\124\171\x70\145\x3a\40\141\x70\x70\154\151\x63\141\164\151\x6f\156\57\x6a\163\x6f\x6e", $uK, $ys, $XC));
        curl_setopt($qi, CURLOPT_POST, true);
        curl_setopt($qi, CURLOPT_POSTFIELDS, $gH);
        $mF = curl_exec($qi);
        if (!curl_errno($qi)) {
            goto uZ;
        }
        return json_encode(array("\163\x74\141\x74\165\163" => "\105\122\122\117\122", "\x73\x74\141\x74\165\163\x4d\145\x73\x73\x61\147\x65" => curl_error($qi)));
        uZ:
        curl_close($qi);
        return json_encode(array("\163\x74\x61\164\165\163" => "\x53\x55\103\103\105\x53\123", "\x73\x74\x61\x74\x75\x73\115\145\x73\x73\141\147\145" => "\123\125\103\x43\105\123\123"));
        uS:
    }
    public static function updateDBValue($Sf, $J8, $af)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($Fx->quoteName($J8) . "\40\75\x20" . $Fx->quote($af));
        $DO = array($Fx->quoteName("\151\x64") . "\x20\75\40\61");
        $Ng->update($Fx->quoteName($Sf))->set($t0)->where($DO);
        $Fx->setQuery($Ng);
        $Fx->execute();
    }
    public static function insertUsername($J8, $jU)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $u3 = array($J8);
        $xK = array($Fx->quote($jU));
        $Ng->insert($Fx->quoteName("\x23\x5f\x5f\x75\x73\x65\162\163"))->columns($Fx->quoteName($u3))->values(implode("\x2c", $xK));
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\111\x6e\x73\x69\x64\x65\x20\151\156\163\145\x72\x74\125\x73\x65\x72\156\141\155\145\40\x66\165\x6e\x63\x74\151\x6f\x6e\x20\x61\156\x64\40\164\150\151\163\40\x71\x75\x65\162\171\40\146\141\151\154\x65\144\40\141\164\x20\45\163\72\40" . __LINE__, $Je);
            JLog::add("\124\x68\x69\x73\x20\x71\165\145\x72\171\x20\146\141\x69\154\x65\x64\72\x20" . $Ng);
            self::mo_log("\x49\156\x73\x69\x64\145\40\151\x6e\x73\x65\162\164\x55\163\x65\162\x6e\x61\155\145\40\x66\165\x6e\143\x74\x69\x6f\156\40\x61\x6e\x64\x20\x66\x61\151\154\145\x64\x20\164\x6f\x20\x69\x6e\163\145\162\164\40\x74\150\145\x20\166\x61\x6c\x75\145\x73\56\x20" . $Je);
        }
    }
    public static function getUserInfo($ku)
    {
        $Fx = JFactory::getDBO();
        $Ng = $Fx->getQuery(true)->select("\52")->from("\x23\x5f\x5f\x75\x73\145\x72\163")->where("\165\163\x65\162\x6e\x61\155\145\75" . $Fx->quote($ku));
        $Fx->setQuery($Ng);
        $Ff = $Fx->loadObject();
        return $Ff;
    }
    public static function decrypt($jU)
    {
        if (self::isExtensionInstalled("\x6f\x70\x65\156\163\163\154")) {
            goto ja;
        }
        return;
        ja:
        $QK = self::_genericGetDBValues("\x23\137\137\x6d\151\x6e\x69\157\162\x61\x6e\x67\145\137\x69\155\x70\x6f\x72\x74\145\x78\160\157\x72\164\137\143\x75\163\164\x6f\155\x65\162\x5f\144\x65\x74\141\151\154\x73");
        $cc = $QK["\x63\165\x73\164\157\155\145\x72\x5f\164\157\153\145\x6e"];
        $j1 = rtrim(openssl_decrypt(base64_decode($jU), "\141\145\163\x2d\x31\62\70\55\x65\143\x62", $cc, OPENSSL_RAW_DATA), "\x0");
        return trim($j1, "\x0\56\x2e\x1a");
    }
    public static function encrypt($ei)
    {
        $ei = stripcslashes($ei);
        if (self::isExtensionInstalled("\x6f\160\145\156\x73\x73\x6c")) {
            goto fY;
        }
        return;
        fY:
        $QK = self::_genericGetDBValues("\x23\x5f\137\x6d\151\x6e\151\x6f\162\x61\156\x67\x65\x5f\x69\x6d\x70\157\162\x74\145\170\x70\x6f\x72\x74\x5f\143\165\x73\164\x6f\155\145\162\x5f\x64\x65\164\x61\x69\x6c\x73");
        $cc = $QK["\143\165\163\x74\157\x6d\x65\162\x5f\x74\x6f\153\145\x6e"];
        return base64_encode(openssl_encrypt($ei, "\x61\x65\163\55\x31\x32\x38\55\145\x63\142", $cc, OPENSSL_RAW_DATA));
    }
    public static function getUserID($jU)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\x69\144")->from("\43\137\137\x75\x73\145\x72\163")->where($Fx->quoteName("\x75\x73\x65\162\x6e\141\155\145") . "\40\75\40" . $Fx->quote($jU)));
        return $Fx->loadAssoc();
    }
    public static function downloadCSVFile($tP)
    {
        $AJ = '';
        $oM = count($tP);
        if (!is_array($tP)) {
            goto qX;
        }
        foreach ($tP[0] as $cc => $jU) {
            $AJ .= $cc . "\54";
            si:
        }
        U7:
        $AJ .= "\x67\162\157\165\160" . "\x2c";
        $AJ .= "\12";
        $Pj = 0;
        Q9:
        if (!($Pj < $oM)) {
            goto My;
        }
        if (!is_array($tP)) {
            goto no;
        }
        foreach ($tP[$Pj] as $cc => $jU) {
            if (!($cc == "\160\141\x72\141\x6d\x73")) {
                goto ZZ;
            }
            $jU = "\x7b\175";
            ZZ:
            $AJ .= $jU . "\x2c";
            $FN = $tP[$Pj]["\x69\144"];
            jimport("\152\157\157\155\x6c\x61\x2e\141\x63\x63\x65\163\163\56\x61\x63\143\145\x73\x73");
            $jw = JAccess::getGroupsByUser($FN, false);
            Mt:
        }
        Lj:
        $FC = '';
        if (is_array($jw)) {
            goto BC;
        }
        $AJ .= $jw . "\54";
        goto kM;
        BC:
        $n_ = array();
        foreach ($jw as $y2) {
            $n_[] = self::getGroupNameByID($y2);
            q2:
        }
        Zt:
        $FC = implode("\73", $n_);
        $AJ .= $FC . "\54";
        kM:
        no:
        $AJ .= "\xa";
        PD:
        $Pj++;
        goto Q9;
        My:
        header("\103\x6f\156\x74\145\x6e\164\x2d\x54\x79\160\x65\72\40\141\x70\160\154\151\x63\x61\x74\x69\157\156\x2f\x63\163\x76");
        header("\x43\x6f\156\164\145\156\x74\55\104\151\163\160\157\x73\151\x74\x69\x6f\156\72\x20\x61\x74\164\141\143\x68\155\145\x6e\x74\73\x20\x66\151\154\x65\156\x61\x6d\145\75\42\165\163\x65\x72\x73\x5f\162\145\x70\x6f\x72\164\x2e\x63\x73\x76\42");
        print_r($AJ);
        exit;
        qX:
        header("\103\x6f\x6e\164\145\x6e\x74\55\x54\171\x70\145\x3a\40\141\x70\160\x6c\151\143\141\164\x69\157\156\57\x63\163\x76");
        header("\x43\157\x6e\164\x65\x6e\x74\x2d\x44\x69\163\x70\157\163\151\164\x69\157\156\x3a\x20\x61\x74\164\141\x63\x68\x6d\145\156\x74\73\40\x66\x69\154\x65\x6e\x61\155\x65\75\42\165\163\145\162\x73\x5f\162\145\160\x6f\162\164\x2e\x63\x73\x76\42");
        print_r($AJ);
        exit;
    }
    public static function isExtensionInstalled($VI)
    {
        if (in_array($VI, get_loaded_extensions())) {
            goto Ef;
        }
        return false;
        goto Zq;
        Ef:
        return true;
        Zq:
    }
    public static function _genericGetDBValues($MR)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select(array("\52"));
        $Ng->from($Fx->quoteName($MR));
        $Ng->where($Fx->quoteName("\x69\x64") . "\40\x3d\x20\61");
        $Fx->setQuery($Ng);
        $Ff = $Fx->loadAssoc();
        return $Ff;
    }
    public static function getJoomlaCmsVersion()
    {
        $uE = new JVersion();
        return $uE->getShortVersion();
    }
    public static function downloadCSVFileWithGroups($tP)
    {
        $Ca = MoImportExportUtility::getConfig("\x23\137\x5f\x6d\151\156\151\x6f\x72\141\156\x67\x65\x5f\145\170\160\x6f\x72\164\x75\163\145\162\x73");
        $kC = isset($Ca["\155\x6f\137\x73\171\156\143\137\x66\x6f\x72\137\x72\157\154\145\x73"]) && !empty($Ca["\155\157\x5f\163\x79\156\143\x5f\x66\x6f\162\137\x72\157\154\145\163"]) ? json_decode($Ca["\x6d\157\137\163\171\x6e\143\137\146\x6f\162\x5f\x72\x6f\x6c\x65\163"]) : array();
        $ue = array();
        foreach ($kC as $y2) {
            $BJ = self::loadUserGroupID($y2);
            $tP = self::getUsersUsingGroupID($BJ["\151\144"]);
            array_push($ue, $tP);
            rd:
        }
        Az:
        $q0 = array();
        foreach ($ue as $GX => $T_) {
            if (!is_array($T_)) {
                goto SU;
            }
            foreach ($T_ as $tP) {
                array_push($q0, $tP);
                S9:
            }
            Cr:
            SU:
            Ga:
        }
        rp:
        $dA = array_map("\163\145\162\x69\x61\154\x69\x7a\145", $q0);
        $F_ = array_unique($dA);
        $qj = array_intersect_key($q0, $F_);
        $tP = array_values($qj);
        self::exportUsersWithGroupsAndDownloadCSV($tP);
    }
    public static function exportUsersWithGroupsAndDownloadCSV($tP)
    {
        $AJ = '';
        if (!is_array($tP)) {
            goto b2;
        }
        foreach ($tP as $cc => $jU) {
            if (!(is_array($jU) && !empty($jU))) {
                goto jH;
            }
            foreach ($jU as $cc => $R3) {
                $AJ .= $cc . "\54";
                xK:
            }
            Lf:
            goto mU;
            jH:
            FU:
        }
        mU:
        $AJ .= "\147\162\157\x75\x70" . "\54";
        $AJ .= "\12";
        $oM = count($tP);
        $Pj = 0;
        qS:
        if (!($Pj < $oM)) {
            goto Un;
        }
        if (!is_array($tP)) {
            goto mN;
        }
        foreach ($tP[$Pj] as $cc => $jU) {
            if (!($cc == "\160\141\x72\141\x6d\163")) {
                goto z9;
            }
            $jU = "\x7b\x7d";
            z9:
            $AJ .= $jU . "\54";
            $FN = $tP[$Pj]["\151\x64"];
            jimport("\152\x6f\157\155\x6c\141\56\x61\143\x63\145\x73\x73\x2e\x61\143\x63\x65\x73\163");
            $jw = JAccess::getGroupsByUser($FN, false);
            ck:
        }
        BM:
        if (!$tP[$Pj]) {
            goto Bv;
        }
        $FC = '';
        if (is_array($jw)) {
            goto M3;
        }
        $AJ .= $jw;
        goto t5;
        M3:
        $n_ = array();
        foreach ($jw as $y2) {
            $n_[] = self::getGroupNameByID($y2);
            O0:
        }
        U5:
        $FC = implode("\x3b", $n_);
        $AJ .= $FC;
        t5:
        Bv:
        mN:
        if (!$tP[$Pj]) {
            goto TX;
        }
        $AJ .= "\xa";
        TX:
        Cu:
        $Pj++;
        goto qS;
        Un:
        header("\103\157\x6e\164\x65\x6e\164\x2d\124\171\160\x65\72\40\141\160\160\154\151\143\141\164\x69\x6f\156\x2f\143\163\x76");
        header("\x43\157\x6e\x74\x65\x6e\x74\55\x44\x69\x73\x70\x6f\163\151\164\x69\157\x6e\x3a\40\x61\x74\x74\141\143\150\155\x65\156\x74\x3b\40\x66\x69\x6c\145\156\x61\155\145\x3d\42\x55\x73\145\x72\x52\x65\160\x6f\162\x74\x73\56\143\163\166\x22");
        print_r($AJ);
        exit;
        b2:
        header("\103\x6f\156\x74\x65\156\164\x2d\124\171\160\145\72\x20\141\160\160\154\x69\x63\x61\164\151\x6f\x6e\x2f\x63\163\x76");
        header("\x43\x6f\x6e\164\145\156\164\x2d\x44\x69\163\160\157\163\x69\164\x69\157\156\72\40\x61\x74\x74\141\143\150\x6d\145\x6e\x74\73\40\x66\151\154\x65\x6e\x61\x6d\145\75\x22\x55\163\x65\162\122\x65\x70\157\162\164\x73\56\x63\x73\x76\x22");
        print_r($AJ);
        exit;
    }
    public static function loadUserGroupID($n_)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\151\144")->from("\43\x5f\137\x75\x73\145\162\147\162\x6f\x75\160\x73")->where($Fx->quoteName("\164\151\x74\154\x65") . "\40\x3d\x20" . $Fx->quote($n_)));
        return $Fx->loadAssoc();
    }
    public static function getUsersUsingGroupID($BJ)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery("\x53\145\154\145\143\164\x20\x75\163\145\162\156\141\x6d\x65\x20\106\x72\x6f\x6d\40\43\x5f\137\x75\163\x65\162\x73\40\x49\x6e\156\145\x72\x20\112\x6f\x69\156\x20\x23\137\x5f\x75\163\x65\x72\137\165\x73\145\x72\147\162\x6f\x75\160\x5f\155\x61\160\40\117\156\x20\x23\137\137\x75\163\145\162\163\x2e\151\144\40\x3d\x20\x23\x5f\x5f\165\x73\145\x72\x5f\x75\x73\x65\162\x67\x72\x6f\165\160\137\155\x61\x70\x2e\x75\x73\145\162\x5f\x69\144\40\127\x68\145\x72\145\x20\43\137\137\x75\x73\145\162\x5f\165\163\x65\x72\147\x72\x6f\165\160\137\155\x61\160\x2e\147\162\157\x75\x70\137\x69\144\40\75\40" . $BJ . '');
        $Ff = $Fx->loadColumn();
        $cD = count($Ff);
        $LE = array();
        $Pj = 0;
        k8:
        if (!($Pj < $cD)) {
            goto ll;
        }
        $Yf = isset($Ff[$Pj]) && !empty($Ff[$Pj]) ? $Ff[$Pj] : NULL;
        if (!(NULL != $Yf)) {
            goto Oq;
        }
        $LE[] = self::getUserInfoUsingUName($Yf);
        Oq:
        Og:
        $Pj++;
        goto k8;
        ll:
        return $LE;
    }
    public static function importRoles($Ht, $BJ)
    {
        $t0 = array();
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $t0 = array($t0, $Fx->quoteName("\x75\163\x65\x72\137\x69\x64") . "\x20\x3d\x20" . $Fx->quote($Ht), $t0, $Fx->quoteName("\x67\162\x6f\x75\x70\137\151\x64") . "\40\75\40" . $Fx->quote($BJ));
        $Ng->update($Fx->quoteName("\43\137\x5f\165\163\145\x72\x5f\x75\163\x65\162\147\x72\157\x75\x70\137\x6d\x61\160"))->set($t0);
        try {
            $Fx->setQuery($Ng);
            $Fx->execute();
        } catch (Exception $qy) {
            $Je = $qy->getMessage();
            JLog::add("\111\156\163\151\x64\x65\40\x69\155\160\x6f\162\x74\x52\x6f\x6c\x65\163\40\146\165\x6e\143\x74\x69\x6f\x6e\40\x61\x6e\144\40\x74\x68\151\x73\x20\161\165\145\x72\171\x20\x66\x61\151\x6c\x65\144\x20\141\x74\x20\45\x73\x3a\x20" . __LINE__, $Je);
            JLog::add("\x54\150\x69\x73\x20\x71\x75\145\x72\171\40\146\x61\x69\154\145\x64\x3a\x20" . $Ng);
            self::mo_log("\111\x6e\163\x69\144\x65\x20\x69\x6d\x70\157\162\164\x52\x6f\x6c\145\x73\x20\146\x75\x6e\x63\164\x69\157\x6e\40\x61\x6e\144\40\146\141\151\x6c\145\144\x20\x74\157\x20\x75\160\x64\x61\x74\145\40\164\150\x65\40\166\141\x6c\x75\x65\163\x2e\x20" . $Je);
        }
    }
    public static function getUserInfoUsingUName($ku)
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select("\52");
        $Ng->from($Fx->quoteName("\x23\137\137\x75\163\x65\162\x73"));
        $Ng->where($Fx->quoteName("\x75\x73\x65\x72\156\141\x6d\145") . "\x20\x3d\x20" . $Fx->quote($ku));
        $Fx->setQuery($Ng);
        return $Fx->loadAssoc();
    }
    public static function getCustomerDetails()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select("\52");
        $Ng->from($Fx->quoteName("\x23\137\137\155\x69\x6e\151\157\x72\141\x6e\x67\145\137\x69\x6d\x70\x6f\162\x74\145\170\x70\x6f\162\x74\137\x63\x75\x73\x74\x6f\x6d\x65\x72\x5f\144\145\x74\141\x69\154\163"));
        $Ng->where($Fx->quoteName("\x69\x64") . "\x20\x3d\x20\61");
        $Fx->setQuery($Ng);
        return $Fx->loadAssoc();
    }
    public static function getConfig($Sf)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\52")->from($Sf));
        return $Fx->loadAssoc();
    }
    public static function check_empty_or_null($jU)
    {
        if (!(!isset($jU) || empty($jU))) {
            goto oD;
        }
        return true;
        oD:
        return false;
    }
    public static function is_curl_installed()
    {
        if (in_array("\143\165\x72\154", get_loaded_extensions())) {
            goto Yq;
        }
        return 0;
        goto RN;
        Yq:
        return 1;
        RN:
    }
    public static function getCustomerToken()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select("\x63\165\163\164\157\155\x65\162\x5f\x74\157\153\145\156");
        $Ng->from($Fx->quoteName("\x23\x5f\x5f\x6d\151\x6e\x69\157\x72\141\x6e\x67\x65\x5f\151\x6d\160\x6f\162\164\145\170\x70\157\x72\164\x5f\x63\165\x73\x74\x6f\x6d\145\x72\137\x64\145\164\141\x69\154\x73"));
        $Ng->where($Fx->quoteName("\x69\x64") . "\40\x3d\40\x31");
        $Fx->setQuery($Ng);
        return $Fx->loadResult();
    }
    public static function is_extension_installed($VI)
    {
        if (in_array($VI, get_loaded_extensions())) {
            goto IK;
        }
        return false;
        goto n5;
        IK:
        return true;
        n5:
    }
    public static function getHostname()
    {
        return "\150\164\x74\160\163\x3a\x2f\57\154\157\147\151\156\x2e\170\x65\x63\165\162\x69\146\x79\x2e\143\x6f\x6d";
    }
    public static function readUsersTableData()
    {
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select("\52");
        $Ng->from($Fx->quoteName("\43\137\137\x75\x73\x65\162\x73"));
        $Fx->setQuery($Ng);
        return $Fx->loadAssocList();
    }
    public static function readSpecificUserData($G3)
    {
        $Bi = str_ends_with($G3, "\73");
        $ID = explode("\x3b", $G3);
        if (!$Bi) {
            goto nm;
        }
        $ID = array_slice($ID, 0, count($ID) - 1);
        nm:
        if (!(isset($ID[0]) && $ID[0] != "\x69\144")) {
            goto MW;
        }
        array_unshift($ID, "\151\144");
        MW:
        $Fx = JFactory::getDbo();
        $Ng = $Fx->getQuery(true);
        $Ng->select($Fx->quoteName($ID));
        $Ng->from($Fx->quoteName("\43\x5f\137\x75\x73\x65\x72\x73"));
        $Fx->setQuery($Ng);
        return $Fx->loadAssocList();
    }
    public static function loadGroups()
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\52")->from("\43\137\x5f\165\163\x65\162\x67\x72\x6f\165\x70\x73"));
        return $Fx->loadAssocList();
    }
    public static function loadUserGroups($FN)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\147\162\157\x75\x70\x5f\x69\x64")->from("\x23\137\x5f\x75\x73\x65\x72\137\165\163\x65\162\147\x72\x6f\165\x70\137\155\x61\x70")->where($Fx->quoteName("\165\x73\x65\162\x5f\151\x64") . "\40\75\x20" . $Fx->quote($FN)));
        return $Fx->loadAssocList();
    }
    public static function loadAdminSuperuserRole($BJ)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\165\163\x65\x72\137\151\144")->from("\x23\137\137\165\163\145\162\x5f\x75\163\145\x72\x67\162\157\x75\160\x5f\155\141\160")->where($Fx->quoteName("\x67\162\x6f\165\160\x5f\x69\144") . "\40\75\40" . $Fx->quote($BJ)));
        return $Fx->loadAssocList();
    }
    public static function getGroupNameByID($BJ)
    {
        $Fx = JFactory::getDbo();
        $Fx->setQuery($Fx->getQuery(true)->select("\164\x69\164\x6c\145")->from("\43\x5f\x5f\165\163\x65\x72\x67\162\x6f\x75\x70\163")->where($Fx->quoteName("\x69\144") . "\40\x3d\x20" . $Fx->quote($BJ)));
        $Ff = $Fx->loadAssoc();
        return $Ff["\x74\151\x74\154\145"];
    }
    public static function get_plan_type($vi)
    {
        if ($vi == "\152\x6f\157\155\x6c\x61\x5f\x69\x6d\x70\157\x72\164\137\145\170\160\x6f\162\164\137\x70\x72\x65\155\x69\165\155\137\x71\165\141\162\x74\x65\x72\x6c\x79\x5f\x70\x6c\141\156") {
            goto X7;
        }
        if ($vi == "\x6a\x6f\x6f\155\x6c\141\137\151\x6d\x70\157\x72\x74\x5f\x65\170\160\157\x72\x74\137\160\162\145\x6d\x69\x75\x6d\x5f\x68\x61\x6c\x66\x79\145\x61\x72\x6c\x79\x5f\160\x6c\141\156") {
            goto Yo;
        }
        return "\x79\145\141\162\x6c\171";
        goto A8;
        Yo:
        return "\x68\x61\x6c\x66\171\x65\141\x72\154\171";
        A8:
        goto wd;
        X7:
        return "\161\165\x61\162\x74\145\x72\x6c\x79";
        wd:
    }
}
