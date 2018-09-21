<?php
 /**
  * Template for Front-page
  * Go to Settings -> Reading -> set static Front page
  */
get_header(); ?>


<?php echo get_template_part('partials/banner-video'); ?>
<?php echo get_template_part('partials/section-underbanner', 'home'); ?>
<div class="page-background page-background--gradient">
  <div class="container">
    <?php echo get_template_part('partials/section-home', 'text-franchise'); ?>
    <?php echo get_template_part('partials/section-home', 'bike'); ?>
    <?php echo get_template_part('partials/section-home', 'events'); ?>
  </div>

  <?php echo get_template_part('partials/section-home', 'photos'); ?>
</div>
<div class="container">
  <?php echo get_template_part('partials/section-home', 'text-about'); ?>
</div>
  <?php echo get_template_part('partials/section-instagram'); ?>


<?php echo get_template_part('partials/assets'); ?>

<?php get_footer();?>