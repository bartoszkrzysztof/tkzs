<?php 
   $front_id = get_option('page_on_front');
?>
<?php if (have_rows('cite_slider', $front_id)) :  $i = 0; ?>
   <div class="color-border">
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
      <div class="color-border__item"></div>
   </div>


   <div class="slider-page">
      <div class="container">
         <div class="row">
            <div class="col-24">
               <h2 class="headline text-center headline--main section__headline">Mówią o nas</h2>
            </div>
            <div class="col-24">
               <div id="reviewSlider">
                  <?php while (have_rows('cite_slider', $front_id)) : the_row(); ?>
                     <div class="slider-page__slide">
                        <div class="slider-page__content">
                           <?php echo get_sub_field('cite'); ?>
                        </div>
                     </div>
                  <?php endwhile; ?>
               </div>
               <div id="reviewSliderNav">
                  <div class="row justify-content-center slider-page__nav">
                     <?php while (have_rows('cite_slider', $front_id)) : the_row(); ?>
                        <div class="col-3 slider-page__nav-item review-slider-nav <?php echo ($i == 0) ? 'active' : ''; ?>" rel="<?php echo $i; ?>">
                           <div class="slider-page__nav-icon"><span class="icon-user"></span></div>
                           <?php echo get_sub_field('name'); ?>
                        </div>
                     <?php $i++; endwhile; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php endif; ?>