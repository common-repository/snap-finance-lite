jQuery(document).ready(function () {
    if (jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_banner_style').size() > 0) {
        snap_change_image();
        jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_description,#woocommerce_snap_finance_lite_snap_finance_lite_title').attr('readonly',true);
        var selected = jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_mode').val();
        if (selected == "live") {
            jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_stage_merchant_key").attr('required',false).parent().parent().parent().css('display', "none");
            jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_live_merchant_key").attr('required',true);
        } else {
            jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_live_merchant_key").attr('required',false).parent().parent().parent().css('display', "none");
            jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_stage_merchant_key").attr('required',true);
        }
        jQuery(document).on('change', '#woocommerce_snap_finance_lite_snap_finance_lite_mode', function () {
            var selected = jQuery(this).val();
            if (selected == "live") {
                jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_stage_merchant_key").attr('required',false).parent().parent().parent().css('display', "none");
                jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_live_merchant_key").attr('required',true).parent().parent().parent().css('display', "");
            } else {
                jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_live_merchant_key").attr('required',false).parent().parent().parent().css('display', "none");
                jQuery("#woocommerce_snap_finance_lite_snap_finance_lite_stage_merchant_key").attr('required',true).parent().parent().parent().css('display', "");
            }
        });
    }
    jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_title').attr('required',true);
    function snap_change_image() {
        jQuery('.snap_style_image').remove();
        var banner_style = jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_banner_style').val();
        jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_banner_style').parent().after('<img style="margin-top: 10px;" class="snap_style_image" src="' + snap_finance_lite_url.image_folder + '/' + banner_style + '.png" alt="' + banner_style + '" />');
        var banner_style = jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_logo_style').val();
        jQuery('#woocommerce_snap_finance_lite_snap_finance_lite_logo_style').parent().after('<img style="margin-top: 10px;"  class="snap_style_image" src="' + snap_finance_lite_url.image_folder + '/' + banner_style + '.png" alt="' + banner_style + '" />');
    }
    jQuery(document).on('change', '#woocommerce_snap_finance_lite_snap_finance_lite_banner_style,#woocommerce_snap_finance_lite_snap_finance_lite_logo_style', function () {
        snap_change_image();
    });
});