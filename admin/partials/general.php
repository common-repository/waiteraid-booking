<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin/Partials
 * @author     WaiterAid <info@waiteraid.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Data Hash
$data_hash = array(
	'id'     => 'waiteraid-data-hash',
	'name'   => 'param[data_hash]',
	'type'   => 'text',
	'val'    => $this->button_options['data_hash'],
	'option' => array(
		'placeholder' => 'Restaurant Code',
	),
);

// Button Text helper
$data_hash_help = array(
	'text' => esc_attr__( 'Enter the restaurant code, given by WaiterAid.', $this->plugin_name ),
);

// Button Text
$text = array(
	'id'     => 'waiteraid-text',
	'name'   => 'param[text]',
	'type'   => 'text',
	'val'    => $this->button_options['text'],
	'option' => array(
		'placeholder' => 'Button Text',
	),
);

// Button Text helper
$text_help = array(
	'text' => esc_attr__( 'Enter Text inside the button.', $this->plugin_name ),
);

// Type
$type = array(
	'id'     => 'waiteraid-type',
	'name'   => 'param[type]',
	'type'   => 'select',
	'val'    => $this->button_options['type'],
	'option' => array(
		'standard' => esc_attr__( 'Standard', $this->plugin_name ),
		'floating' => esc_attr__( 'Floating', $this->plugin_name ),
	),
	'func'   => 'waiteraid_buttontype();',
);

// Type helper
$type_help = array(
	'title' => esc_attr__( 'Select the type of button you want to use:', $this->plugin_name ),
	'ul'    => array(
		esc_attr__( '<strong>Standart</strong> - inserting a button only via shortcode into the content;', $this->plugin_name ),
		esc_attr__( '<strong>Floating</strong> - floating button on the page at a fixed position', $this->plugin_name ),
	),
);

// Location
$location = array(
	'id'     => 'waiteraid-location',
	'name'   => 'param[location]',
	'type'   => 'select',
	'val'    => $this->button_options['location'],
	'option' => array(
		'topLeft'      => esc_attr__( 'Top Left corner of the page', $this->plugin_name ),
		'topCenter'    => esc_attr__( 'Top Center edge of the page', $this->plugin_name ),
		'topRight'     => esc_attr__( 'Top Right corner of the page', $this->plugin_name ),
		'bottomLeft'   => esc_attr__( 'Bottom Left corner of the page', $this->plugin_name ),
		'bottomCenter' => esc_attr__( 'Bottom Center edge of the page', $this->plugin_name ),
		'bottomRight'  => esc_attr__( 'Bottom Right corner of the page', $this->plugin_name ),
		'left'         => esc_attr__( 'Left edge of the page', $this->plugin_name ),
		'right'        => esc_attr__( 'Right edge of the page', $this->plugin_name ),
	),
	'func'   => 'waiteraid_buttonlocation();',
);

// Location helper
$location_help = array(
	'text' => esc_attr__( 'Select the button\'s location on the screen.', $this->plugin_name ),
);

