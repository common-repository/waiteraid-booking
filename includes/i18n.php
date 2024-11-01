<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/includes
 * @author     WaiterAid <info@waiteraid.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Waiteraid_Booking_i18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0
	 */
	public function waiteraid_load_plugin_textdomain() {

		load_plugin_textdomain(
			'waiteraid-booking',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
