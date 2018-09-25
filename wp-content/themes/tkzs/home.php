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
        <div class="col-8">
          <?php echo get_template_part('partials/card', 'default'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>

<?php get_footer();?>