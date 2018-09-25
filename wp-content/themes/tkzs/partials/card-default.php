<div class="card">
   <a href="<?php the_permalink(); ?>">
      <div class="card-image"></div>
   </a>
   <div class="card-header">
      <h1 class="headline headline--card equal-headline">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
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