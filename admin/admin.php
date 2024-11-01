<?php
/**
 * @package    Waiteraid_Booking
 * @subpackage Waiteraid_Booking/Admin
 * @author     WaiterAid <info@waiteraid.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Waiteraid_Booking_Admin {
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $button_options ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->button_options = $button_options;
	}

    /**
     * Register the plugin menu on sidebar menu in admin panel.
     *
     * @since 1.0
     */
    public function waiteraid_admin_add_menu() {
        $icon = plugin_dir_url(__FILE__) . 'img/waiteraid.png';
        add_menu_page( 'WaiterAid Booking', 'WaiterAid Booking', 'manage_options', 'waiteraid-booking', array(
            $this,
            'waiteraid_admin_main_page',
        ), 'none' );
    }

    /**
     * Include the main file
     */
    public function waiteraid_admin_main_page() {
        require_once 'partials/main.php';
    }

    /**
     * Add the link to the plugin page on Plugins page
     *
     * @param $actions
     * @param $plugin_file - the plugin main file
     *
     * @return mixed
     */
    public function waiteraid_admin_action_links( $actions, $plugin_file ) {
        if ( false === strpos( $plugin_file, plugin_basename( $this->plugin_name ) ) ) {
            return $actions;
        }
        $settings_link = '<a href="admin.php?page=' . $this->plugin_name . '">' . esc_attr__( 'Settings', $this->plugin_name ) . '</a>';
        array_unshift( $actions, $settings_link );

        return $actions;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0
     */
    public function waiteraid_admin_enqueue_styles( $hook ) {

        $admin_menu_style = plugin_dir_url( __DIR__ ) . 'assets/css/admin-menu.css';
        wp_enqueue_style( $this->plugin_name . '-admin-menu', $admin_menu_style, null, '1.1' );

        if( $hook != 'toplevel_page_waiteraid-booking' ) {
            return;
        }

        $url_admin_style = plugin_dir_url( __DIR__ ) . 'assets/css/admin-style.css';
        wp_enqueue_style( $this->plugin_name . '-admin', $url_admin_style, null, '1.1' );

        wp_enqueue_style( 'wp-color-picker' );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0
     */
    public function waiteraid_admin_enqueue_scripts( $hook ) {

        // admin menu
        $adminmenu_js = plugin_dir_url( __DIR__ ) . 'assets/js/admin-menu.js';
        wp_enqueue_script( $this->plugin_name . '-admin-menu', $adminmenu_js, array( 'jquery' ), '1.1', true );

        // gutenberg block
        global $current_screen;
        $current_screen = get_current_screen();

        if ( ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) || ( function_exists('is_gutenberg_page') && is_gutenberg_page() ) ) {
            $block_js = plugin_dir_url( __DIR__ ) . 'assets/js/admin-block.js';
            wp_enqueue_script( $this->plugin_name . '-admin-gutenberg-block', $block_js, array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ), '1.1', true );
        }

        // classical editor js
        if( is_plugin_active('classic-editor/classic-editor.php') ) {
            $classical_editor_js = plugin_dir_url( __DIR__ ) . 'assets/js/admin-classical-editor.js';
        }

        if( $hook != 'toplevel_page_waiteraid-booking' ) {
            return;
        }

        add_thickbox();

        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'jquery-ui-tooltip' );

        $url_alpha = plugin_dir_url( __DIR__ ) . 'assets/js/wp-color-picker-alpha.js';
        wp_enqueue_script( 'wp-color-picker-alpha', $url_alpha, array( 'wp-color-picker' ) );

        $url_admin_script = plugin_dir_url( __DIR__ ) . 'assets/js/admin-script.js';
        wp_enqueue_script( $this->plugin_name . '-admin', $url_admin_script, array( 'jquery-ui-tooltip', 'jquery' ), '1.1', true );

        wp_localize_script( $this->plugin_name . '-admin', 'wab_admin_errors', array(
            'success_title' => __( 'Success!', $this->plugin_name ),
            'error_title' => __( 'Error!', $this->plugin_name ),
            'unknown_error' => __( 'Unknown error.', $this->plugin_name ),
            'nonce' => __( 'Nonce error.', $this->plugin_name ),
            'permission' => __( 'Permission error.', $this->plugin_name ),
            'page' => __( 'Page error.', $this->plugin_name ),
            'data' => __( 'Data error.', $this->plugin_name ),
        ) );

        $url_preview = plugin_dir_url( __DIR__ ) . 'assets/js/preview.js';
        wp_enqueue_script( $this->plugin_name . '-preview', $url_preview, array( 'jquery' ), '1.1', true );

        // Remove annoying JQMIGRATE messages in the console
        wp_add_inline_script(
            'jquery-migrate', 'jQuery.migrateMute = true;',
            'before'
        );
    }


    /**
     * @param string|array $arg text which need show in the tooltip
     *
     * @return string tooltip for the element
     */
    static function waiteraid_admin_tooltip( $arg ) {

        $tooltip = '';
        foreach ( $arg as $key => $value ) {
            if ( $key == 'title' ) {
                $tooltip .= $value . '<p/>';
            } elseif ( $key == 'ul' ) {
                $tooltip .= '<ul>';
                $arr     = $value;
                foreach ( $arr as $val ) {
                    $tooltip .= '<li>' . $val . '</li>';
                }
                $tooltip .= '</ul>';
            } else {
                $tooltip .= $value;
            }
        }
        $tooltip = "<span class='waiteraid-help dashicons dashicons-editor-help' title='" . $tooltip . "'></span>";

        return $tooltip;
    }

    /**
     * @param array $arg parameters for creating field in the backend
     *
     * @return string field for displaying
     */
    static function waiteraid_admin_option( $arg ) {

        $id        = isset( $arg['id'] ) ? $arg['id'] : null;
        $name      = isset( $arg['name'] ) ? $arg['name'] : '';
        $type      = isset( $arg['type'] ) ? $arg['type'] : '';
        $func      = ! empty( $arg['func'] ) ? ' onchange="' . $arg['func'] . '"' : '';
        $options   = isset( $arg['option'] ) ? $arg['option'] : '';
        $val       = $arg['val'];
        $separator = isset( $arg['sep'] ) ? $arg['sep'] : '';
        $class     = isset( $arg['class'] ) ? ' class="' . $arg['class'] . '"' : '';
        $field     = '';

        if ( $type == 'radio' ) {
            // create radio fields
            $option = '';
            foreach ( $options as $key => $value ) {
                $select = ( $key == $val ) ? 'checked="checked"' : '';
                $option .= '<input name="' . $name . '" type="radio" value="' . $key . '" id="' . $id . '_' . $key . '" ' .
                           $select . $func . $class . '><label for="' . $id . '_' . $key . '"> ' . $value . '</label>' .
                           $separator;
            }
            $field = $option;
        } elseif ( $type == 'checkbox' ) {
            // create checkbox field
            $select = ! empty( $val ) ? 'checked="checked"' : '';
            $field  = '<input type="checkbox" ' . $select . $func . $class . ' id="' . $id . '" >' . $separator;
            $field  .= '<input type="hidden" name="' . $name . '" value="">';
        } elseif ( $type == 'text' || $type == 'number' || $type == 'hidden' ) {
            // create text field
            $option = '';
            if ( is_array( $options ) ) {
                foreach ( $options as $key => $value ) {
                    $option .= ' ' . $key . '="' . $value . '"';
                }
            }
            $field =
                '<input name="' . $name . '" type="' . $type . '" value="' . $val . '" id="' . $id . '"' . $func . $option .
                $class . '>' . $separator;
        } elseif ( $type == 'color' ) {
            // create color field
            $field = '<input name="' . $name . '" type="text" value="' . $val .
                     '" class="wp-color-picker-field" data-alpha="true" id="' . $id . '">' . $separator;
        } // create select field
        elseif ( $type == 'select' ) {
            $disabled = isset( $arg['disabled'] ) ? ' disabled' : '';
            $readonly = isset( $arg['readonly'] ) ? ' readonly' : '';
            $option   = '';
            foreach ( $options as $key => $value ) {
                if ( strrpos( $key, '_start' ) != false ) {
                    $option .= '<optgroup label="' . $value . '">';
                } elseif ( strrpos( $key, '_end' ) != false ) {
                    $option .= '</optgroup>';
                } else {
                    $select = ( $key == $val ) ? 'selected="selected"' : '';
                    $option .= '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
                }
            }
            $field = '<select name="' . $name . '"' . $func . $class . $disabled . $readonly . ' id="' . $id . '">';
            $field .= $option;
            $field .= '</select>' . $separator;
        } elseif ( $type == 'editor' ) {
            // create editor field
            $settings = array(
                'wpautop'       => 0,
                'textarea_name' => '' . $name . '',
                'textarea_rows' => 15,
            );
            $field    = wp_editor( $val, $id, $settings );
        } elseif ( $type == 'textarea' ) {
            // create textarea field
            $field = '<textarea name="' . $name . '" id="' . $id . '">' . $val . '</textarea>' . $separator;
        }

        return $field;
    }

    /**
     *
     * @return json object for save button action response
     */
    function waiteraid_admin_save_button_data() {

        // prepare the response
        $result = '';
        $message = '';
        $validate_result = true;
        $errors = array();

        // validation
        if ( empty( $_POST ) ) {

            $validate_result = false;
            $message = esc_attr__( 'Data error.', $this->plugin_name );
            $errors['nonce'] = true;

        } else if ( ! isset( $_POST[ $this->plugin_name . '_nonce' ] ) ) {

            $validate_result = false;
            $errors['nonce'] = true;

        } else if ( ! wp_verify_nonce( $_POST[ $this->plugin_name . '_nonce' ], $this->plugin_name . '_action' ) ) {

            $validate_result = false;
            $errors['nonce'] = true;

        } else if ( ! current_user_can( 'manage_options' ) ) {

            $validate_result = false;
            $errors['permission'] = true;

        } else if ( $_POST[ 'page' ] != $this->plugin_name ) {

            $validate_result = false;
            $errors['page'] = true;

        } else if ( ! is_array ( $_POST[ 'param' ] ) || empty( $_POST[ 'param' ] ) ) {

            $validate_result = false;
            $errors['data'] = true;

        } else if ( ! isset( $_POST[ 'page' ] ) &&  ! isset( $_POST[ 'param' ] ) ) {

            $validate_result = false;
            $errors['data'] = true;

        } else {

            // check if we have the same keys we put there
            if ( ! empty( array_diff_key( $this->button_options, $_POST[ 'param' ] ) ) ) {

                $validate_result = false;
                $errors['data'] = true;

            } else {

                $button_data = array();

                foreach( $_POST['param'] as $key => $value ) {

                    // is value empty?
                    if($value == '') {
                        if ( $key != 'button_class' && $key != 'button_id' ) {
                            $validate_result = false;
                        }
                    } else {
                        // validate & sanitize values
                        if ( preg_match( '/(background|color)/i', $key ) ) {

                            // color hex value check
                            $validate_result = ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) );
                            $value = ( $validate_result ) ? sanitize_hex_color( $value ) : null;

                        } else if ( preg_match( '/(radius|width|size|height|bottom|left|right|top|blur|offset|spread|z_index)/i', $key ) ) {

                            // integer values check
                            $validate_result = is_numeric( $value );
                            $value = ( $validate_result ) ? absint( $value ): null;

                        } else {

                            // string values check, option values first
                            switch ($key) {
                                case 'type':
                                    $validate_result = in_array($value, array( 'standard', 'floating' ) );
                                    break;
                                case 'location':
                                    $validate_result = in_array($value, array(
                                        'topLeft',
                                        'topCenter',
                                        'topRight',
                                        'bottomLeft',
                                        'bottomCenter',
                                        'bottomRight',
                                        'left',
                                        'right'
                                    ) );
                                    break;
                                case 'alignment':
                                    $validate_result = in_array($value, array(
                                        'left',
                                        'center',
                                        'right'
                                    ) );
                                    break;
                                case 'font_family':
                                    $validate_result = in_array($value, array(
                                        'inherit',
                                        'Tahoma',
                                        'Georgia',
                                        'Comic Sans MS',
                                        'Arial',
                                        'Lucida Grande',
                                        'Times New Roman'
                                    ) );
                                    break;
                                case 'font_weight':
                                    $validate_result = in_array($value, array(
                                        'normal',
                                        '100',
                                        '200',
                                        '300',
                                        '400',
                                        '500',
                                        '600',
                                        '700',
                                        '800',
                                        '900'
                                    ) );
                                    break;
                                case 'font_style':
                                    $validate_result = in_array($value, array(
                                        'normal',
                                        'italic'
                                    ) );
                                    break;
                                case 'border_style':
                                    $validate_result = in_array($value, array(
                                        'none',
                                        'solid',
                                        'dotted',
                                        'dashed',
                                        'double',
                                        'groove',
                                        'inset',
                                        'outset',
                                        'ridge'
                                    ) );
                                    break;
                                case 'shadow':
                                    $validate_result = in_array($value, array(
                                        'none',
                                        'inset',
                                        'outset'
                                    ) );
                                    break;
                                case 'data_hash':
                                    // button data has is always md5 string
                                    $validate_result = preg_match( '/^[a-f0-9]{32}$/', $value );
                                    break;
                                default:
                                    // button text left behind, with string length
                                    $validate_result = ( is_string( $value ) && strlen( $value ) < 26 );
                            }
                            $value = ( $validate_result ) ? sanitize_text_field( $value ) : null;
                        }
                    }

                    if( $validate_result ) {
                        $button_data[ $key ] = $value;
                    } else {
                        $errors[ $key ] = true;
                    }
                }
            }
        }

        if ( empty ( $errors ) ) {

            update_option( 'waiteraid_options', $button_data );

            $result = 'OK';
            $message = __( 'Button updated.', $this->plugin_name );

        } else {
            $result = 'ERROR';
        }

        $response = array(
            'status'  => $result,
            'message' => $message,
            'errors' => $errors
        );

        wp_send_json( $response );

        wp_die();
    }

    /**
     *
     * Register Gutenberg Editor Block
     */
    public function waiteraid_admin_register_gutenberg_block() {

        register_block_type( 'waiteraid/booking-button', array(
            'attributes'      => array(
                'align' => array(
                    'type' => 'string',
                    'default' => 'center'
                ),
            ),
            'editor_script'   => $this->plugin_name . '-admin-gutenberg-block',
            'render_callback' => array ( $this, 'waiteraid_admin_render_gutenberg_block' ),
        ) );
    }

    /**
     *
     * Returns the button's preview on Gutenberg Block Editor
     */
    public function waiteraid_admin_render_gutenberg_block( $attrs ) {

        $align = ( empty( $attrs['align'] ) ) ? 'center' : $attrs['align'];

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/public.php';
        $plugin_public = new Waiteraid_Booking_Public( $this->plugin_name, $this->version, $this->button_options );

        $buttonHtml = '<div style="text-align: ' . $align . ';" key="' . $this->plugin_name . '">';
        $buttonHtml .= $plugin_public->waiteraid_button_display();
        $buttonHtml .= '<div/>';

        return $buttonHtml;
    }

    public function waiteraid_admin_register_tinymce_button( $buttons ) {
       array_push( $buttons, ",", "waiteraid" );
       return $buttons;
    }

    public function waiteraid_admin_add_tinymce_plugin( $plugin_array ) {
       $plugin_array['waiteraid'] = plugin_dir_url( '' ) . $this->plugin_name . '/assets/js/admin-tinymce.js';
       return $plugin_array;
    }

    public function waiteraid_admin_tinymce_button() {

       if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
          return;
       }

       if ( get_user_option('rich_editing') == 'true' ) {
          add_filter( 'mce_external_plugins', array( $this, 'waiteraid_admin_add_tinymce_plugin' ) );
          add_filter( 'mce_buttons', array( $this, 'waiteraid_admin_register_tinymce_button' ) );
       }

    }
}
