<p class="text text--light text--smaller rect-box__date"><?php echo get_the_date(); ?></p>
<div class="headline headline--card-small rect-box__headline clamp-text">
   <p><?php the_title(); ?></p>
</div>
<div class="text text--reset-gaps rect-box__text clamp-text">
   <?php the_excerpt(); ?>
</div>
<a href="<?php the_permalink(); ?>" class="button button--arrow rect-box__link">Czytaj więcej</a>