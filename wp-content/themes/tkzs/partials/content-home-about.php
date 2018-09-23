<div class="col-24 col-xl-20">
   <?php if (get_sub_field('icon')) : ?>
      <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('title'); ?>" class="home-about__icon">
   <?php endif; ?>
   <h2 class="headline headline--main home-about__title"><?php echo get_sub_field('title'); ?></h2>
</div>
<div class="col-24 col-xl-20">
   <div class="text text--bigger home-about__text">
      <?php echo get_sub_field('text'); ?>
   </div>
   <?php if (get_sub_field('link')) : ?>
      <?php $link = get_sub_field('link'); ?>
      <a href="<?php echo $link[0] -> guid; ?>" class="button home-about__link">Zobacz więcej</a>
   <?php endif; ?>
</div>