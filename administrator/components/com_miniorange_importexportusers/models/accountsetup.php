<?php


defined("\137\112\105\x58\x45\x43") or die("\x52\145\163\x74\162\x69\x63\x74\145\x64\40\141\143\x63\x65\163\163");
class miniorangeimportexportusersModelAccountSetup extends JModelAdmin
{
    public function getForm($sH = array(), $X_ = true)
    {
        $form = $this->loadForm("\x63\x6f\x6d\x5f\155\151\x6e\151\157\162\x61\x6e\147\x65\x5f\151\x6d\160\x6f\x72\x74\x65\x78\160\x6f\162\164\x75\163\145\162\x73\x2e\141\x63\x63\157\165\x6e\x74\163\145\x74\165\x70", "\141\143\143\x6f\x75\156\164\163\145\164\x75\x70", array("\143\157\x6e\x74\x72\157\154" => "\x6a\x66\x6f\162\x6d", "\154\x6f\x61\144\137\x64\141\164\x61" => $X_));
        if (!empty($form)) {
            goto PC;
        }
        return false;
        PC:
        return $form;
    }
}
