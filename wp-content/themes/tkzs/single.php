<?php
 /**
  * Base template for POSTS
  */
  get_header(); ?>
  
<?php echo get_template_part('partials/banner', 'page'); ?>
<div class="container">
   <div class="row">
      <div class="col-24 col-lg-12 single-header">
         <h3 class="single-header__title"><?php the_title(); ?></h3>
         <?php if (get_field('localization')) : ?>
            <h3 class="single-header__subtitle single-header__subtitle--localizaction">
              Lokalizacja:<br />
              <?php echo get_field('localization'); ?>
            </h3>
         <?php endif; ?>
         <?php if (get_field('subtitle')) : ?>
            <h3 class="single-header__subtitle"><?php echo get_field('subtitle'); ?></h3>
         <?php endif; ?>
      </div>
      <div class="col-24 col-lg-12 single-content">
        <?php the_content(); ?>
      </div>
   </div>
</div>
<?php echo get_template_part('partials/section-single', 'gallery'); ?>
<?php 
  if (get_field('cite-slider-switch')) : 
    echo get_template_part('partials/slider', 'page');
  endif;  
?>

<?php get_footer(); ?>