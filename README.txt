=== SNAP-FINANCE-LITE ===
Contributors: snapfinance
Donate link: https://developer.snapfinance.com/
Tags: Finance, Money, Tax,Loan, Purchase, Ecommerce , Sell, Short term Loan.
Requires at least: 4.5
Tested up to: 5.3.2
Stable tag: 5.1
Requires PHP: 5.6
License: GPLv2 or later
License URI - http -//www.gnu.org/licenses/gpl-2.0.html

Snap Finance’s WooCommerce checkout lite plugin offers an easy way to enable your WooCommerce powered eCommerce store to offer Lease to Buy finance options.

== Description ==

Checkout Lite provides an eCommerce merchants to offer finance option to their customers. Checkout Lite provides a quick and easy integration for merchants while keeping the customers within the purchase funnel. The Snap Finance banner on the PDP and Checkout page leads to a consumer loan application. When approved the customer will receive a virtual card to use at the checkout.

== Installation ==
Manual Installation
Unzip and copy snap-finance-lite folder from this zip and paste/upload it to <wordpress root>\wp-content\plugins folder.
Login to Wordpress admin.

Go to Plugins and Activate the plugin.

= Step 1 =
Login to WordPress Admin panel and go to Add New Plugin. Then click on Upload Plugin.

= Step 2 =
Upload Zip file (snap-finance-lite.zip) and Install plugin.

= Step 3 =
Activate Plugin.

= Step 4 =
open WooCommerce Settings 

= Step 5 =
Click on payment tab and check Snap Finance lite is available under Payment methods.

= Step 6 =
Enable Snap Finance lite plugin toggle.

= Step 7 =
Click on Snap Finance lite plugin.

= Step 8 =

* <strong>Enable/Disable</strong> - Tick to enable the module.
* <strong>Title</strong> - This is the title you can see on your checkout page for Snap option. It is not editable.
* <strong>Description</strong> - This description will display at checkout. It is not editable.
* <strong>Mode</strong> - Stage for sandbox/test operation and Live for live operation.Stage/Live Merchant Key URL – Configure Merchant Key URL for Snap Finance Lite.
* <strong>Banner Style</strong> - Select Banner style you want to get appear on your website pages / product pages etc. Refer Step 3 to integrate banner to your website
* <strong>Logo Style</strong> - There are 5 different logo style available, you can display it on checkout page.
Now click save and customer will get Snap Finance Lite option during checkout process.

= Step 9 =
<strong>ORDER COMPLETE flow:</strong>
*After completing Apply flow, you will receive a virtual card of Snap Finance.
*Navigate back to the checkout page and select any credit card payment option.
*Enter virtual card detail and place order.


== Frequently Asked Questions ==

= How to become Snap Partner? =
You need to complete application form available at https://snapfinance.com/merchant-apply/tell-us-about-you.

= How do I apply for a developer account? =
Snap deveoper program for now is open for exisitng merchants who wants to offer financing to their cusotmers at the time of checkout.
If you are an existing merchant please ask your sales reps to enable your account for ecomerce and then email devsupport@snapfinance.com with your account details and we will set up your developer account for testing in sandbox and send you the detail.If you are not an existing merchant please fill this applicaton https -//snapfinance.com/partner to be onboarded as merchant.


= How banners are generated ? =
Banners are already generated and are available with plugin you can read full documentation <a href="https://developer.snapfinance.com/woocommerce-lite/">here.</a>

= How to use banner on your wordpress website pages / post ? =
Copy short code [snap_finance_lite_banner] and paste it on your wordpress website pages or posts.

= How Merchant will check for Loan Application status ? =
Merchant has to login to https -//merchant.snapfinance.com/ to know loan application status.



== Screenshots ==
1. Enable plugin from payment tabs in woocomerce.
2. Plugin settings to enter merchat url, change mode from stage to live, banner selection and button selection.
3. Plugin Settings continue.
4. Using shortcode in backend.
5. Banner on product page after shortcode is placed.
6. Checkout page Payment method.
== Changelog ==

= 1.0 =
Intial Release.

= 1.0.1 =
Updated error handling condition which checks if woocommerce is installed or not.
Minor bug fixes.

= 1.0.2 =
Updated URL settings in plugin

= 1.0.3 =
Updated Mode names, changed from 'stage' to 'sandbox'





