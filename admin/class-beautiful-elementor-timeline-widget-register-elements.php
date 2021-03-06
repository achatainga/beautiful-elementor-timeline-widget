<?php

class Beautiful_Elementor_Timeline_Widget_Register_elements {
    protected static $instance = null;

    public static function get_instance() {
        if( ! isset( static::$instance ) ) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct() {
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    }

    public function register_widgets() {
        require_once plugin_dir_path( __FILE__ ) . 'class-beautiful-elementor-timeline-widget-element.php';
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Beautiful_Elementor_Timeline_Widget_Element() );
    }
}

add_action( 'init', 'beautiful_elementor_timeline_widget_init' );
function beautiful_elementor_timeline_widget_init() {
    Beautiful_Elementor_Timeline_Widget_Register_elements::get_instance();
}