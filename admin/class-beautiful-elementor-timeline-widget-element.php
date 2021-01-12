<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class Beautiful_Elementor_Timeline_Widget_Element extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Timeline';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Beautiful Elementor Timeline Widget', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'betw_title',
			[
				'label' => __( 'Title', 'beautiful-elementor-timeline-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'beautiful-elementor-timeline-widget' ),
				'placeholder' => __( 'Type your title here', 'beautiful-elementor-timeline-widget' ),
			]
        );

        $repeater->add_control(
			'betw_subtitle',
			[
				'label' => __( 'Subtitle', 'beautiful-elementor-timeline-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default subtitle', 'beautiful-elementor-timeline-widget' ),
				'placeholder' => __( 'Type your subtitle here', 'beautiful-elementor-timeline-widget' ),
			]
        );
        
        $repeater->add_control(
			'betw_image',
			[
				'label' => __( 'Choose Image', 'beautiful-elementor-timeline-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );

        $repeater->add_control(
			'betw_description',
			[
				'label' => __( 'Description', 'beautiful-elementor-timeline-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
                'default' => __(
                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.',
                    'beautiful-elementor-timeline-widget'
                ),
				'placeholder' => __( 'Type your description here', 'beautiful-elementor-timeline-widget' ),
			]
        );
        
        $this->add_control(
			'betw_list',
			[
				'label' => __( 'Timeline Item', 'beautiful-elementor-timeline-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
                        'betw_title' => __( 'Title #1', 'beautiful-elementor-timeline-widget' ),
                        'betw_subtitle' => __( 'Subtitle #1' ),
                        'betw_image' => plugin_dir_url( __FILE__ ) . 'images/img1.jpg',
						'betw_description' => __( 'Item content. Click the edit button to change this text.', 'beautiful-elementor-timeline-widget' ),
					],
					[
                        'betw_title' => __( 'Title #2', 'beautiful-elementor-timeline-widget' ),
                        'betw_subtitle' => __( 'Subtitle #2' ),
                        'betw_image' => plugin_dir_url( __FILE__ ) . 'images/img2.jpg',
						'betw_description' => __( 'Item content. Click the edit button to change this text.', 'beautiful-elementor-timeline-widget' ),
                    ],
                    [
                        'betw_title' => __( 'Title #3', 'beautiful-elementor-timeline-widget' ),
                        'betw_subtitle' => __( 'Subtitle #3' ),
                        'betw_image' => plugin_dir_url( __FILE__ ) . 'images/img3.jpg',
						'betw_description' => __( 'Item content. Click the edit button to change this text.', 'beautiful-elementor-timeline-widget' ),
                    ],
                    [
                        'betw_title' => __( 'Title #4', 'beautiful-elementor-timeline-widget' ),
                        'betw_subtitle' => __( 'Subtitle #4' ),
                        'betw_image' => plugin_dir_url( __FILE__ ) . 'images/img4.jpg',
						'betw_description' => __( 'Item content. Click the edit button to change this text.', 'beautiful-elementor-timeline-widget' ),
					]
				],
				'title_field' => '{{{ betw_title }}}',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();        
        echo '<section id="timeline">';
        foreach ( $settings[ 'betw_list' ] as $item ) {
            echo '<div class="tl-item">';
                
                echo '<div class="tl-bg" style="background-image: url(\'' . $item[ 'betw_image' ][ 'url' ] . '\')"></div>';
                
                echo '<div class="tl-year">';
                    echo '<p class="f2 heading--sanSerif" style="margin-block-end: 1em; margin-block-start: 1em">' . $item[ 'betw_title' ] . '</p>';
                echo '</div>';

                echo '<div class="tl-content">';
                    echo '<h1>' . $item[ 'betw_subtitle' ] . '</h1>';
                    echo '<p>' . $item[ 'betw_description' ] . '</p>';
                echo '</div>';

            echo '</div>';
        }
        echo '</section>';

	}
}
