<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 // Border Radius
$border_radius = array(
    'id'     => 'waiteraid-border-radius',
    'name'   => 'param[border_radius]',
    'type'   => 'number',
    'val'    => $this->button_options['border_radius'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '105',
    )
);

// Border Radius helper
$border_radius_help = array(
    'title' => esc_attr__( 'Set the radius of the corners of the element.', $this->plugin_name ),
    'ul'    => array(
        esc_attr__( 'any integer value, in px', $this->plugin_name ),
        esc_attr__( 'if you enter 0, the button corners will have not a radius', $this->plugin_name ),
    ),
);

// Border Style
$border_style = array(
    'id'     => 'waiteraid-border-style',
    'name'   => 'param[border_style]',
    'type'   => 'select',
    'val'    => $this->button_options['border_style'],
    'option' => array(
        'none'   => esc_attr__( 'None', $this->plugin_name ),
        'solid'  => esc_attr__( 'Solid', $this->plugin_name ),
        'dotted' => esc_attr__( 'Dotted', $this->plugin_name ),
        'dashed' => esc_attr__( 'Dashed', $this->plugin_name ),
        'double' => esc_attr__( 'Double', $this->plugin_name ),
        'groove' => esc_attr__( 'Groove', $this->plugin_name ),
        'inset'  => esc_attr__( 'Inset', $this->plugin_name ),
        'outset' => esc_attr__( 'Outset', $this->plugin_name ),
        'ridge'  => esc_attr__( 'Ridge', $this->plugin_name ),
    ),
    'func'   => 'waiteraid_border();',
);

// Border Style helper
$border_style_help = array(
    'text' => esc_attr__( 'Choose a border style for your button.', $this->plugin_name ),
);

// Border Color
$border_color = array(
    'id'     => 'waiteraid-border-color',
    'name'   => 'param[border_color]',
    'type'   => 'color',
    'val'    => $this->button_options['border_color'],
    'option' => array(
        'placeholder' => '#767676',
    ),
);

// Border Width
$border_width = array(
    'id'     => 'waiteraid-border-width',
    'name'   => 'param[border_width]',
    'type'   => 'number',
    'val'    => $this->button_options['border_width'],
    'option' => array(
        'min'         => '0',
        'max'         => '100',
        'step'        => '1',
        'placeholder' => '0',
    ),
);
?>
<fieldset>
    <legend><?php esc_html_e( 'Border', $this->plugin_name ); ?></legend>

    <div class="container">
        <div class="element">
            <label for="waiteraid-border-radius"><?php esc_html_e( 'Radius', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $border_radius_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $border_radius ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-border-style"><?php esc_html_e( 'Style', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $border_style_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $border_style ); ?>
        </div>
        <div class="element">
            <label></label><br/>
        </div>
    </div>

    <div class="container">
        <div class="element border">
            <label for="waiteraid-border-color"><?php esc_html_e( 'Color', $this->plugin_name ); ?></label><br/>
            <?php echo self::waiteraid_admin_option( $border_color ); ?>
        </div>
        <div class="element border">
            <label for="waiteraid-border-width"><?php esc_html_e( 'Thickness', $this->plugin_name ); ?></label><br/>
            <?php echo self::waiteraid_admin_option( $border_width ); ?>
        </div>
        <div class="element border">
        </div>
    </div>
</fieldset>
<?php
