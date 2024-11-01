<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Shadow
$shadow = array(
    'id'     => 'waiteraid-shadow',
    'name'   => 'param[shadow]',
    'type'   => 'select',
    'val'    => $this->button_options['shadow'],
    'option' => array(
        'none'   => esc_attr__( 'None', $this->plugin_name ),
        'outset' => esc_attr__( 'Outset', $this->plugin_name ),
        'inset'  => esc_attr__( 'Inset', $this->plugin_name ),
    ),
    'func'   => 'waiteraid_shadowblock();',
);

$shadow_help = array(
    'title' => esc_attr__( 'Set the box shadow of the button.', $this->plugin_name ),
    'ul'    => array(
        esc_attr__( 'None - no shadow is displayed', $this->plugin_name ),
        esc_attr__( 'Outset - outer shadow', $this->plugin_name ),
        esc_attr__( 'Inset - inner shadow', $this->plugin_name ),
    ),
);

// Shadow Horizontal Position
$shadow_h_offset = array(
    'id'     => 'waiteraid-shadow-h-offset',
    'name'   => 'param[shadow_h_offset]',
    'type'   => 'number',
    'val'    => $this->button_options['shadow_h_offset'],
    'option' => array(
        'min'         => '-50',
        'max'         => '50',
        'step'        => '1',
        'placeholder' => '0',
    ),
);

$shadow_h_offset_help = array(
    'text' => esc_attr__( 'The horizontal offset of the shadow, in px. A positive value puts the shadow on the right side of the box, a negative value puts the shadow on the left side of the box.',
        $this->plugin_name ),
);

// Shadow Vertical Position
$shadow_v_offset = array(
    'id'     => 'waiteraid-shadow-v-offset',
    'name'   => 'param[shadow_v_offset]',
    'type'   => 'number',
    'val'    => $this->button_options['shadow_v_offset'],
    'option' => array(
        'min'         => '-50',
        'max'         => '50',
        'step'        => '1',
        'placeholder' => '0',
    ),
);

$shadow_v_offset_help = array(
    'text' => esc_attr__( 'The vertical offset of the shadow, in px. A positive value puts the shadow below the box, a negative value puts the shadow above the box.',
        $this->plugin_name ),
);

// Shadow Blur Radius
$shadow_blur = array(
    'id'     => 'waiteraid-shadow-blur',
    'name'   => 'param[shadow_blur]',
    'type'   => 'number',
    'val'    => $this->button_options['shadow_blur'],
    'option' => array(
        'min'         => '0',
        'max'         => '100',
        'step'        => '1',
        'placeholder' => '0',
    ),
);

$shadow_blur_help = array(
    'text' => esc_attr__( 'The blur radius. The higher the number, the more blurred the shadow will be.',
        $this->plugin_name ),
);

// Shadow Spread
$shadow_spread = array(
    'id'     => 'waiteraid-shadow-spread',
    'name'   => 'param[shadow_spread]',
    'type'   => 'number',
    'val'    => $this->button_options['shadow_spread'],
    'option' => array(
        'min'         => '-100',
        'max'         => '100',
        'step'        => '1',
        'placeholder' => '0',
    ),
);

$shadow_spread_help = array(
    'text' => esc_attr__( 'The spread radius. A positive value increases the size of the shadow, a negative value decreases the size of the shadow.',
        $this->plugin_name ),
);

// Shadow Color
$shadow_color = array(
    'id'     => 'waiteraid-shadow-color',
    'name'   => 'param[shadow_color]',
    'type'   => 'color',
    'val'    => $this->button_options['shadow_color'],
    'option' => array(
        'placeholder' => '#020202',
    ),
);

$shadow_color_help = array(
    'text' => esc_attr__( 'The color of the shadow.', $this->plugin_name ),
);
?>
<fieldset>
    <legend><?php esc_html_e( 'Shadow Settings', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-shadow"><?php esc_html_e( 'Shadow', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $shadow ); ?>
        </div>
        <div class="element waiteraid-shadow">
            <label for="waiteraid-shadow-h-offset"><?php esc_html_e( 'Horizontal Position', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_h_offset_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $shadow_h_offset ); ?>
        </div>
        <div class="element waiteraid-shadow">
            <label for="waiteraid-shadow-v-offset"><?php esc_html_e( 'Vertical Position', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_v_offset_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $shadow_v_offset ); ?>
        </div>
    </div>

    <div class="waiteraid-shadow-block">
        <div class="container">
            <div class="element">
                <label for="waiteraid-shadow-blur"><?php esc_html_e( 'Blur', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_blur_help ); ?>
                <br/>
                <?php echo self::waiteraid_admin_option( $shadow_blur ); ?>
            </div>
            <div class="element">
                <label for="waiteraid-shadow-spread"><?php esc_html_e( 'Spread', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_spread_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $shadow_spread ); ?>
            </div>
            <div class="element">
                <label for="waiteraid-shadow-color"><?php esc_html_e( 'Color', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $shadow_color_help ); ?>
                <br/>
                <?php echo self::waiteraid_admin_option( $shadow_color ); ?>
            </div>
        </div>
    </div>
</fieldset>
<?php
