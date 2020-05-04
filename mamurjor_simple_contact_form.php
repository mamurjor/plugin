<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/mamurjor/
 * @since             1.0.0
 * @package           Mamurjor_simple_contact_form
 *
 * @wordpress-plugin
 * Plugin Name:       mamurjor simple contact form
 * Plugin URI:        plugin.mamurjor.com
 * Description:       Just use this shortcode [mamurjor_contact_shorcode]
 * Version:           1.0.0
 * Author:            mamurjor
 * Author URI:        https://www.facebook.com/mamurjor/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mamurjor_simple_contact_form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MAMURJOR_SIMPLE_CONTACT_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mamurjor_simple_contact_form-activator.php
 */
function activate_mamurjor_simple_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_simple_contact_form-activator.php';
	Mamurjor_simple_contact_form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mamurjor_simple_contact_form-deactivator.php
 */
function deactivate_mamurjor_simple_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_simple_contact_form-deactivator.php';
	Mamurjor_simple_contact_form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mamurjor_simple_contact_form' );
register_deactivation_hook( __FILE__, 'deactivate_mamurjor_simple_contact_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_simple_contact_form.php';
require plugin_dir_path( __FILE__ ) . 'admin/index.php';
require plugin_dir_path( __FILE__ ) . 'admin/adminwithoutmail.php';
require plugin_dir_path( __FILE__ ) . 'admin/search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mamurjor_simple_contact_form() {

	$plugin = new Mamurjor_simple_contact_form();
	$plugin->run();

}
run_mamurjor_simple_contact_form();
