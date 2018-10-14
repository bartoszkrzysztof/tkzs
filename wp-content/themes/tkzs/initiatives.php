<?php
 /**
  * Template name: Inicjatywy
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'page'); ?>

<?php 
   $args = array(
      'taxonomy' => 'location',
      'hide_empty' => false
   );
   $cats = get_terms($args); 
?>

<?php if ($cats) : ?>
  <div class="container news">
    <div class="row">
      <?php foreach ( $cats as $cat ) : ?>
         <?php
            $thumb = get_archive_thumbnail_src('large', null, $cat->term_id);
         ?>
        <div class="col-24 col-md-12 col-tb-8">
            <div class="card">
               <a href="<?php echo get_category_link( $cat->term_id); ?>">
                  <div class="card-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
               </a>
               <div class="card-header">
                  <h3 class="headline headline--card equal-headline">
                  <a href="<?php echo get_category_link( $cat->term_id); ?>"><?php echo $cat -> name; ?></a>
                  </h3>
               </div>
               <div class="card-body">
                  <div class="text text--reset-gaps equal-text">
                     <?php echo get_archive_top_content(null, $cat->term_id); ?>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="text-box__link">
                  <a href="<?php echo get_category_link( $cat->term_id); ?>" class="button button--arrow">Czytaj dalej</a>
                  </div>
               </div> 
            </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
<div class="container text-center">
  <?php numeric_posts_nav(); ?>
</div>

<?php echo get_template_part('partials/section', 'events'); ?>
<?php echo get_template_part('partials/slider', 'page'); ?>
<?php get_footer();?>