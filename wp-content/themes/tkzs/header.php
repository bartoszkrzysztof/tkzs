<!DOCTYPE html>
<html <?php language_attributes() ?> >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <?php wp_head()?>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Roboto:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/static/img/favicon.ico?v=1.3" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/static/img/favicon.ico?v=1.3" type="image/x-icon">
    <script>
        var basePath = "<?php echo get_template_directory_uri(); ?>";
    </script>
</head>

<body <?php body_class()?> >

<header class="site-header" id="mainHeader">
    <div class="container">
        <div class="row align-items-center header-menu" id="navHeader">
            <div class="col">
                <?php 
                    $headerMenuArgs = array(
                        'theme_location' => 'header_menu_left',
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
            <div class="col-auto header-menu__logo-container">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Back to homepage', 'bikecafe'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/static/img/logo-main.svg" alt="Bike Cafe" class="header-menu__logo">
                </a>
            </div>
            <div class="col">
                <?php 
                    $headerMenuArgs = array(
                        'theme_location' => 'header_menu_right',
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
    </div>
</header>
<main class="content">

