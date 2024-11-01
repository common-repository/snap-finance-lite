<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              snap_finance.com
 * @since             1.0.3
 * @package           Woocommerce_Gateway_Snap_Finance_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       Snap Finance Lite
 * Plugin URI:        http://snapfinance.com/
 * Description:       No credit needed. Financing up to $3,000. Easy to apply. Get fast, flexible financing for the things you need.
 * Version:           1.0.3
 * Author:            Snap Finance
 * Author URI:        http://snapfinance.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       snap-finance-lite
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define('Woocommerce_Gateway_Snap_Finance_Lite_VERSION', '1.0.2');
/*
 * This action hook registers our PHP class as a WooCommerce payment gateway
 */
add_filter('woocommerce_payment_gateways', 'snap_finance_lite_add_gateway_class');

function snap_finance_lite_add_gateway_class($gateways) {
    $gateways[] = 'WC_Snap_Finance_Lite_Gateway'; // your class name is here
    return $gateways;
}
/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
$activated = true;
if ( function_exists( 'is_multisite' ) && is_multisite() ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		$activated = false;
	}
} else {
	if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		$activated = false;
	}
}
/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
if ( $activated ) { 
	add_action( 'plugins_loaded', 'snap_finance_lite_init_gateway_class' );
} else {	
	if ( !function_exists( 'deactivate_plugins' ) ) { 
		require_once ABSPATH . '/wp-admin/includes/plugin.php'; 
	} 
	deactivate_plugins( plugin_basename( __FILE__ ) );
	add_action( 'admin_notices', 'snap_finance_lite_error_notice' );
}

function snap_finance_lite_error_notice() {
	?>
	<div class="error notice is-dismissible">
		<p><?php _e( 'Woocommerce is not activated, Please activate Woocommerce first to install Snap Finance Lite.', 'snap-finance-lite' ); ?></p>
	</div>
	<style>
		#message{display:none;}
	</style>
	<?php
}
function snap_finance_lite_init_gateway_class() {
	add_action( 'init', 'snap_finance_lite_load_textdomain' );
    include 'snap-finance-lite-front-side.php';
    include 'snap-finance-lite-class.php';
}

function snap_finance_lite_load_textdomain() {
	load_plugin_textdomain( 'snap-finance-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}