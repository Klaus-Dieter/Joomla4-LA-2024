<?php


defined("\x5f\112\105\x58\105\x43") or die("\122\145\163\x74\x72\x69\x63\164\145\x64\40\141\x63\x63\145\163\x73");
class MoImportExportCustomer
{
    public $email;
    public $phone;
    public $customerKey;
    public $transactionId;
    private $defaultCustomerKey = "\x31\x36\65\65\65";
    private $defaultApiKey = "\146\106\x64\62\x58\143\x76\x54\x47\104\x65\155\132\x76\x62\167\x31\x62\x63\x55\145\x73\116\x4a\127\x45\x71\x4b\x62\x62\125\161";
    function create_customer()
    {
        if (MoImportExportUtility::is_curl_installed()) {
            goto M7;
        }
        return json_encode(array("\141\x70\x69\x4b\x65\x79" => "\x43\125\122\114\x5f\x45\x52\122\117\122", "\x74\157\153\145\x6e" => "\x3c\141\x20\150\x72\145\x66\x3d\x22\150\x74\x74\x70\x3a\57\x2f\x70\x68\x70\x2e\x6e\x65\164\57\x6d\x61\x6e\x75\141\x6c\x2f\x65\156\57\143\x75\x72\154\56\151\x6e\x73\x74\x61\154\154\x61\164\151\x6f\156\x2e\160\150\160\42\x3e\120\x48\x50\x20\143\x55\122\x4c\x20\x65\170\164\x65\x6e\163\151\x6f\156\74\57\x61\76\40\x69\x73\x20\156\157\164\40\151\156\x73\164\x61\154\154\145\x64\x20\157\162\40\144\x69\163\141\142\154\x65\144\56"));
        M7:
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\x2f\x6d\x6f\141\x73\57\x72\145\163\x74\x2f\143\x75\163\164\x6f\155\x65\x72\57\x61\x64\x64";
        $current_user = JFactory::getUser();
        $QK = MoImportExportUtility::getCustomerDetails();
        $this->email = $QK["\x65\155\x61\151\x6c"];
        $this->phone = $QK["\141\x64\155\151\156\x5f\x70\150\157\x6e\145"];
        $CS = $QK["\160\x61\x73\x73\167\x6f\x72\144"];
        $t0 = array("\x63\x6f\x6d\x70\x61\156\171\x4e\141\155\145" => $_SERVER["\x53\105\x52\126\x45\x52\137\116\101\x4d\105"], "\141\162\145\141\x4f\146\111\x6e\164\x65\162\145\163\164" => "\112\157\x6f\x6d\x6c\141\40\x49\x6d\x70\157\162\164\x20\x45\x78\x70\157\x72\164\x20\x55\x73\145\x72\x73", "\x66\x69\x72\x73\x74\x6e\x61\x6d\x65" => $current_user->name, "\154\141\163\164\156\141\155\145" => '', "\x65\155\x61\151\x6c" => $this->email, "\160\x68\x6f\x6e\145" => $this->phone, "\160\x61\x73\163\x77\157\162\x64" => $CS);
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function get_customer_key($KQ, $CS)
    {
        if (MoImportExportUtility::is_curl_installed()) {
            goto pO;
        }
        return json_encode(array("\141\x70\151\x4b\145\171" => "\103\125\x52\114\x5f\105\122\x52\x4f\122", "\x74\157\153\x65\156" => "\x3c\141\x20\x68\162\x65\x66\75\42\x68\164\x74\160\x3a\57\57\160\150\160\56\156\145\x74\57\155\141\x6e\165\x61\154\57\145\x6e\x2f\x63\x75\x72\154\56\151\156\x73\164\x61\154\x6c\141\x74\x69\x6f\156\56\x70\150\160\42\76\120\x48\x50\40\x63\125\122\x4c\40\x65\170\x74\145\x6e\x73\151\x6f\x6e\74\57\x61\x3e\x20\151\x73\x20\156\157\164\x20\x69\x6e\x73\164\x61\x6c\x6c\x65\x64\x20\x6f\162\40\144\x69\x73\141\142\154\145\144\56"));
        pO:
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\57\x6d\x6f\141\163\x2f\x72\145\x73\x74\57\x63\x75\163\164\x6f\155\145\162\x2f\x6b\145\171";
        $t0 = array("\145\x6d\141\x69\154" => $KQ, "\160\141\163\163\x77\x6f\x72\x64" => $CS);
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function submit_contact_us($kI, $cw, $Ng)
    {
        if (MoImportExportUtility::is_curl_installed()) {
            goto Bi;
        }
        return json_encode(array("\163\164\x61\164\x75\x73" => "\103\125\x52\114\137\x45\122\122\x4f\x52", "\x73\164\x61\x74\165\163\x4d\x65\163\163\x61\147\x65" => "\x3c\141\x20\150\162\x65\x66\75\x22\x68\164\164\x70\72\57\x2f\x70\150\160\x2e\x6e\145\x74\57\x6d\x61\x6e\165\x61\154\57\145\x6e\57\x63\165\x72\154\x2e\151\156\x73\x74\x61\x6c\x6c\x61\164\151\x6f\x6e\x2e\160\150\160\x22\76\x50\x48\x50\40\143\x55\122\x4c\40\x65\x78\x74\x65\156\163\x69\157\156\x3c\x2f\x61\76\40\151\163\x20\x6e\157\x74\x20\x69\x6e\163\x74\x61\x6c\154\145\144\x20\x6f\x72\40\144\151\x73\x61\x62\x6c\145\x64\56"));
        Bi:
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\x2f\x6d\x6f\141\163\57\162\x65\x73\x74\57\143\x75\x73\164\x6f\155\x65\162\x2f\143\157\x6e\164\141\143\x74\x2d\165\163";
        $current_user = JFactory::getUser();
        $Yx = "\x4a\x6f\157\155\154\141\40\x49\155\x70\157\162\164\40\105\170\160\x6f\162\164\x20\125\x73\145\x72\x73";
        $Ng = "\133\112\157\x6f\155\154\x61\40\111\155\x70\157\x72\164\40\x45\170\160\157\162\164\40\x55\x73\145\162\x73\x5d\72\x20" . $Ng;
        $t0 = array("\x66\x69\162\x73\x74\116\x61\155\x65" => $current_user->username, "\154\x61\163\164\116\141\x6d\x65" => '', "\143\x6f\155\x70\x61\x6e\171" => $_SERVER["\123\105\x52\x56\x45\x52\137\116\101\115\x45"], "\x65\x6d\x61\151\x6c" => $kI, "\143\143\105\x6d\141\151\x6c" => "\x6a\157\157\155\x6c\141\163\x75\x70\160\x6f\162\x74\x40\x78\x65\x63\x75\x72\151\x66\171\x2e\143\157\155", "\160\150\157\156\x65" => $cw, "\163\165\x62\152\145\x63\x74" => $Yx, "\161\x75\145\x72\171" => $Ng);
        $gH = json_encode($t0);
        self::curl_call($rH, $gH);
        return true;
    }
    function check_customer($KQ)
    {
        if (MoImportExportUtility::is_curl_installed()) {
            goto sy;
        }
        return json_encode(array("\x73\x74\x61\x74\165\163" => "\x43\x55\x52\x4c\137\x45\x52\x52\117\122", "\163\164\141\164\165\163\x4d\145\163\x73\x61\x67\x65" => "\x3c\x61\x20\x68\162\x65\x66\x3d\x22\150\164\x74\160\72\x2f\x2f\160\x68\x70\x2e\x6e\x65\x74\x2f\155\x61\x6e\165\141\154\x2f\145\x6e\x2f\x63\x75\x72\154\x2e\x69\156\163\164\x61\x6c\154\x61\x74\151\157\156\x2e\x70\150\160\42\76\120\x48\x50\40\x63\125\x52\x4c\x20\x65\x78\164\x65\156\163\x69\x6f\156\x3c\57\141\76\x20\x69\163\40\156\x6f\x74\x20\x69\156\163\x74\141\x6c\154\145\144\x20\x6f\x72\40\x64\151\x73\x61\x62\154\x65\144\56"));
        sy:
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\x2f\155\157\x61\163\57\162\x65\163\x74\x2f\x63\165\163\x74\x6f\155\145\162\57\143\x68\x65\143\153\55\151\x66\x2d\x65\x78\x69\x73\x74\x73";
        $t0 = array("\145\155\141\151\x6c" => $KQ);
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function check($Vb)
    {
        $QK = MoImportExportUtility::getCustomerDetails();
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\57\155\157\141\x73\57\x61\x70\x69\x2f\142\141\143\153\x75\160\143\157\x64\x65\57\x76\145\162\x69\146\171";
        $j3 = $QK["\143\x75\163\164\x6f\155\145\x72\x5f\153\x65\x79"];
        $Gc = $QK["\141\160\x69\x5f\153\145\x79"];
        $Sz = JURI::root();
        $t0 = array("\143\x6f\144\145" => $Vb, "\143\165\x73\164\157\155\x65\162\113\145\171" => $j3, "\141\144\x64\151\164\x69\x6f\x6e\x61\x6c\x46\x69\x65\154\x64\x73" => array("\x66\151\145\154\x64\61" => $Sz));
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function ccl($vi)
    {
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\x2f\x6d\157\141\163\x2f\x72\x65\x73\x74\57\x63\165\163\164\157\x6d\145\162\57\154\151\143\145\x6e\163\x65";
        $QK = MoImportExportUtility::getCustomerDetails();
        $j3 = $QK["\x63\165\x73\164\x6f\155\x65\x72\137\153\x65\x79"];
        $Gc = $QK["\141\160\151\137\153\145\171"];
        $t0 = '';
        $t0 = array("\143\x75\163\164\157\155\145\162\x49\144" => $j3, "\141\160\x70\x6c\151\143\141\x74\x69\157\x6e\x4e\x61\155\x65" => $vi);
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function update_status()
    {
        $Ch = MoImportExportUtility::getHostname();
        $rH = $Ch . "\57\x6d\157\x61\x73\57\x61\x70\151\x2f\x62\x61\x63\x6b\x75\160\143\157\144\x65\x2f\x75\160\144\141\x74\x65\x73\164\141\164\165\163";
        $QK = MoImportExportUtility::getCustomerDetails();
        $j3 = $QK["\143\x75\163\164\x6f\155\145\x72\x5f\x6b\145\x79"];
        $Gc = $QK["\x61\x70\x69\137\153\145\171"];
        $X4 = $QK["\163\155\154\x5f\x6c\x6b"];
        $Vb = MoImportExportUtility::decrypt($X4);
        $t0 = array("\x63\157\144\x65" => $Vb, "\143\x75\163\x74\x6f\155\x65\x72\x4b\145\x79" => $j3);
        $gH = json_encode($t0);
        return self::curl_call($rH, $gH);
    }
    function curl_call($rH, $gH)
    {
        $qi = curl_init($rH);
        $QK = MoImportExportUtility::getCustomerDetails();
        $j3 = isset($QK["\143\165\x73\164\157\x6d\145\x72\137\x6b\x65\x79"]) ? $QK["\143\x75\163\x74\157\x6d\145\162\137\153\x65\171"] : $this->defaultCustomerKey;
        $Gc = isset($QK["\141\x70\x69\137\153\145\171"]) ? $QK["\141\x70\x69\x5f\153\x65\x79"] : $this->defaultApiKey;
        $iG = round(microtime(true) * 1000);
        $EM = $j3 . number_format($iG, 0, '', '') . $Gc;
        $im = hash("\x73\x68\x61\65\x31\x32", $EM);
        $uK = "\103\165\x73\x74\157\x6d\145\x72\55\113\x65\x79\72\40" . $j3;
        $ys = "\124\x69\155\145\163\x74\x61\x6d\160\x3a\40" . number_format($iG, 0, '', '');
        $XC = "\x41\x75\x74\x68\157\162\151\x7a\141\164\151\x6f\156\x3a\40" . $im;
        curl_setopt($qi, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($qi, CURLOPT_ENCODING, '');
        curl_setopt($qi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($qi, CURLOPT_AUTOREFERER, true);
        curl_setopt($qi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($qi, CURLOPT_MAXREDIRS, 10);
        curl_setopt($qi, CURLOPT_HTTPHEADER, array("\x43\157\156\164\x65\156\x74\55\124\x79\x70\145\x3a\40\141\160\160\154\x69\x63\141\x74\x69\x6f\x6e\x2f\152\x73\x6f\156", $uK, $ys, $XC));
        curl_setopt($qi, CURLOPT_POST, true);
        curl_setopt($qi, CURLOPT_POSTFIELDS, $gH);
        $mF = curl_exec($qi);
        if (!curl_errno($qi)) {
            goto Bg;
        }
        echo "\x52\x65\161\165\x65\x73\164\x20\x45\162\x72\157\x72\72" . curl_error($qi);
        exit;
        Bg:
        curl_close($qi);
        return $mF;
    }
}
