<?php $slider = get_field('banner_slider') ?>
<div class="slider-home" id="sliderHome">
   <?php if ($slider) : ?>
      <?php foreach ($slider as $slide) : ?>
         <div class="slider-home__slide parallax-window" data-parallax="scroll" data-image-src="<?php echo $slide['photo']['url']; ?>" style="background-image: url(<?php echo $slide['photo']['url']; ?>;">
            <?php if ($slide['text']) : ?>
            <div class="slider-home__overlay"></div>
               <div class="slider-home__title container">
                  <div class="container">
                     <?php echo $slide['text']; ?>
                  </div>
               </div>   
            <?php endif; ?>
         </div>
      <?php endforeach; ?>
   <?php else : ?>
      <div class="slider-home__slide parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/dist/static/img/temp/back.jpg"  style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/static/img/temp/back.jpg);">
      </div>
   <?php endif; ?>
</div>
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