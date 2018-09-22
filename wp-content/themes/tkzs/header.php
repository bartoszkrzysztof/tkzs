<!DOCTYPE html>
<html <?php language_attributes() ?> >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <?php wp_head()?>
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/static/img/favicon.ico?v=1.3" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/static/img/favicon.ico?v=1.3" type="image/x-icon">
    <script>
        var basePath = "<?php echo get_template_directory_uri(); ?>";
    </script>
</head>

<body <?php body_class()?> >
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand ml-0 ml-lg-5" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            menu
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="ml-auto mr-0 mr-lg-5">
                <?php 
                    $headerMenuArgs = array(
                        'theme_location' => 'header_menu',
                        'walker' => new Mda_Menu_Walker,
                        'container'=>false,
                        'fallback_cb'=>false,
                        'menu_class' => 'header-menu__nav',
                        'menu_item_classes' => array('header-menu__item'),
                        'menu_link_classes' => array('header-menu__link')
                    );
                    wp_nav_menu($headerMenuArgs);
                ?>
            </div>
        </div>
    </nav>
</div>


