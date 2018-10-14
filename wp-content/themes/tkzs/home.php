<?php
 /**
  * Template for Front-page
  * Go to Settings -> Reading -> set static Front page
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'page'); ?>


<?php if ( have_posts() ) : ?>
  <div class="container news">
    <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-24 col-md-12 col-lg-8">
          <?php echo get_template_part('partials/card', 'default'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
<div class="container text-center">
  <?php numeric_posts_nav(); ?>
</div>

<?php echo get_template_part('partials/section', 'events'); ?>
<?php echo get_template_part('partials/slider', 'page'); ?>
<?php get_footer();?>