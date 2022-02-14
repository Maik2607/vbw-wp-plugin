<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.venraybeweegt.nl
 * @since      1.0.0
 *
 * @package    Venraybeweegt_Meedoen
 * @subpackage Venraybeweegt_Meedoen/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Venraybeweegt_Meedoen
 * @subpackage Venraybeweegt_Meedoen/includes
 * @author     Maik Rutten <maik@ecologium.nl>
 */
class Venraybeweegt_Meedoen_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'venraybeweegt-meedoen',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
