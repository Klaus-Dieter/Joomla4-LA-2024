function add_css_tab(element) {
    jQuery(".mo_nav_tab_active ").removeClass("mo_nav_tab_active").removeClass("active");
    jQuery(element).addClass("mo_nav_tab_active");
}

function moCancelForm() {
    jQuery('#cancel_form').submit();
}

function mo_login_page() {
    jQuery('#customer_login_form').submit();
}

var url = "https://login.xecurify.com/moas/login?redirectUrl=https://login.xecurify.com/moas/admin/customer/viewlicensekeys";
function click_to_view_lkey() {
    window.open(url, "_blank");
}


