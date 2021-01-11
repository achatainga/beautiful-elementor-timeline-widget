<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/achatainga
 * @since             1.0.0
 * @package           Beautiful_Elementor_Timeline_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Beautiful Elementor Timeline Widget
 * Plugin URI:        https://github.com/achatainga/beautiful-elementor-timeline-widget
 * Description:       This is a custom beautiful elementor timeline widget plugin designed to be displayed beautifully on your site
 * Version:           1.0.0
 * Author:            Alejandro Chataing
 * Author URI:        https://github.com/achatainga
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       beautiful-elementor-timeline-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BEAUTIFUL_ELEMENTOR_TIMELINE_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-beautiful-elementor-timeline-widget-activator.php
 */
function activate_beautiful_elementor_timeline_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-beautiful-elementor-timeline-widget-activator.php';
	Beautiful_Elementor_Timeline_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-beautiful-elementor-timeline-widget-deactivator.php
 */
function deactivate_beautiful_elementor_timeline_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-beautiful-elementor-timeline-widget-deactivator.php';
	Beautiful_Elementor_Timeline_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_beautiful_elementor_timeline_widget' );
register_deactivation_hook( __FILE__, 'deactivate_beautiful_elementor_timeline_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-beautiful-elementor-timeline-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_beautiful_elementor_timeline_widget() {

	$plugin = new Beautiful_Elementor_Timeline_Widget();
	$plugin->run();

}
run_beautiful_elementor_timeline_widget();

require_once plugin_dir_path( __FILE__ ) . 'includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'beautiful_elementor_timeline_widget_register_required_plugins' );
function beautiful_elementor_timeline_widget_register_required_plugins() {
	$plugins = array(
		array(
			'name'        		=> 'SCSS-Library',
			'slug'        		=> 'scss-library',
			'required'			=> true,
			'force_activation'	=> true
		),
		array(
			'name'        	=> 'Elementor',
			'slug'			=> 'elementor',
			'required'		=> true
		),

	);
	$config = array(
		'id'           => 'beautiful_elementor_timeline_widget',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'beautiful-elementor-timeline-widget-required-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

require_once plugin_dir_path( __FILE__ ) . 'admin/class-beautiful-elementor-timeline-widget-register-elements.php';