<?php
   $thumb = get_the_post_thumbnail_url();
   
   if (!$thumb) {
      $term = get_the_terms($post->ID, 'location');
      $thumb = get_archive_thumbnail_src('full', null, $term[0]->term_id);
   }
?>
<div class="card">
   <a href="<?php the_permalink(); ?>">
      <div class="card-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
   </a>
   <div class="card-header">
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