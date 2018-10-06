<?php // https://generatewp.com/post-type/

add_action( 'init', function(){

	$labels = array(
		'name'                  => _x( 'Inicjatywy', 'Post Type General Name', 'theme' ),
		'singular_name'         => _x( 'Inicjatywa', 'Post Type Singular Name', 'theme' ),
		'menu_name'             => __( 'Inicjatywy', 'theme' ),
	);
	$args = array(
		'label'                 => __( 'Inicjatywy', 'theme' ),
		'labels'                => $labels,
        'supports'              => array( 'title', 'author', 'editor', 'excerpt', 'thumbnail' ),
        'rewrite'               => array('slug' => 'inicjatywa-punkt', 'with_front' => false),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'initiatives', $args );

}, 0 );

//dodanie taksonomii status
add_action( 'init', function() {
	$labels = array(
		'name'              => _x( 'Kategorie', 'taxonomy general name', 'theme' ),
		'singular_name'     => _x( 'Kategoria', 'taxonomy singular name', 'theme' ),
		'menu_name'         => __( 'Kategorie', 'theme' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'inicjatywa', 'with_front' => true),
	);
	register_taxonomy( 'location', array( 'initiatives' ), $args );

}, 0 );

// add_action( 'pre_get_posts', function ( $q ) {
//     if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'initiatives' ) ) {
// 		$q->set( 'posts_per_page', -1 );
//     }
//     if( !is_admin() && $q->is_main_query() && $q->is_tax( 'location' ) ) {
// 		$q->set( 'posts_per_page', -1 );
//     }
// });