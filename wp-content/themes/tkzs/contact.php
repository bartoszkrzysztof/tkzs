<?php
 /**
  * Template name: Kontakt
  */
get_header(); ?>

<?php echo get_template_part('partials/banner', 'page'); ?>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-24 col-lg-11 single-header">
         <h3 class="single-header__title single-header__title--small">Dane kontaktowe</h3>

         <div id="mapid" class="contact-map"></div>

         <div class="contact-data">
            <p class="contact-data__headline"><strong>Towarzystwo Kultury Ziemi Szamotulskiej</strong></p>
            <div class="contact-data__text"><?php the_content();  ?></div>
         </div>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-24 col-lg-11 single-header">
         <h3 class="single-header__title single-header__title--small">Formularz kontaktowy</h3>
         <div class="contact-form-page">
            <?php echo do_shortcode('[contact-form-7 id="150" title="Formularz kontaktowy"]'); ?>
         </div>
      </div>
   </div>
</div>

<?php 
  if (get_field('cite-slider-switch')) : 
    echo get_template_part('partials/slider', 'page');
  endif;  
?>
<?php get_footer();?>