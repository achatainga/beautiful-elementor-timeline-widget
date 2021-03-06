<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/achatainga
 * @since      1.0.0
 *
 * @package    Beautiful_Elementor_Timeline_Widget
 * @subpackage Beautiful_Elementor_Timeline_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Beautiful_Elementor_Timeline_Widget
 * @subpackage Beautiful_Elementor_Timeline_Widget/public
 * @author     Alejandro Chataing <a.chataing.a@gmail.com>
 */
class Beautiful_Elementor_Timeline_Widget_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Beautiful_Elementor_Timeline_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Beautiful_Elementor_Timeline_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'googlefont_css', 'https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400' );
		wp_enqueue_style( 'normalize_css', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/beautiful-elementor-timeline-widget-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Beautiful_Elementor_Timeline_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Beautiful_Elementor_Timeline_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/beautiful-elementor-timeline-widget-public.js', array( 'jquery' ), $this->version, false );

	}

}
