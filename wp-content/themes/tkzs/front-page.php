<?php
 /**
  * Template for Front-page
  * Go to Settings -> Reading -> set static Front page
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'home'); ?>
<?php echo get_template_part('partials/section', 'home-news'); ?>
<?php echo get_template_part('partials/section', 'home-about'); ?>
<?php echo get_template_part('partials/section', 'events'); ?>
<?php echo get_template_part('partials/section', 'home-cite'); ?>
<?php //echo get_template_part('partials/assets'); ?>
<?php echo get_template_part('partials/section', 'home-contact'); ?>

<?php get_footer();?>