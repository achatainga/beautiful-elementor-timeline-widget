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

add_action( 'tgmpa_register', 'beautiful_elementor_timeline_widget_register_required_plugins' );
function beautiful_elementor_timeline_widget_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'BuddyPress',
			'slug'      => 'buddypress',
			'required'  => false,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'        => 'SCSS-Library',
			'slug'        => 'scss-library',
			'is_callable' => 'wpseo_init',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'beautiful_elementor_timeline_widget',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'beautiful-elementor-timeline-widget', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'beautiful_elementor_timeline_widget' ),
			'menu_title'                      => __( 'Install Plugins', 'beautiful_elementor_timeline_widget' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'beautiful_elementor_timeline_widget' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'beautiful_elementor_timeline_widget' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'beautiful_elementor_timeline_widget' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'beautiful_elementor_timeline_widget'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'beautiful_elementor_timeline_widget'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'beautiful_elementor_timeline_widget'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'beautiful_elementor_timeline_widget'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'beautiful_elementor_timeline_widget' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'beautiful_elementor_timeline_widget' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'beautiful_elementor_timeline_widget' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'beautiful_elementor_timeline_widget' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'beautiful_elementor_timeline_widget' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'beautiful_elementor_timeline_widget' ),
			'dismiss'                         => __( 'Dismiss this notice', 'beautiful_elementor_timeline_widget' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'beautiful_elementor_timeline_widget' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'beautiful_elementor_timeline_widget' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}