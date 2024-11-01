<?php
/*******  frontend side view *******/
class snap_finance_lite_front_side {
 
    /*******  Default constructor. *******/
    public function __construct() {
        $this->snap_finance_lite_setting = get_option('woocommerce_snap_finance_lite_settings');
        if ($this->snap_finance_lite_setting['enabled'] == 'yes') {
            add_action('wp_enqueue_scripts', array($this, 'snap_finance_lite_add_scripts'));
            add_action('wp_footer', array($this, 'snap_finance_lite_popup_detail'));
        }
        add_shortcode('snap_finance_lite_banner', array($this, 'snap_finance_lite_button'));
    }
    /*******  sanp-finance add styls and scripts *******/
    public function snap_finance_lite_add_scripts() {
        wp_enqueue_style('magnific-popup-style', plugins_url('assets/css/magnific-popup.css', __FILE__), false, '1.1', 'all');
        wp_enqueue_style('snap-finance-popup-style', plugins_url('assets/css/snap-finance-popup-style.css', __FILE__), false, '1.1', 'all');

        wp_enqueue_script('jquery-magnific-popup-script', plugins_url('assets/js/jquery.magnific-popup.js', __FILE__), array('jquery'), 1.1, true);
        wp_enqueue_script('snap-finance-lite-script', plugins_url('assets/js/snap-finance-lite.js', __FILE__), array('jquery'), 1.1, true);
        if (is_checkout()) {
            wp_enqueue_script('snap-finance-lite-checkout-script', plugins_url('assets/js/snap-finance-lite-checkout.js', __FILE__), array('jquery'), '1.0.0', true);
        }
    }
    /*******  sanp-finance Lite Button *******/
    public function snap_finance_lite_button() {
        ob_start();
        if ($this->snap_finance_lite_setting['enabled'] == 'yes') {
            ?>
            <div class="sfl_button_div">
                <a href="#sfl-popup-detail" class="sfl-popup-modal"><img src="<?php echo plugins_url('assets/images/', __FILE__) . $this->snap_finance_lite_setting['snap_finance_lite_banner_style']; ?>.png"/></a>
            </div>
            <?php
        }
        $output = ob_get_clean();
        return $output;
    }
    /*******  sanp-finance Lite Popup *******/
    public function snap_finance_lite_popup_detail() {
        $apply_link = '';
        if ($this->snap_finance_lite_setting['snap_finance_lite_mode'] == "stage") {
            $apply_link = 'https://apply-sandbox.snapfinance.com/steps/start?paramId='.$this->snap_finance_lite_setting['snap_finance_lite_stage_merchant_key'];
        } else {
            $apply_link = 'https://apply.snapfinance.com/steps/start?paramId='.$this->snap_finance_lite_setting['snap_finance_lite_live_merchant_key'];
        }
        ?>
        <div id="sfl-popup-detail" class="sfl-popup-detail white-popup-block mfp-hide">
            <div class="sfl-logo-img">
                <img src="<?php echo plugins_url('assets/images/', __FILE__) . $this->snap_finance_lite_setting['snap_finance_lite_logo_style']; ?>.png"/>
            </div>
            <div class="sfl-desc">
                <div class="title"><?php echo __( 'Financing in snap! Apply now and get up to $3000 to use today at checkout','snap-finance-lite'); ?></div>
                <ul>
                    <li><?php echo __('Pay over 12 months','snap-finance-lite'); ?></li>
                    <li><?php echo __('100 day payoff option','snap-finance-lite'); ?></li>
                    <li><?php echo __('Easy payments on your paydays','snap-finance-lite'); ?></li>
                </ul>
            </div>
            <div class="sfl-button">
                <a target="_blank" href="<?php echo $apply_link; ?>" class="sfl-apply-button"><?php echo __('Continue to Apply','snap-finance-lite'); ?></a>
            </div>
        </div>
        <?php
    }

}

$snap_finance_lite_front_side = new snap_finance_lite_front_side();
