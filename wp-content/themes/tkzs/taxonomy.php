<?php
 /**
  * Template for archive galleries
  * Go to Settings -> Reading -> set static Front page
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'page'); ?>
<div class="container">
   <div class="row">
      <div class="col-24 col-lg-12 single-header">
         <h3 class="single-header__title"><?php echo get_the_archive_title(); ?></h3>
         <?php //if (get_field('subtitle')) : ?>
            <h3 class="single-header__subtitle"><?php echo get_archive_bottom_content(); ?></h3>
         <?php //endif; ?>
      </div>
      <div class="col-24 col-lg-12 single-content">
        <?php echo term_description(); ?>
      </div>
   </div>
</div>
<?php if ( have_posts() ) : ?>
  <div class="container gallery">
    <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-8">
          <?php echo get_template_part('partials/card', 'initiative'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
<div class="container text-center">
  <?php numeric_posts_nav(); ?>
</div>

<?php //echo get_template_part('partials/section', 'events'); ?>
<?php echo get_template_part('partials/slider', 'page'); ?>
<?php get_footer();?>