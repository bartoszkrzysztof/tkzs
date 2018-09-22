<?php
// Zmiana logotypu
function wpb_custom_logo()
{
    echo '
    <style type="text/css">
        #wp-admin-bar-wp-logo {
            display: none!important;
        }
        #adminmenu div.wp-menu-name{
            padding: 8px 8px 8px 0;
        }
    </style>';
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// Zmiana stopki
function remove_footer_admin ()
{
    echo 'Stworzono przez <a href="http://vespa-design.pl/" target="_blank">Vespa - studio graficzne</a>, korzystając z <a href="http://www.wordpress.org" target="_blank">WordPress</a>.</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Niestandardowe Widgety w Kokpicie
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() 
{
global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Informacje', 'custom_dashboard_help');
}
function custom_dashboard_help()
{
    echo '<p>Kontakt: <a href="mailto:info@gmail.com">info@vespa-design.pl</a>.</p>';
}

// Wyłączenie Welcome Panel w adminie
remove_action('welcome_panel', 'wp_welcome_panel');

// Zmiana logotypu na stronie logowania
function custom_loginlogo()
{
    echo '<style type="text/css">
    h1 a {background-image: url('. get_site_icon_url() . ') !important; }
    </style>';
}
add_action('login_head', 'custom_loginlogo');

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return get_bloginfo('url');
}

add_filter( 'login_headertitle', 'custom_loginlogo_title' );
function custom_loginlogo_title($url) {
    return 'Wykonanie strony - mda.pl';
}

// Czyscimy kokpit
add_filter( 'contextual_help', 'wpse_25034_remove_dashboard_help_tab', 999, 3 );
add_filter( 'screen_options_show_screen', 'wpse_25034_remove_help_tab' );
add_filter( 'get_user_option_screen_layout_dashboard', 'wpse_4552_one_column_layout' );
add_action('wp_dashboard_setup', 'wpse_73561_remove_all_dashboard_meta_boxes', 9999 );

function wpse_25034_remove_dashboard_help_tab( $old_help, $screen_id, $screen )
{
    if( 'dashboard' != $screen->base )
        return $old_help;

    $screen->remove_help_tabs();
    return $old_help;
}

function wpse_25034_remove_help_tab( $visible )
{
    global $current_screen;
    if( 'dashboard' == $current_screen->base )
        return false;
    return $visible;
}

function wpse_4552_one_column_layout( $cols ) {
    if( current_user_can( 'basic_contributor' ) )
        return 1;
    return $cols;
}

function wpse_73561_remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['dashboard']['normal']['core'] = array(
        'custom_help_widget' =>  array(
            'id' => 'custom_help_widget',
            'title' => 'Informacje',
            'callback' => 'custom_dashboard_help',
            'args' => 
                array (
                    '__widget_basename' => 'Informacje'
                )
        )
    );
    $wp_meta_boxes['dashboard']['side']['core'] = array();
}

// Change Posts to BLOG
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Aktualności';
    // $submenu['edit.php'][5][0] = 'Blog';
    // $submenu['edit.php'][10][0] = 'Add News';
    // $submenu['edit.php'][16][0] = 'News Tags';
}
// function revcon_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'News';
//     $labels->singular_name = 'News';
//     $labels->add_new = 'Add News';
//     $labels->add_new_item = 'Add News';
//     $labels->edit_item = 'Edit News';
//     $labels->new_item = 'News';
//     $labels->view_item = 'View News';
//     $labels->search_items = 'Search News';
//     $labels->not_found = 'No News found';
//     $labels->not_found_in_trash = 'No News found in Trash';
//     $labels->all_items = 'All News';
//     $labels->menu_name = 'News';
//     $labels->name_admin_bar = 'News';
// }
add_action( 'admin_menu', 'revcon_change_post_label' );
// add_action( 'init', 'revcon_change_post_object' );