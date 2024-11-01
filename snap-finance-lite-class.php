<?php
class WC_Snap_Finance_Lite_Gateway extends WC_Payment_Gateway {

    /**
     * Class constructor, more about it in Step 3
     */
    public function __construct() {

        $this->id = 'snap_finance_lite'; // payment gateway plugin ID
        $this->icon = ''; // URL of the icon that will be displayed on checkout page near your gateway name
        $this->has_fields = true; // in case you need a custom credit card form
        $this->method_title = 'Snap Finance Lite';
        $this->method_description = 'No credit needed. Financing up to $3,000. Easy to apply. Get fast, flexible financing for the things you need. Use this shortcode for show banner on your pages [snap_finance_lite_banner].'; // will be displayed on the options page
        // gateways can support subscriptions, refunds, saved payment methods,
        // but in this tutorial we begin with simple payments
        $this->supports = array(
            'products'
        );

        // Method with all the options fields
        $this->init_form_fields();

        // Load the settings.
        $this->init_settings();
        $this->title = $this->get_option('snap_finance_lite_title');
        $this->description = $this->get_option('snap_finance_lite_description');
        $this->enabled = $this->get_option('enabled');
        $this->snap_finance_lite_banner_style = $this->get_option('snap_finance_lite_banner_style');
        $this->snap_finance_lite_logo_style = $this->get_option('snap_finance_lite_logo_style');

        // This action hook saves the settings
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

        // We need custom JavaScript to obtain a token
        add_action('admin_enqueue_scripts', array($this, 'snap_finance_lite_payment_scripts'));

    }
    
    /**
     * Plugin options, we deal with it in Step 3 too
     */
    public function init_form_fields() {

        $this->form_fields = array(
            'enabled' => array(
                'title' => 'Enable/Disable',
                'label' => 'Enable Snap Finance Lite Gateway',
                'type' => 'checkbox',
                'description' => '',
                'default' => 'no'
            ),
            'snap_finance_lite_title' => array(
                'title' => 'Title',
                'type' => 'text',
                'description' => 'This controls the title which the user sees during checkout.',
                'default' => 'Snap Finance Lite',
                'desc_tip' => true,
            ),
            'snap_finance_lite_description' => array(
                'title' => 'Description',
                'type' => 'textarea',
                'description' => 'This controls the description which the user sees during checkout.',
                'default' => 'No credit needed. Financing up to $3,000. Easy to apply. Get fast, flexible financing for the things you need.',
            ),
            'snap_finance_lite_mode' => array(
                'title' => 'Mode',
                'type' => 'select',
                'options' => array('stage' => 'Sandbox', 'live' => 'Live'),
                'description' => '',
                'default' => 'stage',
            ),
            'snap_finance_lite_stage_merchant_key' => array(
                'title' => 'Sandbox Param Id',
                'type' => 'text',
                'description' => '',
                'default' => '',
            ),
            'snap_finance_lite_live_merchant_key' => array(
                'title' => 'Live Param Id',
                'type' => 'text',
                'description' => '',
                'default' => '',
            ),
            'snap_finance_lite_banner_style' => array(
                'title' => 'Banner Style',
                'type' => 'select',
                'options' => array('ecomm_enbanner01' => 'Style 1', 'ecomm_enbanner02' => 'Style 2', 'ecomm_enbanner03' => 'Style 3', 'ecomm_enbanner04' => 'Style 4',),
                'description' => '',
                'default' => 'stage',
            ),
            'snap_finance_lite_logo_style' => array(
                'title' => 'Logo Style',
                'type' => 'select',
                'options' => array('logo_btn01' => 'Logo 1', 'logo_btn02' => 'Logo 2', 'logo_btn03' => 'Logo 3', 'logo_btn04' => 'Logo 4', 'logo_btn05' => 'Logo 5'),
                'description' => '',
                'default' => 'logo_btn01',
            ),
        );
    }

    /**
     * You will need it if you want your custom credit card form, Step 4 is about it
     */
    public function payment_fields() {
    // ok, let's display some description before the payment form
        if ($this->description) {
            // display the description with <p> tags etc.
            echo wpautop(wp_kses_post($this->description));
        }
        // I will echo() the form, but you can close PHP tags and print it directly in HTML
        echo '<fieldset id="wc-' . esc_attr($this->id) . '-cc-form" class="wc-credit-card-form wc-payment-form" style="background:transparent;">';

        // Add this action hook if you want your custom payment gateway to support it
        do_action('woocommerce_credit_card_form_start', $this->id);
        ?>
        <div class="sfl_button_div">
            <a href="#sfl-popup-detail" class="sfl-popup-modal"><img src="<?php echo plugins_url('assets/images/', __FILE__) . $this->snap_finance_lite_logo_style; ?>.png"/></a>
        </div>
        <?php
        do_action('woocommerce_credit_card_form_end', $this->id);
        echo '<div class="clear"></div></fieldset>';
    }

    /*
     * Custom CSS and JS, in most cases required only when you decided to go with a custom credit card form
     */
    public function snap_finance_lite_payment_scripts() {
        wp_enqueue_script('snap-finance-lite-admin-script', plugins_url('assets/js/snap-finance-lite-admin.js', __FILE__), array('jquery'), 1.1, true);
        wp_localize_script('snap-finance-lite-admin-script', 'snap_finance_lite_url', array('image_folder' => plugins_url('assets/images', __FILE__)));
    }
    
    /*
     * Fields validation, more in Step 5
     */
    public function validate_fields() {
        wc_add_notice('Click Apply loan button.', 'error');
        return false;
    }

    /*
     * We're processing the payments here, everything about it is in Step 5
     */

    public function process_payment($order_id) {
        wc_add_notice('Connection error.', 'error');
        return;
    }

}
