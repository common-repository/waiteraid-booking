<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 *
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/public
 * @author     WaiterAid <info@waiteraid.com>
 */
class Waiteraid_Booking_Public {

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    public $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * The array of booking button settings.
     *
     * @since    1.0
     * @access   public
     * @var      array    $button_options    The array of booking button settings.
     */
    public $button_options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $button_options ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->button_options = $button_options;
	}

    /**
     * Register the shortcode for the button.
     *
     * @since    1.0
     */
    public function waiteraid_register_button_shortcode() {
        add_shortcode('waiteraid_booking_button', array( $this, 'waiteraid_shortcode_button_display' ) );
    }

    /**
     * Display the button shortcode.
     *
     * @since    1.0
     */
    public function waiteraid_button_display( $type = null ) {

        if ( ! is_admin() && $this->button_options['data_hash'] == '' ) return '';

        $buttonHtml = '';

        $styleArr = array();

        // build saved styles
        foreach($this->button_options as $key => $val) {
            if( $key != 'data_hash' &&
                $key != 'type' &&
                $key != 'text' &&
                preg_match('#^(alignment|button|hover|location|margin|padding|shadow)#', $key ) === 0
            ) {
                if($val == '') continue;

                $key = ($key == 'background') ? 'background-color' : $key;

                if( $key != 'z_index' && is_numeric( $val ) ) {
                    $val .= 'px';
                }

                $styleArr[] = str_replace( "_", "-", $key ) . ': ' . $val . ';';
            }
        }

        if ( $this->button_options['type'] == 'floating' ) {

            $locationStyle = 'position: fixed; ';

            switch ($this->button_options['location']) {
                case 'topLeft':
                    $locationStyle .= 'top: ' . $this->button_options['location_top'] . 'px; left: ' .  $this->button_options['location_left'] . 'px; ';
                    break;
                case 'topCenter':
                    $locationStyle .= 'top: ' . $this->button_options['location_top'] . 'px;  left: 50%; margin-right: ' .  ( ( $this->button_options['width'] / 2 ) -  $this->button_options['location_left'] ) . 'px;';
                    break;
                case 'topRight':
                    $locationStyle .= 'top: ' . $this->button_options['location_top'] . 'px; right: ' .  $this->button_options['location_right'] . 'px; ';
                    break;
                case 'bottomLeft':
                    $locationStyle .= 'bottom: ' . $this->button_options['location_bottom'] . 'px; left: ' .  $this->button_options['location_left'] . 'px; ';
                    break;
                case 'bottomCenter':
                    $locationStyle .= 'bottom: ' . $this->button_options['location_bottom'] . 'px; left: 50%; margin-right: ' .  ( ( $this->button_options['width'] / 2 ) +  $this->button_options['location_left'] ) . 'px;';
                    break;
                case 'bottomRight':
                    $locationStyle .= 'bottom: ' . $this->button_options['location_bottom'] . 'px; right: ' .  $this->button_options['location_right'] . 'px; ';
                    break;
                case 'left':
                    $locationStyle .= 'top: 50%; margin-bottom: ' . ( $this->button_options['height'] / 2 ) . 'px; left: ' . $this->button_options['location_left'] . 'px;';
                    break;
                case 'right':
                    $locationStyle .= 'top: 50%; margin-top: ' . ( $this->button_options['height'] / 2 ) . 'px; right: ' . $this->button_options['location_right'] . 'px;';
                    break;
                default:
                    // bottomRight!
                    $locationStyle .= 'bottom: ' . $this->button_options['location_bottom'] . 'px; right: ' .  $this->button_options['location_right'] . 'px; ';
            }

            if($this->button_options['z_index'] == '') {
                $locationStyle .= 'z-index: 999;';
            } else {
                $locationStyle .= 'z-index: ' . $this->button_options['z_index'] . ';';
            }

            $styleArr[] = $locationStyle;
        }

        // margins
        if ( $this->button_options['margin_top'] == 0 && $this->button_options['margin_right'] == 0 && $this->button_options['margin_bottom'] == 0 && $this->button_options['margin_left'] == 0 ) {
            $styleArr[] = 'margin: 0;';
        } else {
            $marginTop = ($this->button_options['margin_top'] == 0) ? 0 : $this->button_options['margin_top'] . 'px';
            $marginRight = ($this->button_options['margin_right'] == 0) ? 0 : $this->button_options['margin_right'] . 'px';
            $marginBottom = ($this->button_options['margin_bottom'] == 0) ? 0 : $this->button_options['margin_bottom'] . 'px';
            $marginLeft = ($this->button_options['margin_left'] == 0) ? 0 : $this->button_options['margin_left'] . 'px';

            $styleArr[] = 'margin: ' . $marginTop . ' ' . $marginRight . ' ' . $marginBottom . ' ' .  $marginLeft . ';';
        }

        // paddings
        if ( $this->button_options['padding_top'] == 0 && $this->button_options['padding_right'] == 0 && $this->button_options['padding_bottom'] == 0 && $this->button_options['padding_left'] == 0 ) {
            $styleArr[] = 'padding: 0;';
        } else {
            $paddingTop = ($this->button_options['padding_top'] == 0) ? 0 : $this->button_options['padding_top'] . 'px';
            $paddingRight = ($this->button_options['padding_right'] == 0) ? 0 : $this->button_options['padding_right'] . 'px';
            $paddingBottom = ($this->button_options['padding_bottom'] == 0) ? 0 : $this->button_options['padding_bottom'] . 'px';
            $paddingLeft = ($this->button_options['padding_left'] == 0) ? 0 : $this->button_options['padding_left'] . 'px';

            $styleArr[] = 'padding: ' . $paddingTop . ' ' . $paddingRight . ' ' . $paddingBottom . ' ' .  $paddingLeft . ';';
        }

        // standard block
        if($type == 'shortcode') {
            $buttonHtml .= '<div style="text-align: ' . $this->button_options['alignment'] . ';">';
        }

        // apply saved styles;
        $buttonHtml .= '<button style="';
        $buttonHtml .= implode ( ' ', $styleArr );
        $buttonHtml .= '"';

        // insert additonal class if any
        $buttonHtml .= ' class="waiteraid-widget';

        if ( $this->button_options['button_class'] != '' ) {
            $buttonHtml .= ' ' . $this->button_options['button_class'];
        }

        $buttonHtml .= '"';

        // insert id if any
        if ( $this->button_options['button_id'] != '' ) {
            $buttonHtml .= ' id="' . $this->button_options['button_id'] . '"';
        }

        // finalize
        $buttonHtml .= ' data-hash="' . $this->button_options['data_hash'] . '">' . $this->button_options['text'] . '</button>' . PHP_EOL;

        if($type == 'shortcode') {
            $buttonHtml .= '</div>';
        }

        return $buttonHtml;
    }

    /**
     * Display the button in "floating" style
     *
     * @since    1.0
     */
    public function waiteraid_floating_button_display() {

        $buttonHtml = '';

        if( $this->button_options['type'] == 'floating' ) {
            $buttonHtml = $this->waiteraid_button_display();
        }

        echo $buttonHtml;
    }

    /**
     * Display the button in "standard" style
     *
     * @since    1.0
     */
    public function waiteraid_shortcode_button_display() {
        $buttonHtml = '';

        if( $this->button_options['type'] == 'standard' ) {
            $buttonHtml = $this->waiteraid_button_display( 'shortcode' );
        }

        return $buttonHtml;
    }

    /**
     * Build inline style for the button
     *
     * @since    1.0
     */
    public function waiteraid_button_inline_style() {

        $buttonInlineStyleHtml = '';

        $tab_char = "\t";

        if( $this->waiteraid_button_is_displayed() || $this->button_options['type'] == 'floating' ) {
            $buttonInlineStyleHtml .= '<style>' . PHP_EOL
                                   . '.waiteraid-widget {' . PHP_EOL
                                   . $tab_char . 'text-transform: none;' . PHP_EOL
                                   . $tab_char . 'line-height: normal;' . PHP_EOL
                                   . $tab_char . 'letter-spacing: normal;' . PHP_EOL
                                   . $tab_char . 'text-decoration: none;' . PHP_EOL;

            // handle shadow
            if($this->button_options['shadow'] != 'none') {
             $buttonInlineStyleHtml .= $tab_char . 'box-shadow: ' . $this->button_options['shadow_color'] . ' ' . $this->button_options['shadow_h_offset'] . 'px ' . $this->button_options['shadow_v_offset'] . 'px ' . $this->button_options['shadow_blur'] . 'px ' . $this->button_options['shadow_spread'] . 'px !important;' . PHP_EOL;
            }

            $buttonInlineStyleHtml .='}' . PHP_EOL .  PHP_EOL
                                         . '.waiteraid-widget:focus {' . PHP_EOL
                                         . $tab_char . 'outline:0;' . PHP_EOL
                                         . $tab_char . 'text-decoration: none;' . PHP_EOL
                                         . '}' . PHP_EOL . PHP_EOL
                                         . '.waiteraid-widget:hover {' . PHP_EOL
                                         . $tab_char . 'outline:0;' . PHP_EOL
                                         . $tab_char . 'text-decoration: none;' . PHP_EOL;

            // handle hover color styling
            if( $this->button_options['color'] != $this->button_options['hover_color'] ||
                $this->button_options['background'] != $this->button_options['hover_background']
            ) {

                 if($this->button_options['color'] != $this->button_options['hover_color']) {
                     $buttonInlineStyleHtml .= $tab_char . 'color: ' . $this->button_options['hover_color'] . ' !important;' . PHP_EOL;
                 }

                 if($this->button_options['background'] != $this->button_options['hover_background']) {
                     $buttonInlineStyleHtml .= $tab_char . 'background: ' . $this->button_options['hover_background'] . ' !important;' . PHP_EOL;
                 }
            }

            $buttonInlineStyleHtml .= '}' . PHP_EOL
                                    . '</style>' . PHP_EOL;
        }

        echo $buttonInlineStyleHtml;
    }

	/**
	 * Register the JavaScript and CSS style files for the public-facing side of the site.
	 *
	 * @since    1.0
	 */
	public function waiteraid_enqueue_scripts() {
		if( $this->waiteraid_button_is_displayed() || $this->button_options['type'] == 'floating' ) {
            wp_enqueue_script( $this->plugin_name . '-public', 'https://www.bokabord.se/widget.min.js', null, false );
		}
	}

	/**
	 * Check if button is present in the page content being displayed
	 *
	 * @since    1.0
	 */
	private function waiteraid_button_is_displayed() {
        global $post;

        $button_exists = false;

        // check if Gutenberg block exists in the content
        if ( has_blocks( $post->post_content ) ) {
            $blocks = parse_blocks( $post->post_content );

            foreach($blocks as $block) {
                if ( $block['blockName'] === 'waiteraid/booking-button' ) {
                    $button_exists = true;
                    break;
                }
            }
        }

        // check if shortcode is used in the content
        if ( has_shortcode( $post->post_content, 'waiteraid_booking_button') ) {
            $button_exists = true;
        }

        // check if sidebar widget is displayed
        if ( is_active_widget( false, false, 'waiteraid_sidebar_widget', true ) ) {
            $button_exists = true;
        }

        return $button_exists;
	}

    /**
     * Register the sidebar widget
     *
     * @since    1.0
     */
    public function waiteraid_register_sidebar_widget() {

        $booking_button_html = $this->waiteraid_button_display();

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widget/widget.php';
        $waiteraid_sidebar_widget = new Waiteraid_Sidebar_Widget( $this );

        register_widget( $waiteraid_sidebar_widget );
    }
}
