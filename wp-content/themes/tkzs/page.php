<?php
    /**
    * Base template for PAGES
    */
    get_header(); 
?>


<?php echo get_template_part('partials/banner', 'page'); ?>
<div class="container">
   <div class="row">
      <div class="col-24 col-lg-12 single-header">
         <h3 class="single-header__title"><?php the_title(); ?></h3>
         <?php if (get_field('subtitle')) : ?>
            <h3 class="single-header__subtitle"><?php echo get_field('subtitle'); ?></h3>
         <?php endif; ?>
      </div>
      <div class="col-24 col-lg-12 single-content single-content--excerpt">
        <?php the_excerpt(); ?>
      </div>
   </div>
</div>


<div class="container gallery">
    <div class="row">
        <div class="col-24">
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php 
  if (get_field('single-cite')) : 
    echo get_template_part('partials/section', 'cite');
  endif;  
?>

<?php 
  if (get_field('cite-slider-switch')) : 
    echo get_template_part('partials/slider', 'page');
  endif;  
?>

<?php get_footer();?>