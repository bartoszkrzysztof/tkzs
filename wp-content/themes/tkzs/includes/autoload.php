<?php
$folders = array(
    'mda',
    'custom-functions',
    'custom-functions/menu-walkers',
    'custom-post-types'
);

foreach($folders as $folder){
    foreach(glob(get_template_directory() . "/includes/" . $folder . "/*.php") as $file){
        require_once $file;
    }
}