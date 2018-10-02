<?php
function add_ajax_action($action, $function)
{
    add_action('wp_ajax_' . $action, $function);
    add_action('wp_ajax_nopriv_' . $action, $function);
}

function use_ajax_action($name)
{
    wp_localize_script($name, 'ajax', array(
        'url' => admin_url('admin-ajax.php')
    ));
}