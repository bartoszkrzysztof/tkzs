<?php // https://generatewp.com/post-type/

add_action( 'init', function(){

	$labels = array(
		'name'                  => _x( 'Publikacje', 'Post Type General Name', 'theme' ),
		'singular_name'         => _x( 'Publikacja', 'Post Type Singular Name', 'theme' ),
		'menu_name'             => __( 'Publikacje', 'theme' ),
	);
	$args = array(
		'label'                 => __( 'Publikacje', 'theme' ),
		'labels'                => $labels,
        'supports'              => array( 'title', 'author', 'editor' ),
        'rewrite'               => array('slug' => 'publikacja', 'with_front' => false),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'publications', $args );

}, 0 );

//dodanie taksonomii status
// add_action( 'init', function() {
// 	$labels = array(
// 		'name'              => _x( 'Miejsca', 'taxonomy general name', 'theme' ),
// 		'singular_name'     => _x( 'Miejsce', 'taxonomy singular name', 'theme' ),
// 		'menu_name'         => __( 'Miejsca', 'theme' ),
// 	);
// 	$args = array(
// 		'hierarchical'      => true,
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'           => array( 'slug' => 'miejsce' ),
// 	);
// 	register_taxonomy( 'location', array( 'career' ), $args );

// }, 0 );

// add_action( 'pre_get_posts', function ( $q ) {
//     if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'career' ) ) {
// 		$q->set( 'posts_per_page', -1 );
//     }
//     if( !is_admin() && $q->is_main_query() && $q->is_tax( 'location' ) ) {
// 		$q->set( 'posts_per_page', -1 );
//     }
// });