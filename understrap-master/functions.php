<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function my_logo() {
	$output = '';
	$output .= '<a class="navbar-brand" aria-label="home" href="'.get_home_url().'">';
	$custom_logo_id = get_theme_mod('custom_logo');
	$custom_logo_attr = '';
	if ($custom_logo_id) {
		$custom_logo_attr = array(
			'class' => 'custom_logo',
		);
		$image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
		if (empty ($image_alt)) {
			$custom_logo_attr ['alt'] = get_bloginfo('name','display');
		}
	}
	$output .= wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr). '</a>';

	echo $output;
}

add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Clients', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Client', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Clients', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Client', 'client', 'understrap' ),
		'add_new_item'       => __( 'Add New Client', 'understrap' ),
		'new_item'           => __( 'New Client', 'understrap' ),
		'edit_item'          => __( 'Edit Client', 'understrap' ),
		'view_item'          => __( 'View Client', 'understrap' ),
		'all_items'          => __( 'All Clients', 'understrap' ),
		'search_items'       => __( 'Search Clients', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Clients:', 'understrap' ),
		'not_found'          => __( 'No Clients found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Clients found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our clients.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'menu_icon'			 => 'dashicons-id'
	);

	register_post_type( 'clients', $args );
}
add_action( 'init', 'codex_book_init_specialize' );
/**
 * Register a book post type.
 */
function codex_book_init_specialize() {
	$labels = array(
		'name'               => _x( 'Our Specialize', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Our Specialize', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Our Specialize', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Our Specialize', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Speciality', 'Specialize', 'understrap' ),
		'add_new_item'       => __( 'Add New Speciality', 'understrap' ),
		'new_item'           => __( 'New Speciality', 'understrap' ),
		'edit_item'          => __( 'Edit Speciality', 'understrap' ),
		'view_item'          => __( 'View Speciality', 'understrap' ),
		'all_items'          => __( 'All Specialties', 'understrap' ),
		'search_items'       => __( 'Search Speciality', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Speciality:', 'understrap' ),
		'not_found'          => __( 'No Speciality found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Speciality found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Specialize.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our_specialize' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','excerpt','thumbnail' ),
		'menu_icon'			 => 'dashicons-feedback'
	);

	register_post_type( 'Our Specialize', $args );
}

add_action( 'init', 'create_speciality_type_tax' );

function create_speciality_type_tax() {
	register_taxonomy(
		'speciality type',
		'ourspecialize',
		array(
			'label' => __( 'Speciality type', 'understrap' ),
			'rewrite' => array( 'slug' => 'speciality_type' ),
			'hierarchical' => true,
		)
	);
}

function new_excerpt_length($length) {
	return 6;
}
add_filter('excerpt_length', 'new_excerpt_length');


function new_excerpt_more($excerpt) {
	return str_replace('[...]', '', $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');

add_action( 'init', 'work_gallery' );
/**
 * Register a book post type.
 */
function work_gallery () {
	$labels = array(
		'name'               => _x( 'Our works', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Our work', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Our works', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Our works', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Photo', 'Our works', 'understrap' ),
		'add_new_item'       => __( 'Add New Photo', 'understrap' ),
		'new_item'           => __( 'New Photo', 'understrap' ),
		'edit_item'          => __( 'Edit Photo', 'understrap' ),
		'view_item'          => __( 'View Photo', 'understrap' ),
		'all_items'          => __( 'All Photos', 'understrap' ),
		'search_items'       => __( 'Search Photos', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Photos:', 'understrap' ),
		'not_found'          => __( 'No Photos found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Photos found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our works.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Our works' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','thumbnail'),
		'menu_icon'			 => 'dashicons-images-alt2'
	);

	register_post_type( 'Our works', $args );
}
add_action( 'init', 'home_slider' );
/**
 * Register a book post type.
 */
function home_slider () {
	$labels = array(
		'name'               => _x( 'Slider photos', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Slider photo', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Slider photos', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Slider photos', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Photo', 'Slider photos', 'understrap' ),
		'add_new_item'       => __( 'Add New Photo', 'understrap' ),
		'new_item'           => __( 'New Photo', 'understrap' ),
		'edit_item'          => __( 'Edit Photo', 'understrap' ),
		'view_item'          => __( 'View Photo', 'understrap' ),
		'all_items'          => __( 'All Photos', 'understrap' ),
		'search_items'       => __( 'Search Photos', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Photos:', 'understrap' ),
		'not_found'          => __( 'No Photos found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Photos found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Slider photos.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Slider photos' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','thumbnail'),
		'menu_icon'			 => 'dashicons-media-interactive'
	);

	register_post_type( 'Slider photos', $args );
}


