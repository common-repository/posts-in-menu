<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://endif.media
 * @since             1.0
 * @package           Posts_In_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Posts In Menu
 * Plugin URI:        https://endif.media/posts-in-menu-pro
 * Description:       Add a list of posts in your sites WordPress navigation menu.
 * Version:           1.0
 * Author:            ENDif Media
 * Author URI:        https://endif.media
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       posts-in-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'POSTSINMENU_VERSION', '1.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-posts-in-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_posts_in_menu() {

	$plugin = new Posts_In_Menu();
	$plugin->run();

}
run_posts_in_menu();
