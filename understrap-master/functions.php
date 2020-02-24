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

add_action( 'init', 'init_our_portfolio' );
/**
 * Register a book post type.
 */
function init_our_portfolio() {
	$labels = array(
		'name'               => _x( 'Our Portfolio', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Our Portfolios', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Our Portfolios', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Our Portfolios', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Sample', 'Specialize', 'understrap' ),
		'add_new_item'       => __( 'Add New Sample', 'understrap' ),
		'new_item'           => __( 'New Sample', 'understrap' ),
		'edit_item'          => __( 'Edit Sample', 'understrap' ),
		'view_item'          => __( 'View Sample', 'understrap' ),
		'all_items'          => __( 'All Samples', 'understrap' ),
		'search_items'       => __( 'Search Sample', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Sample:', 'understrap' ),
		'not_found'          => __( 'No Sample found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Sample found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Portfolio.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our_portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'menu_icon'			 => 'dashicons-images-alt2'
	);

	register_post_type( 'Our Portfolio', $args );
}

add_action( 'init', 'create_portfolio_tax' );

function create_portfolio_tax() {
	register_taxonomy(
		'portfolio type',
		'ourportfolio',
		array(
			'label' => __( 'Portfolio type', 'understrap' ),
			'rewrite' => array( 'slug' => 'portfolio_type' ),
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'init_skills' );
/**
 * Register a book post type.
 */
function init_skills() {
	$labels = array(
		'name'               => _x( 'Our Skill', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Our Skills', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Our Skills', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Our Skills', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Skill', 'Our Skill', 'understrap' ),
		'add_new_item'       => __( 'Add New Skill', 'understrap' ),
		'new_item'           => __( 'New Skill', 'understrap' ),
		'edit_item'          => __( 'Edit Skill', 'understrap' ),
		'view_item'          => __( 'View Skill', 'understrap' ),
		'all_items'          => __( 'All Skills', 'understrap' ),
		'search_items'       => __( 'Search Skill', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Skill:', 'understrap' ),
		'not_found'          => __( 'No Skill found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Skill found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Skill.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our_skill' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'			 => 'dashicons-editor-alignleft'
	);

	register_post_type( 'Our Skill', $args );
}

add_action( 'init', 'init_team' );
/**
 * Register a book post type.
 */
function init_team() {
	$labels = array(
		'name'               => _x( 'Our Team', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Our Team', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Our Team', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Our Team', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Specialist', 'Our Team', 'understrap' ),
		'add_new_item'       => __( 'Add New Specialist', 'understrap' ),
		'new_item'           => __( 'New Specialist', 'understrap' ),
		'edit_item'          => __( 'Edit Specialist', 'understrap' ),
		'view_item'          => __( 'View Specialist', 'understrap' ),
		'all_items'          => __( 'All Specialists', 'understrap' ),
		'search_items'       => __( 'Search Specialist', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Specialist:', 'understrap' ),
		'not_found'          => __( 'No Specialist found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Specialist found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Our Team.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our_team' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'			 => 'dashicons-buddicons-buddypress-logo'
	);

	register_post_type( 'Our Team', $args );
}

class trueMetaBox {
	function __construct($options) {
		$this->options = $options;
		$this->prefix = $this->options['id'] .'_';
		add_action( 'add_meta_boxes', array( &$this, 'create' ) );
		add_action( 'save_post', array( &$this, 'save' ), 1, 2 );
	}
	function create() {
		foreach ($this->options['post'] as $post_type) {
			if (current_user_can( $this->options['cap'])) {
				add_meta_box($this->options['id'], $this->options['name'], array(&$this, 'fill'), $post_type, $this->options['pos'], $this->options['pri']);
			}
		}
	}
	function fill(){
		global $post; $p_i_d = $post->ID;
		wp_nonce_field( $this->options['id'], $this->options['id'].'_wpnonce', false, true );
		?>
		<table class="form-table"><tbody><?php
		foreach ( $this->options['args'] as $param ) {
			if (current_user_can( $param['cap'])) {
				?><tr><?php
				if(!$value = get_post_meta($post->ID, $this->prefix .$param['id'] , true)) $value = $param['std'];
				switch ( $param['type'] ) {
					case 'text':{ ?>
						<th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
						<td>
							<input name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>" value="<?php echo $value ?>" placeholder="<?php echo $param['placeholder'] ?>" class="regular-text" /><br />
							<span class="description"><?php echo $param['desc'] ?></span>
						</td>
						<?php
						break;
					}
					case 'textarea':{ ?>
						<th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
						<td>
							<textarea name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>" value="<?php echo $value ?>" placeholder="<?php echo $param['placeholder'] ?>" class="large-text" /><?php echo $value ?></textarea><br />
							<span class="description"><?php echo $param['desc'] ?></span>
						</td>
						<?php
						break;
					}
					case 'checkbox':{ ?>
						<th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
						<td>
							<label for="<?php echo $this->prefix .$param['id'] ?>"><input name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>"<?php echo ($value=='on') ? ' checked="checked"' : '' ?> />
								<?php echo $param['desc'] ?></label>
						</td>
						<?php
						break;
					}
					case 'select':{ ?>
						<th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
						<td>
							<label for="<?php echo $this->prefix .$param['id'] ?>">
								<select name="<?php echo $this->prefix .$param['id'] ?>" id="<?php echo $this->prefix .$param['id'] ?>"><option>...</option><?php
									foreach($param['args'] as $val=>$name){
										?><option value="<?php echo $val ?>"<?php echo ( $value == $val ) ? ' selected="selected"' : '' ?>><?php echo $name ?></option><?php
									}
									?></select></label><br />
							<span class="description"><?php echo $param['desc'] ?></span>
						</td>
						<?php
						break;
					}
				}
				?></tr><?php
			}
		}
		?></tbody></table><?php
	}
	function save($post_id, $post){
		if ( !wp_verify_nonce( $_POST[ $this->options['id'].'_wpnonce' ], $this->options['id'] ) ) return;
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
		if ( !in_array($post->post_type, $this->options['post'])) return;
		foreach ( $this->options['args'] as $param ) {
			if ( current_user_can( $param['cap'] ) ) {
				if ( isset( $_POST[ $this->prefix . $param['id'] ] ) && trim( $_POST[ $this->prefix . $param['id'] ] ) ) {
					update_post_meta( $post_id, $this->prefix . $param['id'], trim($_POST[ $this->prefix . $param['id'] ]) );
				} else {
					delete_post_meta( $post_id, $this->prefix . $param['id'] );
				}
			}
		}
	}
}

$options = array(
	array( // First MetaBox
		'id'	=>	'meta1',
		'name'	=>	'Custom MetaBox 1',
		'post'	=>	array('page','post'),
		'pos'	=>	'normal',
		'pri'	=>	'high',
		'cap'	=>	'edit_posts',
		'args'	=>	array(
			array(
				'id'			=>	'field_1', //  meta1_field_1
				'title'			=>	'Title',
				'type'			=>	'text',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'field_1_1', //  meta1_field_1_1
				'title'			=>	'Title',
				'type'			=>	'text',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'field_1_2', //  meta1_field_1_2
				'title'			=>	'Title',
				'type'			=>	'text',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'field_1_3', //  meta1_field_1_3
				'title'			=>	'Title',
				'type'			=>	'text',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'textfield_1', // meta1_textfield_1
				'title'			=>	'Some text',
				'type'			=>	'textarea',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'textfield_2', // meta1_textfield_2
				'title'			=>	'Some text',
				'type'			=>	'textarea',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'textfield_3', // meta1_textfield_3
				'title'			=>	'Some text',
				'type'			=>	'textarea',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			),
			array(
				'id'			=>	'textfield_4', // meta1_textfield_4
				'title'			=>	'Some text',
				'type'			=>	'textarea',
				'placeholder'		=>	'',
				'desc'			=>	'',
				'cap'			=>	'edit_posts'
			)
		)
	),
	array( // Second MetaBox
		'id'	=>	'meta2',
		'name'	=>	'Custom MetaBox 2',
		'post'	=>	array('page', 'post'),
		'pos'	=>	'normal',
		'pri'	=>	'high',
		'cap'	=>	'edit_posts',
		'args'	=>	array(
			array(
				'id'			=>	'field_2',
				'title'			=>	'Add text',
				'desc'			=>	'',
				'type'			=>	'textarea',
				'cap'			=>	'edit_posts'
			)
		)
	)
);

foreach ($options as $option) {
	$truemetabox = new trueMetaBox($option);
}

