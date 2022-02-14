<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.venraybeweegt.nl
 * @since      1.0.0
 *
 * @package    Venraybeweegt_Meedoen
 * @subpackage Venraybeweegt_Meedoen/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Venraybeweegt_Meedoen
 * @subpackage Venraybeweegt_Meedoen/admin
 * @author     Maik Rutten <maik@ecologium.nl>
 */
class Venraybeweegt_Meedoen_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $vb_options_name    The ID of this plugin.
	 */
	private $vb_options_name;

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
	 * @param      string    $vb_options_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $vb_options_name, $version ) {

		$this->vb_options_name = $vb_options_name;
		$this->version = $version;

	add_action('admin_init', array( $this, 'registerAndBuildFields' ));
	}

	public function test_callback() {
		return 'test_val';
	}

	public function registerAndBuildFields() {
		add_settings_field('test_input_field', 'test_label', array( $this, 'test_callback'), 'general');
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
		 * defined in Venraybeweegt_Meedoen_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Venraybeweegt_Meedoen_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->vb_options_name, plugin_dir_url( __FILE__ ) . 'css/venraybeweegt-meedoen-admin.css', array(), $this->version, 'all' );

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
		 * defined in Venraybeweegt_Meedoen_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Venraybeweegt_Meedoen_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_script( $this->vb_options_name, plugin_dir_url( __FILE__ ) . 'js/venraybeweegt-meedoen-admin.js', array( 'jquery' ), $this->version, false );
	
	}
    
	public function add_plugin_admin_menu() {
		/**
		 * Add a settings page for this plugin to the Settings menu.
		 * 
		 * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $funtion);
		 * 
		 */
		add_submenu_page( 'options-general.php', 'Plugin settings page title', 'Venray Beweegt', 'manage_options', $this->vb_options_name, array($this, 'display_plugin_setup_page') );
	
		add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
	}

	public function addPluginAdminMenu() {
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page( $this->vb_options_name, 'Plugin Name', 'administrator', $this->vb_options_name, array( $this, 'displayPluginAdminDashboard' ), 'dashicons-chart-area', 26);
		//add_submenu_page( '$parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function ');
		add_submenu_page( $this->vb_options_name, 'Plugin Name Settings', 'Settings', 'administrator', $this->vb_options_name.'-settings', array( $this, 'displayPluginAdminSettings' ));
	}

	public function displayPluginAdminDashboard() {
		require_once 'partials'.$this->vb_options_name.'-admin-display.php';
	}

	public function displayPluginAdminSettings() {
		// set this var to be used in the settings-display view
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general';
		if(isset($_GET['error_message'])){
			add_action('admin_notices', array($this, 'pluginNameSettingsMessages'));
			do_action( 'admin_notices', $_GET['error_message'] ); 				
		}
		require_once 'partials/'.$this->vb_options_name.'-admin-settings-display.php';
	}   

	public function pluginNameSettingsMessages($error_message){
		switch ($error_message) {
			case '1':
				$message = __( 'There was an error adding this setting. Please try again.', 'my-text-domain' );
				$err_code = esc_attr( 'vb_options_name_example_setting' );
				$setting_field = 'vb_options_name_example_setting';
				break;
		}
		$type = 'error';
		add_settings_error(
			$setting_field,
			$err_code,
			$message,
			$type
		);
	}

	/**
	 * Add settings action link to the plugin page
	 * 
	 * @since 1.0.0
	 */
	public function add_action_links( $links ) {
		/**
		 * The "plugins.php" must watch with the previously added add_submenu_page first option.
		 * For custom post type you have to change 'plugins.php?page=' to 'edit.php?post_type=your_custom_post_type&page='
		 */
		$settings_link = array( '<a href="' . admin_url( 'plugins.php?page=' . $this->vb_options_name ) . '">' . __( 'Settings', $this->vb_options_name ) . '</a>', );
	
		// -- OR --

		// $settings_link = array('<a href="' . admin_url( 'options-general.php?page=' . $this->vb_options_name ) . '">' . __( 'Settings', $this->vb_options_name ) . '</a>', );

		return array_merge( $settings_link, $links );
	}

	/**
	 * Render the settings page for this plugin.
	 * 
	 * @since 1.0.0
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/' . $this->vb_options_name . '-admin-display.php' );
	
	}

	/**
	 * Validate fields from admin area plugin settings form ('exopite-lazy-load-xt-admin-display.php')
	 * @param mixed $input as field form settings form
	 * @return mixed as validated fields 
	 */
	public function validate($input) {
	
		// $valid = array();
	
		// $valid['example_checkbox'] = ( isset( $input['example_checkbox'] ) && ! empty( $input['example_checkbox'] ) ) ? 1 : 0;
		// $valid['example_text'] = ( isset( $input['example_text'] ) && ! empty( $input['example_text'] ) ) ? esc_attr( $input['example_text'] ) : 'default';
		// $example_textarea ['example_textarea'] = ( isset( $input['example_textarea'] ) && ! empty( $input['example_textarea'] ) ) ? sanitize_textarea_field( $input['example_textarea'] ) : 'default';
		//valid['example_select'] = ( isset($input['example_select'] ) && ! empty( $input['example_select'] ) ) ? esc_attr($input['example_select']) : 1;
	
		// return $valid
	
		// -- OR --
	
		$options = get_option( $this->vb_options_name );
	
		$options['example_checkbox'] = ( isset( $input['example_checkbox'] ) && ! empty( $input['example_checkbox'] ) ) ? 1 : 0;
		$options['example_text'] = ( isset( $input['example_text'] ) && ! empty( $input['example_text'] ) ) ? esc_attr( $input['example_text'] ) : 'default';
		$options['example_textarea'] = ( isset( $input['example_textarea'] ) && ! empty( $input['example_textarea'] ) ) ? sanitize_textarea_field( $input['example_teaxtarea'] ) : 'default';
		$options['example_select'] = ( isset( $input['example_select'] ) && ! empty( $input['example_select'] ) ) ? esc_attr($input['example_select']) : 1;
	
		return $options;
	}
	
	public function options_update() {
	
		register_setting( $this->vb_options_name, $this->vb_options_name, array(
			'sanitize_callback' => array( $this, 'validate' ),
		) );
	}

}	
