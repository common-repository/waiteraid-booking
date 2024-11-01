<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
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

class Waiteraid_Booking {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0
	 * @access   protected
	 * @var      Waiteraid_Booking_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Booking button options.
	 *
	 * @since    1.0
	 * @access   public
	 * @var      array    $waiteraid_button_options    Booking button options.
	 */
	public $waiteraid_button_options;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0
	 */
	public function __construct( $plugin_file ) {

        $this->plugin_name = 'waiteraid-booking';

		if ( defined( 'WAITERAID_BOOKING_VERSION' ) ) {
			$this->version = WAITERAID_BOOKING_VERSION;
		} else {
			$this->version = '1.1';
		}

        $this->waiteraid_button_options = $this->waiteraid_register_button_options();

		$this->waiteraid_load_dependencies();
		$this->waiteraid_set_locale();
		$this->waiteraid_define_admin_hooks();
		$this->waiteraid_define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Waiteraid_Booking_Loader. Orchestrates the hooks of the plugin.
	 * - Waiteraid_Booking_i18n. Defines internationalization functionality.
	 * - Waiteraid_Booking_Admin. Defines all hooks for the admin area.
	 * - Waiteraid_Booking_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0
	 * @access   private
	 */
	private function waiteraid_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/public.php';

		$this->loader = new Waiteraid_Booking_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Waiteraid_Booking_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0
	 * @access   private
	 */
	private function waiteraid_set_locale() {

		$plugin_i18n = new Waiteraid_Booking_i18n();

		$this->loader->waiteraid_add_action( 'plugins_loaded', $plugin_i18n, 'waiteraid_load_plugin_textdomain' );

	}

	/**
	 * Register the default button settings to use in the plugin.
	 *
	 *
	 * @since    1.0
	 * @access   private
	 */
	private function waiteraid_register_button_options() {

        $waiteraid_options = get_option( 'waiteraid_options' );

        if( ! $waiteraid_options ) {
            $waiteraid_options = array(
                'alignment' => 'center',
                'background' => '#222222',
                'border_color' => '#767676',
                'border_radius' => 3,
                'border_style' => 'solid',
                'border_width' => 2,
                'button_class' => '',
                'button_id' => '',
                'color' => '#ffffff',
                'data_hash' => '',
                'font_family' => 'Arial',
                'font_size' => 14,
                'font_style' => 'normal',
                'font_weight' => 'normal',
                'height' => 45,
                'hover_background' => '#222222',
                'hover_color' => '#ffffff',
                'location' => 'bottomRight',
                'location_top' => 10,
                'location_bottom' => 10,
                'location_left' => 10,
                'location_right' => 10,
                'margin_top' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
                'margin_left' => 0,
                'padding_top' => 0,
                'padding_right' => 0,
                'padding_bottom' => 0,
                'padding_left' => 0,
                'shadow' => 'none',
                'shadow_blur' => 3,
                'shadow_color' => '#020202',
                'shadow_h_offset' => 0,
                'shadow_spread' => 0,
                'shadow_v_offset' => 0,
                'text' => 'Boka bord',
                'type' => 'floating',
                'width' => 105,
                'z_index' => 999
            );

            add_option( 'waiteraid_options', $waiteraid_options );
        }

        return $waiteraid_options;
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0
	 * @access   private
	 */
	private function waiteraid_define_admin_hooks() {

		$plugin_admin = new Waiteraid_Booking_Admin( $this->waiteraid_get_plugin_name(), $this->waiteraid_get_version(), $this->waiteraid_button_options );

		$this->loader->waiteraid_add_action( 'admin_enqueue_scripts', $plugin_admin, 'waiteraid_admin_enqueue_styles' );
		$this->loader->waiteraid_add_action( 'admin_enqueue_scripts', $plugin_admin, 'waiteraid_admin_enqueue_scripts' );

        $this->loader->waiteraid_add_action( 'init', $plugin_admin, 'waiteraid_admin_register_gutenberg_block' );
        $this->loader->waiteraid_add_action( 'init', $plugin_admin, 'waiteraid_admin_tinymce_button' );

		$this->loader->waiteraid_add_action( 'admin_menu', $plugin_admin, 'waiteraid_admin_add_menu' );
		$this->loader->waiteraid_add_filter( 'plugin_action_links', $plugin_admin, 'waiteraid_admin_action_links', 10, 2 );
		$this->loader->waiteraid_add_action( 'wp_ajax_waiteraid_save_button_data', $plugin_admin, 'waiteraid_admin_save_button_data' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0
	 * @access   private
	 */
	private function waiteraid_define_public_hooks() {

		$plugin_public = new Waiteraid_Booking_Public( $this->waiteraid_get_plugin_name(), $this->waiteraid_get_version(), $this->waiteraid_button_options );

        $this->loader->waiteraid_add_action( 'init', $plugin_public, 'waiteraid_register_button_shortcode' );
		$this->loader->waiteraid_add_action( 'wp_enqueue_scripts', $plugin_public, 'waiteraid_enqueue_scripts' );
		$this->loader->waiteraid_add_action( 'wp_body_open', $plugin_public, 'waiteraid_button_inline_style' );
        $this->loader->waiteraid_add_action( 'wp_footer', $plugin_public, 'waiteraid_floating_button_display' );

        $this->loader->waiteraid_add_action( 'widgets_init', $plugin_public, 'waiteraid_register_sidebar_widget' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0
	 */
	public function waiteraid_run() {
		$this->loader->waiteraid_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0
	 * @return    string    The name of the plugin.
	 */
	public function waiteraid_get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0
	 * @return    Waiteraid_Booking_Loader    Orchestrates the hooks of the plugin.
	 */
	public function waiteraid_get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0
	 * @return    string    The version number of the plugin.
	 */
	public function waiteraid_get_version() {
		return $this->version;
	}

}
