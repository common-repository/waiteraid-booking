<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Button Class
$button_class = array(
	'id'   => 'waiteraid-button-class',
	'name' => 'param[button_class]',
	'type' => 'text',
	'val'  => $this->button_options['button_class'],
);


$button_class_help = array(
	'text' => esc_attr__( 'Add extra class to the button.', $this->plugin_name ),
);

// Button ID
$button_id = array(
	'id'   => 'waiteraid-button-id',
	'name' => 'param[button_id]',
	'type' => 'text',
	'val'  => $this->button_options['button_id'],
);


$button_id_help = array(
	'text' => esc_attr__( 'Add an ID to the button.', $this->plugin_name ),
);

// Z-index
$z_index = array(
    'id'     => 'waiteraid-z-index',
    'name'   => 'param[z_index]',
    'type'   => 'number',
    'val'    => $this->button_options['z_index'],
    'option' => array(
        'min'         => '1',
        'max'         => '9999999',
        'step'        => '1',
        'placeholder' => '999',
    ),
);

// Z-index helper
$z_index_help = array(
    'text' => esc_attr__( 'The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.', $this->plugin_name ),
);

// Button Margin
$margin_top = array(
	'id'   => 'waiteraid-margin-top',
	'name' => 'param[margin_top]',
	'type' => 'number',
	'val'  => $this->button_options['margin_top'],
);


$button_margin_top_help = array(
	'text' => esc_attr__( 'Outer distance to the parent or previous element from the top edge of the button, in px.', $this->plugin_name ),
);

$margin_right = array(
	'id'   => 'waiteraid-margin-right',
	'name' => 'param[margin_right]',
	'type' => 'number',
	'val'  => $this->button_options['margin_right'],
	'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_margin_right_help = array(
	'text' => esc_attr__( 'Outer distance to the parent or previous element from the right edge of the button, in px.', $this->plugin_name ),
);

$margin_bottom = array(
	'id'   => 'waiteraid-margin-bottom',
	'name' => 'param[margin_bottom]',
	'type' => 'number',
	'val'  => $this->button_options['margin_bottom'],
	'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_margin_bottom_help = array(
	'text' => esc_attr__( 'Outer distance to the parent or previous element from the bottom edge of the button, in px.', $this->plugin_name ),
);

$margin_left = array(
	'id'   => 'waiteraid-margin-left',
	'name' => 'param[margin_left]',
	'type' => 'number',
	'val'  => $this->button_options['margin_left'],
	'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_margin_left_help = array(
	'text' => esc_attr__( 'Outer distance to the parent or previous element from the left edge of the button, in px.', $this->plugin_name ),
);

// Button padding
$padding_top = array(
	'id'   => 'waiteraid-padding-top',
	'name' => 'param[padding_top]',
	'type' => 'number',
	'val'  => $this->button_options['padding_top'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_padding_top_help = array(
	'text' => esc_attr__( 'Inner distance to the button\'s text from the top edge of the button, in px.', $this->plugin_name ),
);

$padding_right = array(
	'id'   => 'waiteraid-padding-right',
	'name' => 'param[padding_right]',
	'type' => 'number',
	'val'  => $this->button_options['padding_right'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_padding_right_help = array(
	'text' => esc_attr__( 'Inner distance to the button\'s text from the right edge of the button, in px.', $this->plugin_name ),
);

$padding_bottom = array(
	'id'   => 'waiteraid-padding-bottom',
	'name' => 'param[padding_bottom]',
	'type' => 'number',
	'val'  => $this->button_options['padding_bottom'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_padding_bottom_help = array(
	'text' => esc_attr__( 'Inner distance to the button\'s text from the bottom edge of the button, in px.', $this->plugin_name ),
);

$padding_left = array(
	'id'   => 'waiteraid-padding-left',
	'name' => 'param[padding_left]',
	'type' => 'number',
	'val'  => $this->button_options['padding_left'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '0',
    )
);

$button_padding_bottom_left = array(
	'text' => esc_attr__( 'Inner distance to the button\'s text from the left edge of the button, in px.', $this->plugin_name ),
);

?>

<fieldset class="button-misc">
    <legend><?php esc_html_e( 'Miscellaneous', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-button-class"><?php esc_html_e( 'Class', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_class_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $button_class ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-button-id"><?php esc_html_e( 'ID', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_id_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $button_id ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-z-index"><?php esc_html_e( 'Z-index', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $z_index_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $z_index ); ?>
        </div>
    </div>
</fieldset>

<fieldset class="button-margin">
    <legend><?php esc_html_e( 'Button Margin', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-margin-top"><?php esc_html_e( 'Margin Top', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_margin_top_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $margin_top ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-margin-right"><?php esc_html_e( 'Margin Right', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_margin_right_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $margin_right ); ?>
        </div>
        <div class="element"></div>
    </div>
    <div class="container">
        <div class="element">
            <label for="waiteraid-margin-bottom"><?php esc_html_e( 'Margin Bottom', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_margin_bottom_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $margin_bottom ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-margin-left"><?php esc_html_e( 'Margin Left', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_margin_left_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $margin_left ); ?>
        </div>
        <div class="element"></div>
    </div>
</fieldset>

<fieldset class="button-padding">
    <legend><?php esc_html_e( 'Button Padding', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-padding-top"><?php esc_html_e( 'Padding Top', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_padding_top_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $padding_top ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-padding-right"><?php esc_html_e( 'Padding Right', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_padding_right_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $padding_right ); ?>
        </div>
        <div class="element"></div>
    </div>
    <div class="container">
        <div class="element">
            <label for="waiteraid-padding-bottom"><?php esc_html_e( 'Padding Bottom', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_padding_bottom_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $padding_bottom ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-padding-left"><?php esc_html_e( 'Padding Left', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $button_padding_left_help ); ?><br/>
            <?php echo self::waiteraid_admin_option( $padding_left ); ?>
        </div>
        <div class="element"></div>
    </div>
</fieldset>
