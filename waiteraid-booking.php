<?php

/**
 * @link              https://www.waiteraid.com/
 * @since             1.0
 * @package           Waiteraid_Booking
 *
 * @wordpress-plugin
 * Plugin Name:       WaiterAid Booking
 * Author URI:        https://www.waiteraid.com/
 * Description:       WaiterAid Booking
 * Version:           1.1
 * Author:            WaiterAid
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       waiteraid-booking
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 * Start at version 1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WAITERAID_BOOKING_VERSION', '1.1' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/main.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
if (!function_exists('run_waiteraid_booking')) {
    function run_waiteraid_booking() {

        $plugin = new Waiteraid_Booking( __FILE__ );
        $plugin->waiteraid_run();
    }
}

run_waiteraid_booking();
