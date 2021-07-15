<?php
/**
 * Custom header implementation
 */

function steps_dance_academy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'steps_dance_academy_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 75,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'steps_dance_academy_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'steps_dance_academy_custom_header_setup' );

if ( ! function_exists( 'steps_dance_academy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see steps_dance_academy_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'steps_dance_academy_header_style' );
function steps_dance_academy_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'steps-dance-academy-basic-style', $custom_css );
	endif;
}
endif; // steps_dance_academy_header_style