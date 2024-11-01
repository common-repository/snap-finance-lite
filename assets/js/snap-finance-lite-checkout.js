jQuery(document).ready(function () {
    jQuery(document).on('click', '#place_order', function () {
        if (jQuery('#payment_method_snap_finance_lite').prop('checked')) {
            jQuery('.sfl-popup-modal').click();
            return false;
        }
    });
});