<?php
/**
 * Plugin Name:       WPSKI Smart Keap Integration
 * Plugin URI:        https://profiles.wordpress.org/iqbal1486/
 * Description:       WP Smart Zoho help you to manage and synch possible WordPress data like customers, orders, products to the Zoho modules as per your settings options.
 * Version:           2.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Geekerhub
 * Author URI:        https://profiles.wordpress.org/iqbal1486/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpski-smart-keap
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

define( 'WPSKI_VERSION', '1.0.0' );

if (! defined('WPSKI_ADMIN_URL') ) {
    define('WPSKI_ADMIN_URL', get_admin_url());
}

if (! defined('WPSKI_PLUGIN_FILE') ) {
    define('WPSKI_PLUGIN_FILE', __FILE__);
}

if (! defined('WPSKI_PLUGIN_PATH') ) {
    define('WPSKI_PLUGIN_PATH', plugin_dir_path(WPSKI_PLUGIN_FILE));
}

if (! defined('WPSKI_PLUGIN_URL') ) {
    define('WPSKI_PLUGIN_URL', plugin_dir_url(WPSKI_PLUGIN_FILE));
}

if (! defined('WPSKI_REDIRECT_URI') ) {
    define('WPSKI_REDIRECT_URI', admin_url( 'admin.php?page=wpski_smart_keap_process' ));
}

if (! defined('WPSKI_SETTINGS_URI') ) {
    define('WPSKI_SETTINGS_URI', admin_url( 'admin.php?page=wpski-smart-keap-integration' ));
}

if (! defined('WPSKI_KEAPAPIS_URL') ) {
    $tld = "com";
    //$wpszi_smart_zoho_settings  = get_option( 'wpszi_smart_zoho_settings' );
    //if( !empty($wpszi_smart_zoho_settings['data_center'])){
        //$tld = end(explode(".", parse_url( $wpszi_smart_zoho_settings['data_center'], PHP_URL_HOST)));
    //}
    define('WPSKI_KEAPAPIS_URL', 'https://www.keapapis.'.$tld);
}

function wpski_smart_keap_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class.activator.php';
	$WPSKI_Smart_Keap_Activator = new WPSKI_Smart_Keap_Activator();
    $WPSKI_Smart_Keap_Activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpszi-smart-zoho-deactivator.php
 */
function wpski_smart_keap_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class.deactivator.php';
    WPSKI_Smart_Keap_Deactivator::deactivate();
}


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpski-smart-keap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wpski_smart_keap_run() {
    $plugin = new WPSKI_Smart_Keap();
	$plugin->run();
}

register_activation_hook( __FILE__, 'wpski_smart_keap_activate' );
register_deactivation_hook( __FILE__, 'wpski_smart_keap_deactivate' );

wpski_smart_keap_run();

function wpski_smart_keap_textdomain_init() {
    load_plugin_textdomain( 'wpski-smart-keap', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('plugins_loaded', 'wpski_smart_keap_textdomain_init');
?>