// Location Top
$location_top = array(
	'id'     => 'waiteraid-location-top',
	'name'   => 'param[location_top]',
	'type'   => 'number',
	'val'    => $this->button_options['location_top'],
	'option' => array(
		'min'         => '-500',
		'max'         => '500',
		'step'        => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_top_help = array(
	'text' => esc_attr__( 'Distance from the top edge of the screen, in px.', $this->plugin_name ),
);

// Location Bottom
$location_bottom = array(
	'id'     => 'waiteraid-location-bottom',
	'name'   => 'param[location_bottom]',
	'type'   => 'number',
	'val'    => $this->button_options['location_bottom'],
	'option' => array(
		'min'         => '-500',
		'max'         => '500',
		'step'        => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_bottom_help = array(
	'text' => esc_attr__( 'Distance from the bottom  edge of the screen, in px.', $this->plugin_name ),
);

// Location Left
$location_left = array(
	'id'     => 'waiteraid-location-left',
	'name'   => 'param[location_left]',
	'type'   => 'number',
	'val'    => $this->button_options['location_left'],
	'option' => array(
		'min'         => '-500',
		'max'         => '500',
		'step'        => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_left_help = array(
	'text' => esc_attr__( 'Distance from the left edge of the screen, in px.', $this->plugin_name ),
);

// Location Right
$location_right = array(
	'id'     => 'waiteraid-location-right',
	'name'   => 'param[location_right]',
	'type'   => 'number',
	'val'    => $this->button_options['location_right'],
	'option' => array(
		'min'         => '-500',
		'max'         => '500',
		'step'        => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_right_help = array(
	'text' => esc_attr__( 'Distance from the right edge of the screen, in px.', $this->plugin_name ),
);

// Horizontal alignment
$alignment = array(
	'id'     => 'waiteraid-alignment',
	'name'   => 'param[alignment]',
	'type'   => 'select',
	'val'    => $this->button_options['alignment'],
	'option' => array(
		'left'      => esc_attr__( 'Left', $this->plugin_name ),
		'center'    => esc_attr__( 'Center', $this->plugin_name ),
		'right'     => esc_attr__( 'Right', $this->plugin_name )
	),
	'func'   => 'waiteraid_buttonalignment();',
);

// Location Top helper
$alignment_help = array(
	'text' => esc_attr__( 'Horizontal alignment of the button inside its block.', $this->plugin_name ),
);

// Width
$width = array(
    'id'     => 'waiteraid-width',
    'name'   => 'param[width]',
    'type'   => 'number',
    'val'    => $this->button_options['width'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '105',
    )
);

// Width helper
$width_help = array(
    'text' => esc_attr__( 'Button width, in px', $this->plugin_name ),
);

// Height
$height = array(
    'id'     => 'waiteraid-height',
    'name'   => 'param[height]',
    'type'   => 'number',
    'val'    => $this->button_options['height'],
    'option' => array(
        'step'        => '1',
        'placeholder' => '105',
    )
);

// Height helper
$height_help = array(
    'text' => esc_attr__( 'Button height, in px', $this->plugin_name ),
);

// Font size
$font_size = array(
    'id'     => 'waiteraid-font-size',
    'name'   => 'param[font_size]',
    'type'   => 'number',
    'val'    => $this->button_options['font_size'],
    'option' => array(
        'min'         => '8',
        'max'         => '56',
        'step'        => '1',
        'placeholder' => '14',
    ),
);

// Font size helper
$font_size_help = array(
    'text' => esc_attr__( 'Set the font size for button, in px', $this->plugin_name ),
);

// Font Family
$font_family = array(
    'id'     => 'waiteraid-font-family',
    'name'   => 'param[font_family]',
    'type'   => 'select',
    'val'    => $this->button_options['font_family'],
    'option' => array(
        'inherit'         => esc_attr__( 'Use Your Themes', $this->plugin_name ),
        'Tahoma'          => 'Tahoma',
        'Georgia'         => 'Georgia',
        'Comic Sans MS'   => 'Comic Sans MS',
        'Arial'           => 'Arial',
        'Lucida Grande'   => 'Lucida Grande',
        'Times New Roman' => 'Times New Roman',
    ),
);

// Font Weight
$font_weight = array(
    'id'     => 'waiteraid-font-weight',
    'name'   => 'param[font_weight]',
    'type'   => 'select',
    'val'    => $this->button_options['font_weight'],
    'option' => array(
        'normal' => 'Normal',
        '100'    => '100',
        '200'    => '200',
        '300'    => '300',
        '400'    => '400',
        '500'    => '500',
        '600'    => '600',
        '700'    => '700',
        '800'    => '800',
        '900'    => '900',
    ),
);

// Font Style
$font_style = array(
    'id'     => 'waiteraid-font-style',
    'name'   => 'param[font_style]',
    'type'   => 'select',
    'val'    => $this->button_options['font_style'],
    'option' => array(
        'normal' => 'Normal',
        'italic' => 'Italic',
    ),
);
?>
<a class="thickbox" style="display: none;"></a>
<div id="wabModalContent" style="display:none;"></div>

<fieldset>
    <legend><?php esc_html_e( 'General Settings', $this->plugin_name ); ?></legend>

    <div class="waiteraid-button-text">
        <div class="container">
            <div class="element">
                <label for="waiteraid-data-hash"><?php esc_html_e( 'Restaurant Code', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $data_hash_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $data_hash ); ?><br />
                <span style="font-size: small; display: block; margin-top: 5px;"><?php echo $data_hash_help['text']; ?></span>
            </div>
            <div class="element">
            </div>
            <div class="element">
            </div>
        </div>
    </div>

    <div class="waiteraid-button-text">
        <div class="container">
            <div class="element">
                <label for="waiteraid-text"><?php esc_html_e( 'Button Text', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $text_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $text ); ?>
            </div>
            <div class="element">
                <label for="waiteraid-type"><?php esc_html_e( 'Type', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $type_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $type ); ?>
            </div>
            <div class="element">
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="waiteraid-button-location">
    <legend><?php esc_html_e( 'Location', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-location"><?php esc_html_e( 'Location', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $location_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $location ); ?>
        </div>
        <div class="element top-bottom">
            <div id="lg-top">
                <label for="waiteraid-location-top"><?php esc_html_e( 'Top', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $location_top_help ); ?>
                <br/>
                <?php echo self::waiteraid_admin_option( $location_top ); ?>
            </div>
            <div id="lg-bottom">
                <label for="waiteraid-location-bottom"><?php esc_html_e( 'Bottom', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $location_bottom_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $location_bottom ); ?>
            </div>
        </div>
        <div class="element left-right">
            <div id="lg-left">
                <label for="waiteraid-location-left"><?php esc_html_e( 'Left', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $location_left_help ); ?>
                <br/>
                <?php echo self::waiteraid_admin_option( $location_left ); ?>
            </div>
            <div id="lg-right">
                <label for="waiteraid-location-right"><?php esc_html_e( 'Right', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $location_right_help ); ?><br/>
                <?php echo self::waiteraid_admin_option( $location_right ); ?>
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="waiteraid-button-alignment">
    <legend><?php esc_html_e( 'Alignment', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-alignment"><?php esc_html_e( 'Alignment', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $alignment_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $alignment ); ?>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend><?php esc_html_e( 'Button Size', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-width"><?php esc_html_e( 'Width', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $width_help ); ?>
            <br/>
        <?php echo self::waiteraid_admin_option( $width ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-height"><?php esc_html_e( 'Height', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $height_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $height ); ?>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend><?php esc_html_e( 'Font', $this->plugin_name ); ?></legend>
    <div class="container">
        <div class="element">
            <label for="waiteraid-font-size"><?php esc_html_e( 'Font Size', $this->plugin_name ); ?></label><?php echo self::waiteraid_admin_tooltip( $font_size_help ); ?>
            <br/>
            <?php echo self::waiteraid_admin_option( $font_size ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-font-family"><?php esc_html_e( 'Font Family', $this->plugin_name ); ?></label><br/>
            <?php echo self::waiteraid_admin_option( $font_family ); ?>
        </div>
        <div class="element"></div>
    </div>
    <div class="container">
        <div class="element">
            <label for="waiteraid-font-weight"><?php esc_html_e( 'Font Weight', $this->plugin_name ); ?></label><br/>
            <?php echo self::waiteraid_admin_option( $font_weight ); ?>
        </div>
        <div class="element">
            <label for="waiteraid-font-style"><?php esc_html_e( 'Font Style', $this->plugin_name ); ?></label><br/>
            <?php echo self::waiteraid_admin_option( $font_style ); ?>
        </div>
        <div class="element">
        </div>
    </div>
</fieldset>
<?php

