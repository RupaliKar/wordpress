<?php
/**
 * Steps Dance Academy: Customizer
 *
 * @subpackage Steps Dance Academy
 * @since 1.0
 */

use WPTRT\Customize\Section\Steps_Dance_Academy_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Steps_Dance_Academy_Button::class );

	$manager->add_section(
		new Steps_Dance_Academy_Button( $manager, 'steps_dance_academy_pro', [
			'title'      => __( 'Steps Dance Academy Pro', 'steps-dance-academy' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'steps-dance-academy' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/dance-academy-wordpress-theme/', 'steps-dance-academy')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'steps-dance-academy-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'steps-dance-academy-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function steps_dance_academy_customize_register( $wp_customize ) {

	$wp_customize->add_setting('steps_dance_academy_logo_margin',array(
       'sanitize_callback'	=> 'esc_html'
    ));
    $wp_customize->add_control('steps_dance_academy_logo_margin',array(
       'label' => __('Logo Margin','steps-dance-academy'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_setting('steps_dance_academy_logo_top_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_float'
    ));
    $wp_customize->add_control('steps_dance_academy_logo_top_margin',array(
       'type' => 'number',
       'description' => __('Top','steps-dance-academy'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('steps_dance_academy_logo_bottom_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_float'
    ));
    $wp_customize->add_control('steps_dance_academy_logo_bottom_margin',array(
       'type' => 'number',
       'description' => __('Bottom','steps-dance-academy'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('steps_dance_academy_logo_left_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_float'
    ));
    $wp_customize->add_control('steps_dance_academy_logo_left_margin',array(
       'type' => 'number',
       'description' => __('Left','steps-dance-academy'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('steps_dance_academy_logo_right_margin',array(
       'default' => '',
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_float'
    ));
    $wp_customize->add_control('steps_dance_academy_logo_right_margin',array(
       'type' => 'number',
       'description' => __('Right','steps-dance-academy'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('steps_dance_academy_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_checkbox'
    ));
    $wp_customize->add_control('steps_dance_academy_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','steps-dance-academy'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('steps_dance_academy_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_checkbox'
    ));
    $wp_customize->add_control('steps_dance_academy_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','steps-dance-academy'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'steps_dance_academy_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'steps-dance-academy' ),
	    'description' => __( 'Description of what this panel does.', 'steps-dance-academy' ),
	) );

	$wp_customize->add_section( 'steps_dance_academy_theme_options_section', array(
    	'title'      => __( 'General Settings', 'steps-dance-academy' ),
		'priority'   => 30,
		'panel' => 'steps_dance_academy_panel_id'
	) );

	$wp_customize->add_setting('steps_dance_academy_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'steps_dance_academy_sanitize_choices'
	));
	$wp_customize->add_control('steps_dance_academy_theme_options',array(
        'type' => 'select',
        'label' => __('Blog Page Sidebar Layout','steps-dance-academy'),
        'section' => 'steps_dance_academy_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','steps-dance-academy'),
            'Right Sidebar' => __('Right Sidebar','steps-dance-academy'),
            'One Column' => __('One Column','steps-dance-academy'),
            'Three Columns' => __('Three Columns','steps-dance-academy'),
            'Four Columns' => __('Four Columns','steps-dance-academy'),
            'Grid Layout' => __('Grid Layout','steps-dance-academy')
        ),
	));

	$wp_customize->add_setting('steps_dance_academy_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'steps_dance_academy_sanitize_choices'
	));
	$wp_customize->add_control('steps_dance_academy_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','steps-dance-academy'),
        'section' => 'steps_dance_academy_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','steps-dance-academy'),
            'Right Sidebar' => __('Right Sidebar','steps-dance-academy'),
            'One Column' => __('One Column','steps-dance-academy')
        ),
	));

	$wp_customize->add_setting('steps_dance_academy_page_sidebar',array(
        'default' => 'One Column',
        'sanitize_callback' => 'steps_dance_academy_sanitize_choices'
	));
	$wp_customize->add_control('steps_dance_academy_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','steps-dance-academy'),
        'section' => 'steps_dance_academy_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','steps-dance-academy'),
            'Right Sidebar' => __('Right Sidebar','steps-dance-academy'),
            'One Column' => __('One Column','steps-dance-academy')
        ),
	));

	$wp_customize->add_setting('steps_dance_academy_archive_page_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'steps_dance_academy_sanitize_choices'
	));
	$wp_customize->add_control('steps_dance_academy_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','steps-dance-academy'),
        'section' => 'steps_dance_academy_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','steps-dance-academy'),
            'Right Sidebar' => __('Right Sidebar','steps-dance-academy'),
            'One Column' => __('One Column','steps-dance-academy'),
            'Three Columns' => __('Three Columns','steps-dance-academy'),
            'Four Columns' => __('Four Columns','steps-dance-academy'),
            'Grid Layout' => __('Grid Layout','steps-dance-academy')
        ),
	));

	//Bottom Header
	$wp_customize->add_section( 'steps_dance_academy_header_section' , array(
    	'title'    => __( 'Header', 'steps-dance-academy' ),
		'priority' => null,
		'panel' => 'steps_dance_academy_panel_id'
	) );

	$wp_customize->add_setting('steps_dance_academy_topheader_email',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('steps_dance_academy_topheader_email',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_header_section',
	));

	$wp_customize->add_setting('steps_dance_academy_topheader_phone_no',array(
       	'default' => '',
       	'sanitize_callback'	=> 'steps_dance_academy_sanitize_phone_number'
	));
	$wp_customize->add_control('steps_dance_academy_topheader_phone_no',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_header_section',
	));

	$wp_customize->add_setting('steps_dance_academy_topheader_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('steps_dance_academy_topheader_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_header_section',
	));

	$wp_customize->add_setting('steps_dance_academy_topheader_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('steps_dance_academy_topheader_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_header_section',
	));

	$wp_customize->add_setting('steps_dance_academy_topheader_instagram_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('steps_dance_academy_topheader_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'steps_dance_academy_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'steps-dance-academy' ),
		'priority' => null,
		'panel' => 'steps_dance_academy_panel_id'
	) );

	$wp_customize->add_setting('steps_dance_academy_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'steps_dance_academy_sanitize_checkbox'
	));
	$wp_customize->add_control('steps_dance_academy_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','steps-dance-academy'),
	   	'section' => 'steps_dance_academy_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'steps_dance_academy_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'steps_dance_academy_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'steps_dance_academy_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'steps-dance-academy' ),
			'description' => __('Image Size (1600px x 600px)', 'steps-dance-academy' ),
			'section' => 'steps_dance_academy_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Services Section
	$wp_customize->add_section('steps_dance_academy_services_section',array(
		'title'	=> __('Services Section','steps-dance-academy'),
		'description'=> __('This section will appear below the slider.','steps-dance-academy'),
		'panel' => 'steps_dance_academy_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('steps_dance_academy_services_category',array(
		'default' => 'select',
		'sanitize_callback' => 'steps_dance_academy_sanitize_choices',
	));
	$wp_customize->add_control('steps_dance_academy_services_category',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','steps-dance-academy'),
		'section' => 'steps_dance_academy_services_section',
	));

	$wp_customize->add_setting('steps_dance_academy_service_number',array(
		'default'	=> '3',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('steps_dance_academy_service_number',array(
		'label'	=> __('Number of posts to show in a category','steps-dance-academy'),
		'section' => 'steps_dance_academy_services_section',
		'type'	  => 'number'
	));

	$steps_dance_academy_service_number = get_theme_mod('steps_dance_academy_service_number', 3);
	for ($i=1; $i <= $steps_dance_academy_service_number; $i++) { 
	    $wp_customize->add_setting('steps_dance_academy_service_icon' . $i, array(
	        'default' => 'fas fa-music',
	        'sanitize_callback' => 'sanitize_text_field'
	    ));
	    $wp_customize->add_control(new Steps_Dance_Academy_Fontawesome_Icon_Chooser($wp_customize, 'steps_dance_academy_service_icon' . $i, array(
	        'section' => 'steps_dance_academy_services_section',
	        'type' => 'icon',
	        'label' => esc_html__('Service Icon ', 'steps-dance-academy') . $i
	    )));
	}

	//Footer
    $wp_customize->add_section( 'steps_dance_academy_footer', array(
    	'title'  => __( 'Footer Text', 'steps-dance-academy' ),
		'priority' => null,
		'panel' => 'steps_dance_academy_panel_id'
	) );

	$wp_customize->add_setting('steps_dance_academy_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'steps_dance_academy_sanitize_checkbox'
    ));
    $wp_customize->add_control('steps_dance_academy_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','steps-dance-academy'),
       'section' => 'steps_dance_academy_footer'
    ));

    $wp_customize->add_setting('steps_dance_academy_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('steps_dance_academy_footer_copy',array(
		'label'	=> __('Footer Text','steps-dance-academy'),
		'section' => 'steps_dance_academy_footer',
		'setting' => 'steps_dance_academy_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'steps_dance_academy_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'steps_dance_academy_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'steps_dance_academy_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'steps_dance_academy_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'steps-dance-academy' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'steps-dance-academy' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'steps_dance_academy_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'steps_dance_academy_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'steps_dance_academy_customize_register' );

function steps_dance_academy_customize_partial_blogname() {
	bloginfo( 'name' );
}

function steps_dance_academy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function steps_dance_academy_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function steps_dance_academy_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if (class_exists('WP_Customize_Control')) {

    class Steps_Dance_Academy_Fontawesome_Icon_Chooser extends WP_Customize_Control {

        public $type = 'icon';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <div class="steps-dance-academy-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="steps-dance-academy-icon-list clearfix">
                    <?php
                    $steps_dance_academy_font_awesome_icon_array = steps_dance_academy_font_awesome_icon_array();
                    foreach ($steps_dance_academy_font_awesome_icon_array as $steps_dance_academy_font_awesome_icon) {
                        $icon_class = $this->value() == $steps_dance_academy_font_awesome_icon ? 'icon-active' : '';
                        echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($steps_dance_academy_font_awesome_icon) . '"></i></li>';
                    }
                    ?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }

    }

}
function steps_dance_academy_customizer_script() {
    wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'steps_dance_academy_customizer_script' );