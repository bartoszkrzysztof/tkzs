<?php
   $args = array(
      'post_type' => 'events',
      'posts_per_page' => -1,
      'meta_key' => 'active',
      'meta_value' => true
   );
   $events = new WP_Query( $args );
   $posts = $events->posts;
?>
<?php if ($events->have_posts()): ?>
   <div class="section section--background events">
      <div class="container">
         <div class="row">
            <div class="col-24 text-center">
               <h2 class="headline headline--main section__headline">Wydarzenia i wystawy</h2>
            </div>
         </div>
         <div class="row events-slider" id="eventsSlider">
            <?php while ($events->have_posts()): $events->the_post(); ?>
               <?php 
                  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                  $no_image = get_template_directory_uri().'/dist/static/img/no-image.png';
               ?>
               <div class="col-24 col-md-12 col-xl-8">
                  <div class="card">
                     <div class="card-image card-image--poster" style="background-image: url(<?php echo ($featured_img_url) ? $featured_img_url : $no_image; ?>)">
                     </div>
                     <div class="card-header">
                        <p class="text text--light text--smaller card-date"><?php echo get_the_date(); ?></p>
                        <h1 class="headline headline--card equal-headline"><?php the_title(); ?></h1>
                     </div>
                     <div class="card-body">
                        <div class="text text--reset-gaps equal-text">
                           <?php the_excerpt(); ?>
                        </div>
                     </div>
                     <div class="card-footer">
                        <div class="text-box__link">
                           <a href="<?php the_permalink(); ?>" class="button button--arrow">Czytaj więcej</a>
                        </div>
                     </div> 
                  </div>
               </div>
            <?php endwhile; ?>
         </div>
      </div>
   </div> 
<?php endif; ?>
<?php wp_reset_postdata(); ?>
