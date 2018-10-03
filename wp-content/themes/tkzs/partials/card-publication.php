<?php
   $thumb = get_the_post_thumbnail_url();
?>
<div class="publication">
   <div class="row">
      <div class="col-10 publication__image-container">
         <a href="<?php echo $thumb; ?>" data-toggle="lightbox">
            <img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" class="publication__image">
         </a>
      </div>
      <div class="col-14">
         <h3 class="headline publication__headline">
            <?php the_title(); ?>
         </h3>
         <?php if (get_field('author')) : ?>
            <p class="publication__description"><strong>Autor:</strong> <?php echo get_field('author'); ?></p>
         <?php endif; ?>
         <?php if (get_field('publisher')) : ?>
            <p class="publication__description"><strong>Wydawca:</strong> <?php echo get_field('publisher'); ?></p>
         <?php endif; ?>
         <?php if (get_field('year')) : ?>
            <p class="publication__description"><strong>Rok wydania:</strong> <?php echo get_field('year'); ?></p>
         <?php endif; ?>
         <?php if (get_field('description')) : ?>
            <p class="publication__description"><strong>Opis:</strong> <?php echo get_field('description'); ?></p>
         <?php endif; ?>
      </div>
   </div>
   </a>
</div>