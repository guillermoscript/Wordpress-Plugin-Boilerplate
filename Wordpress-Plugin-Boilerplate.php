<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://netkiub.com
 * @since             1.0.0
 * @package           Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin
 * Plugin URI:        https://netkiub.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Guillermo
 * Author URI:        https://netkiub.com
 * GitHub Plugin URI: https://github.com/guillermoscript/wordpress-plugin-boilerplate
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// if it is a woocommerce plugin decoment this line 
// if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define('PLUGIN_BASE_PATH2', plugin_dir_path( __FILE__ ));
define('REST_API_NAMESPACE', 'wordpress-plugin-boilerplate');
define('REST_API_V1', 'v1');

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/user-name/repo-name/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('stable-branch-name');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('your-token-here');

// use Admin\Init;
use Includes\PluginActivator;
use Includes\PluginDeactivator;
use Includes\Plugin;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordpress-plugin-boilerplate-activator.php
 */
function activate_plugin() {
	// require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-plugin-boilerplate-activator.php';
	PluginActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordpress-plugin-boilerplate-deactivator.php
 */
function deactivate_plugin() {
	// require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-plugin-boilerplate-deactivator.php';
	PluginDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
// require plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-plugin-boilerplate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin() {

	$plugin = new Plugin();
	$plugin->run();

}
run_plugin();