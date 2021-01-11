<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/achatainga
 * @since      1.0.0
 *
 * @package    Beautiful_Elementor_Timeline_Widget
 * @subpackage Beautiful_Elementor_Timeline_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Beautiful_Elementor_Timeline_Widget
 * @subpackage Beautiful_Elementor_Timeline_Widget/includes
 * @author     Alejandro Chataing <a.chataing.a@gmail.com>
 */
class Beautiful_Elementor_Timeline_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'beautiful-elementor-timeline-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
