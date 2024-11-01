<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 *
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/widget
 * @author     WaiterAid <info@waiteraid.com>
 */

class Waiteraid_Sidebar_Widget extends WP_Widget {

    /**
     * The instance of the Waiteraid_Booking_Public class.
     *
     * @since    1.0
     * @access   protected
     * @var      string    public_plugin    The instance of the Waiteraid_Booking_Public class.
     */
    private $public_plugin;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0
	 * @param    string    $public_plugin    The instance of the Waiteraid_Booking_Public class.
	 */
    function __construct( $public_plugin ) {

        $this->public_plugin = $public_plugin;

        parent::__construct(
            'waiteraid_sidebar_widget',
            __( 'WaiterAid Booking Button', $this->public_plugin->plugin_name ),
            array( 'description' => __( 'WaiterAid Booking Button sidebar widget to display the booking button of WaiterAid', $this->public_plugin->plugin_name ) )
        );
    }

    /**
     * Front-end of the widget
     *
     * @since    1.0
     */
    public function widget( $args, $instance ) {

        $alignment = apply_filters( 'waiteraid_button_align', $instance['waiteraid_button_align'] );

        if( empty( $alignment ) ) {
            $alignment = 'center';
        }

        echo $args['before_widget'];

        if( $this->public_plugin->button_options['data_hash'] != '' ) {
            echo '<div style="text-align:' . $alignment . ';">' . PHP_EOL;
            echo $this->public_plugin->waiteraid_button_display() . PHP_EOL;
            echo '</div>' . PHP_EOL;
        }

        echo $args['after_widget'];
    }

    /**
     * Backend form of the widget
     *
     * @since    1.0
     */
    public function form( $instance ) {

        $alignment = apply_filters( 'widget_waiteraid_button_align', $instance['waiteraid_button_align'] );

        if ( empty ( $alignment ) ) {
            $alignment = 'center';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'waiteraid_button_align' ); ?>"><?php _e( 'Button Alignment' ); ?></label>
            <br /><br />
            <select id="<?php echo $this->get_field_id( 'waiteraid_button_align' ); ?>" name="<?php echo $this->get_field_name( 'waiteraid_button_align' ); ?>">
                <option value="left"<?php echo ($alignment == 'left') ? ' selected="selected"' : ''; ?>><?php _e( 'Left', $this->public_plugin->plugin_name ) ?></option>
                <option value="center"<?php echo ($alignment == 'center') ? ' selected="selected"' : ''; ?>><?php _e( 'Center', $this->public_plugin->plugin_name ) ?></option>
                <option value="right"<?php echo ($alignment == 'right') ? ' selected="selected"' : ''; ?>><?php _e( 'Right', $this->public_plugin->plugin_name ) ?></option>
            </select>
        </p>
        <?php
    }

    /**
     * Update the widget's alignment option
     *
     * @since    1.0
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['waiteraid_button_align'] = ( ! empty( $new_instance['waiteraid_button_align'] ) ) ? $new_instance['waiteraid_button_align'] : 'center';
        return $instance;
    }
}
?>
