<?php
/**
 * @link       https://www.waiteraid.com/
 * @since      1.0
 *
 * @package    Waiteraid_Booking
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'waiteraid_options' );
unregister_sidebar( 'wab_sidebar_widget' );
unregister_block_type( 'waiteraid/booking-button' );
