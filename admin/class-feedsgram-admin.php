<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.luziarte.dev
 * @since      1.0.0
 *
 * @package    Feedsgram
 * @subpackage Feedsgram/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Feedsgram
 * @subpackage Feedsgram/admin
 * @author     José Luziarte <joseyesfox@gmail.com>
 */
class Feedsgram_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Feedsgram_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Feedsgram_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/feedsgram-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Feedsgram_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Feedsgram_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/feedsgram-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * This function register a option page in admin menu
	 */
	
	public function feedsgram_admin_menu() {
	
		$page_title = 'FeedsGram';
		$menu_title = 'FeedsGram';
		$capability = 'manage_options';
		$menu_slug = 'options_page_feedsgram';
		$function = array( $this, 'feedsgram_settings_page');
		$icon_url = plugin_dir_url(__FILE__) . 'img/instagram.svg';
		$position = 30;
	
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

	}

	public function feedsgram_settings_page(){
		require_once plugin_dir_path( __FILE__ ) . 'partials/fg-option-render.php';
	}

	/**
	 * Void
	 */
	public function feedsgram_register_settings() {
		
		register_setting( 'fg_settings_group', 'fg_url_profile' );

		add_settings_section(
			'fg_settings',
			'Home Settings',
			array( $this, 'fg_settings_section' ),
			'fg_settings_group'
		);
		
		add_settings_field(
			'fg_url_profile',
			'Url do perfil',
			array( $this, 'fg_url_profile_callback' ),
			'fg_settings_group',
			'fg_settings'
		);

		
	}

	public function fg_settings_section( $args ) {
		echo apply_filters( 'the_title', $args['title'] . '' );
	}

	public function fg_url_profile_callback( $args ) {

		$this->fg_options_field_text_render( 'fg_url_profile', 'fg-feedsgram', 'Target', '_blank' );

	}

	public function fg_options_field_text_render( $option, $class_prefix, $field_name = '', $default = '', $field_type = 'text' ) {
		$value = get_option( $option, false );
		$value = ! $value ? $default : $value;
		require plugin_dir_path( __FILE__ ) . 'partials/text-field.php';
	}

}
