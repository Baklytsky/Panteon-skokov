<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'understrap-lightbox.min', get_template_directory_uri() . '/css/lightbox.min.css', array(), null);

		wp_deregister_script('jquery');
		wp_register_script('jquery', ('https://code.jquery.com/jquery-3.3.1.slim.min.js'), false, null);
		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		wp_enqueue_script( 'understrap-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), null, true );
		wp_enqueue_script( 'understrap-masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js', array(), null, true );
		wp_enqueue_script( 'understrap-custom', get_template_directory_uri() . '/js/custom.js', array(), 1.0, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
