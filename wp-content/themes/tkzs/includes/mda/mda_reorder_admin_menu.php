<?php
// Remove from menu
add_action( 'admin_menu', function() {
    remove_menu_page( 'index.php' );
    // remove_menu_page( 'edit.php' );
    // remove_menu_page( 'upload.php' );
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page( 'tools.php' );
    remove_menu_page( 'duplicator' );
} );

// Reorder wp admin menu
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php', // Dashboard
         'edit.php?post_type=page', // Pages
         'edit.php', // Posts
         'edit.php?post_type=galeries', // Custom post type
         'edit.php?post_type=initiatives', // Custom post type
         'edit.php?post_type=events', // Custom post type
         'edit.php?post_type=publications', // Custom post type
         'separator1', // --Space--
         'upload.php', // Media
         'edit-comments.php', // Comments
         'separator-last', // --Space--
         'themes.php', // Appearance
         'plugins.php', // Plugins
         'users.php', // Users
         'tools.php', // Tools
         'options-general.php', // Settings
         'acf-options-social-media' // Custom acf options page
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

// CHECK ORDER AND NAMES
// add_filter('custom_menu_order', 'custom_menu_order');
// add_filter('menu_order', 'custom_menu_order');
// function custom_menu_order( $menu_ord ) {

//     if (!$menu_ord) return true;

//     // vars
//     $menu = 'acf-options';

//     // remove from current menu
//     $menu_ord = array_diff($menu_ord, array( $menu ));

//     // append after index.php [0]
//     array_splice( $menu_ord, 1, 0, array( $menu ) );

//     echo '<pre>';
//     print_r( $menu_ord );
//     echo '</pre>';
//     die;

//     // return
//     return $menu_ord;
// }