<?php
 /**
  * Template for Front-page
  * Go to Settings -> Reading -> set static Front page
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'home'); ?>
<?php echo get_template_part('partials/section', 'home-news'); ?>
<?php echo get_template_part('partials/section', 'home-about'); ?>
<?php echo get_template_part('partials/assets'); ?>

<?php get_footer();?>