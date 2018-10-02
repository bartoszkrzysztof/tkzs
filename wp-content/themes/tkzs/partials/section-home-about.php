<div class="inner-container">
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

    <?php if (have_rows('about-sections')) : $i = 1; ?>
        <?php while(have_rows('about-sections')) : the_row(); ?>
            <?php $thumb = get_sub_field('photo'); ?>
            <div class="home-about">
                <div class="row align-items-center justify-content-center">
                    <?php if (get_sub_field('photo')) : ?>
                        <div class="col-24 col-md-12 home-about__photo home-about__div-col-start" style="background-image: url(<?php echo $thumb['url']; ?>);">
                        </div>
                        <div class="col-24 col-md-12 home-about__div-col-end">
                            <div class="half-container">
                    <?php else : ?>
                        <div class="col-24">
                            <div class="container">
                    <?php endif; ?>
                            <div class="home-about__content">
                                <div class="row justify-content-center">
                                <?php echo get_template_part('partials/content', 'home-about'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++; endwhile; ?>
   <?php endif; ?>
</div>