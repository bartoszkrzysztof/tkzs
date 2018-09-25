<?php 
   if ( is_home() && ! is_front_page() ) {
      $acf_id = get_option( 'page_for_posts' );
   }

   if (get_field('page-banner', $acf_id)) {
      $banner = get_field('page-banner', $acf_id)['url'];
   }
   else {
      $banner = get_template_directory_uri().'/dist/static/img/banner.jpg';
   }
?>
<div class="banner-page" style="background-image: url(<?php echo $banner; ?>);">
   <div class="banner-page__overlay"></div>
   <div class="banner-page__title container text-center">
      <?php
         if ( is_home() && ! is_front_page() ) {
            echo single_post_title();
         }
         else {
            the_title();
         }
      ?>
   </div>   
</div>