<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once 'includes/autoload.php'; // automatyczne ładowanie funkcji z folderu includes

/**
 * ACF - strony opcji
 */
function mda_acf_options_pages(){
    if( function_exists('acf_add_options_page') ) {
        $themeAdditionalSettings = acf_add_options_page(array(
            'page_title' 	=> __('Additional settings'),
            'menu_title'	=> __('Additional settings'),
            'menu_slug' 	=> 'additional-settings',
            'icon_url' => 'dashicons-admin-generic',
            'redirect'		=> true
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Kontakt',
            'menu_title'	=> 'Kontakt',
            'parent_slug'	=> $themeAdditionalSettings['menu_slug'],
        ));
    }
}

/**
 * Niestandardowe menu
 */
function mda_register_menu()
{
    // menu_handle - kotwica, po której odwołujemy się w motywie do danego menu
    // Menu name - nazwa pozycji menu, która wyświetli się w panelu admina
    register_nav_menus( array(
        'header_menu' => __('Site-header menu'),
        'footer_menu' => __('Site-footer menu')
    ));
}

/**
 * Wymiary obrazków wgrywanych na stronę
 */
function mda_register_image_sizes()
{
    // Usuwamy niechciane rozmiary
    add_filter('intermediate_image_sizes_advanced', function($sizes){
        // unset($sizes['thumbnail']);
        return $sizes;
    });

    if (function_exists('add_image_size')) {
        // https://developer.wordpress.org/reference/functions/add_image_size/
        // add_image_size('size_name', $width, $height, $crop);
        add_image_size('product', 367, 367, true);
    }

    // Ładujemy etykiety
    // add_filter('image_size_names_choose', function($sizes){
    //     $newSizesLabels = array(
    //         // 'your-custom-size' => __( 'Your Custom Size Name' ),
    //         // 'frontpage-slider' => __( 'Frontpage slider' )
    //     );
    //     return array_merge($sizes, $newSizesLabels);
    // });

    // Dodajemy wsparcie dla "Obrazka wyróżniającego"
    add_theme_support('post-thumbnails');
    add_post_type_support( 'page', 'excerpt' );
}

/**
 * AJAX
 */
function mda_register_ajax()
{
    // Dodajemy akcje ajaxowe
    // add_ajax_action('action_name', 'ajax_action_name_callback');
}

/**
 * Skrypty i style
 */
add_action('wp_enqueue_scripts', function(){
    $_base_url = get_template_directory_uri();

    // Wyrejestrowujemy niepotrzebne style i skrypty
    wp_deregister_style('stylesheet');
    wp_dequeue_style('stylesheet');
    wp_deregister_script('wp-embed');
    wp_dequeue_script('wp-embed');

    // Wyrejestrowujemy jQuery, ponieważ wrzucamy je do bundle.js!
    // wp_deregister_script('jquery');
    // wp_dequeue_script('jquery');

    // Rejestrujemy skrypty
    $manifest_js = (array) json_decode(file_get_contents($_base_url . '/dist/js/rev-manifest.json'), true);
    // wp_register_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD2agPj-BZEvjR3hXqy1Vy6ur7huFplx0Q', array(), null, true);
    // wp_enqueue_script('gmaps');
    wp_register_script('main_scripts', $_base_url . '/dist/js/' . $manifest_js['bundle.js'], array(), null, true);
    wp_enqueue_script('main_scripts');
    
    // Jeżeli chcemy użyc ajax w którymś z plików JS, rejestrujemy go tutaj, użycie dla jQuery.ajax: "url: ajax.url"
    use_ajax_action('main_scripts');

    // Rejestrujemy style
    $manifest_css = (array) json_decode(file_get_contents($_base_url . '/dist/css/rev-manifest.json'), true);
    wp_register_style('main_styles', $_base_url . '/dist/css/' . $manifest_css['bundle.css'], array(), null);
    wp_enqueue_style('main_styles');
});

/**
 *  Inicjalizacja Wordpressa
 */
add_action( 'init', function(){
    // Ładujemy strony opcji ACF
    mda_acf_options_pages();
    // Ładujemy niestandardowe menu
    mda_register_menu();
    // Rejestrujemy ajaxowe akcje
    mda_register_ajax();
    // Nowe wymiary
    mda_register_image_sizes();
    // Ułatwiamy trochę stylowanie formularzy itp.
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets'));
    
});

add_action('init', function() {
    global $wp_rewrite;
    $GLOBALS['wp_rewrite']->pagination_base = 'strona';
    add_rewrite_rule('^galerie/strona/([0-9]+)/?','index.php?post_type=galleries&paged=$matches[1]', 'top');
    add_rewrite_rule('^publikacje/strona/([0-9]+)/?','index.php?post_type=publications&paged=$matches[1]', 'top');
}, 10, 0);


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

remove_action('wp_head', 'wp_generator');

function remove_feed_generator() {
	return '';
}
// Tell to not display WP version 
add_filter( 'the_generator', 'remove_feed_generator');

remove_action( 'wp_head',      'rest_output_link_wp_head'              );
remove_action( 'wp_head',      'wp_oembed_add_discovery_links'         );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

add_filter('xmlrpc_enabled', '__return_false');

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Disable default Wordpress API
 */
// add_filter('json_enabled', '__return_false');
// add_filter('json_jsonp_enabled', '__return_false');
// add_filter('rest_enabled', '_return_false');
// add_filter('rest_jsonp_enabled', '_return_false');

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

function add_image_responsive_class($content) {
    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<div class="column-break"><img$1class="$2 img-responsive"$3></div>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
 }
 add_filter('the_content', 'add_image_responsive_class');