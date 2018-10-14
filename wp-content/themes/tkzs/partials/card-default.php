<?php
   $thumb = get_the_post_thumbnail_url();
   $post_type = get_post_type();

   if (!$thumb) {
      if ($post_type == 'post') {
         $acf_id = get_option( 'page_for_posts' );
         $thumb = get_field('page-banner', $acf_id)['url'];
      }
      else {
         $thumb = get_archive_thumbnail_src('full', $post_type);
      }
   }
?>
<div class="card">
   <a href="<?php the_permalink(); ?>">
      <div class="card-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
   </a>
   <div class="card-header">
      <p class="text text--light text--smaller card-date"><?php echo get_the_date(); ?></p>
      <h3 class="headline headline--card equal-headline">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>
   </div>
   <div class="card-body">
      <div class="text text--reset-gaps equal-text">
         <?php the_excerpt(); ?>
      </div>
   </div>
   <div class="card-footer">
      <div class="text-box__link">
      <a href="<?php the_permalink(); ?>" class="button button--arrow">Czytaj dalej</a>
      </div>
   </div> 
</div>