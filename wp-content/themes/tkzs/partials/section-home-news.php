<div class="section news-home">
   <div class="container">
      <div class="row">
         <div class="col-24 text-center">
            <h2 class="headline headline--main">Aktualności</h2>
         </div>
      </div>
      <?php
         $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6
         );
         $the_query = new WP_Query( $args );
         $posts = $the_query->posts;
      ?>
      <?php if ($the_query->have_posts()): ?>
         <div class="home-grid">
            <div class="row">
               <div class="col-xl-12 home-grid__row">
                  <div class="row">
                     <!-- post 1 -->
                     <?php 
                        $post = $posts[0]; 
                        setup_postdata($post);
                     ?>
                     <div class="col-24 col-md-12">
                        <div class="home-grid__box">
                           <div class="home-grid__box-content rect-box">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>
                     
                     <!-- post 2 -->
                     <?php 
                        $post = $posts[1]; 
                        setup_postdata($post);
                     ?>
                     <div class="col-24 col-md-12">
                        <div class="home-grid__box home-grid__box--color2">
                           <div class="home-grid__box-content rect-box">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>

                     <!-- post 3 -->
                     <?php 
                        $post = $posts[2]; 
                        setup_postdata($post);
                        $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                     ?>
                     <div class="col-24">
                        <div class="home-grid__box home-grid__box--image" style="background-image: url(<?php echo $featured_img_url; ?>)">
                           <div class="home-grid__box-content home-grid__box-content--image rect-box rect-box--image">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>
                  </div>
               </div>
               <div class="col-xl-12 home-grid__row">
                  <div class="row">
                     <!-- post 4 -->
                     <?php 
                        $post = $posts[3]; 
                        setup_postdata($post);
                        $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                     ?>
                     <div class="col-24">
                        <div class="home-grid__box home-grid__box--image" style="background-image: url(<?php echo $featured_img_url; ?>)">
                           <div class="home-grid__box-content home-grid__box-content--image rect-box rect-box--image">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>
                     <!-- post 5 -->
                     <?php 
                        $post = $posts[4]; 
                        setup_postdata($post);
                     ?>
                     <div class="col-24 col-md-12">
                        <div class="home-grid__box home-grid__box--color3">
                           <div class="home-grid__box-content rect-box">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>
                     <!-- post 6 -->
                     <?php 
                        $post = $posts[5]; 
                        setup_postdata($post);
                     ?>
                     <div class="col-24 col-md-12">
                        <div class="home-grid__box home-grid__box--color4">
                           <div class="home-grid__box-content rect-box">
                              <?php echo get_template_part('partials/content', 'home-grid'); ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        wp_reset_postdata();
                     ?>
                  </div>
               </div>
            </div>
         </div>
      <?php endif; ?>
   </div>
</div>