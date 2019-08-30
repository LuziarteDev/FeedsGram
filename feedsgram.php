<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.luziarte.dev
 * @since             1.0.0
 * @package           Feedsgram
 *
 * @wordpress-plugin
 * Plugin Name:       FeedsGram
 * Plugin URI:        www.luziarte.dev
 * Description:       Simples e leve plugin para exibir feeds do Instagram
 * Version:           1.1.3
 * Author:            José Luziarte
 * Author URI:        www.luziarte.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       feedsgram
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
define( 'FEEDSGRAM_VERSION', '1.1.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-feedsgram-activator.php
 */
function activate_feedsgram() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-feedsgram-activator.php';
	Feedsgram_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-feedsgram-deactivator.php
 */
function deactivate_feedsgram() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-feedsgram-deactivator.php';
	Feedsgram_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_feedsgram' );
register_deactivation_hook( __FILE__, 'deactivate_feedsgram' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-feedsgram.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_feedsgram() {

	$plugin = new Feedsgram();
	$plugin->run();

}
run_feedsgram();
