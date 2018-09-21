<?php
/**
 *  Czyszczenie Wordpressa z domyślnych niepotrzebnych rzeczy
 */
add_action( 'init', 'clean_wp');
function clean_wp(){
    // Wylaczenie admin bar na front
    add_filter('show_admin_bar', '__return_false');

    // Czyscimy header
    add_filter('the_generator', '__return_false');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

    // Wyrzucamy emoji
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
}