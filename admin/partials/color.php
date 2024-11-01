<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Text color
$color = array(
    'id'   => 'waiteraid-color',
    'name' => 'param[color]',
    'type' => 'color',
    'val'  => $this->button_options['color'],
);

$color_help = array(
    'text' => esc_attr__( 'Specify button text color.', $this->plugin_name ),
);

// Background
$background = array(
    'id'   => 'waiteraid-background',
    'name' => 'param[background]',
    'type' => 'color',
    'val'  => $this->button_options['background'],
);

// Background helper
$background_help = array(
    'text' => esc_attr__( 'Specify button background color.', $this->plugin_name ),
);


// Hover Text color
$hover_color = array(
    'id'   => 'waiteraid-hover_color',
    'name' => 'param[hover_color]',
    'type' => 'color',
    'val'  => $this->button_options['hover_color'],
);

$hover_color_help = array(
    'text' => esc_attr__( 'Specify button text color when the mouse cursor is on the button.', $this->plugin_name ),
);

// Hover Background
$hover_background = array(
    'id'   => 'waiteraid-hover-background',
    'name' => 'param[hover_background]',
    'type' => 'color',
    'val'  => $this->button_options['hover_background'],
);

// Hover Background helper
$hover_background_help = array(
    'text' => esc_attr__( 'Specify button background color when the mouse cursor is on the button.', $this->plugin_name ),
);
?>

<fieldset>
    <legend><?php esc_html_e( 'Colour Settings', $this->plugin_name ); ?></legend>

    <div class="container">
        <div class="element">
            <label for="waiteraid-color"><?php esc_html_e( 'Color', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $color_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $color ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-background"><?php esc_html_e( 'Background', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $background_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $background ); ?>
        </div>
        <div class="element"></div>
    </div>

    <div class="container">
        <div class="element">
            <label for="waiteraid-hover-color"><?php esc_html_e( 'Hover Color', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $hover_color_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $hover_color ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-hover-background"><?php esc_html_e( 'Hover Background', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $hover_background_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $hover_background ); ?>
        </div>
        <div class="element">
        </div>
    </div>
</fieldset>
