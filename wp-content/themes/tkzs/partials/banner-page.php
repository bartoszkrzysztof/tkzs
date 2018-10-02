<?php 
   if ( is_home() && ! is_front_page() ) {
      $acf_id = get_option( 'page_for_posts' );
      $banner = get_field('page-banner', $acf_id);
      $banner = $banner['url'];
   }
   elseif (is_archive()) {
      $banner = get_archive_thumbnail_src('full');
   }
   elseif (get_field('page-banner')) {
      $banner = get_field('page-banner');
      $banner = $banner['url'];
   }
   else {
      $banner = get_template_directory_uri().'/dist/static/img/banner.jpg';
   }
?>
<div class="banner-page" style="background-image: url(<?php echo $banner; ?>);">
   <div class="banner-page__overlay"></div>
   <div class="banner-page__title container text-center">
      <div class="container">
         <?php
            if ( is_home() && ! is_front_page() ) {
               echo single_post_title();
            }
            elseif (is_archive()) {
               echo get_the_archive_title();
            }
            else {
               the_title();
            }
         ?>
      </div>
   </div>   
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

<div class="breadcrumbs">
   <div class="container">
      <?php
         if (is_tax('location')) :
      ?>
         <span><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a> \ <a href="<?php echo esc_url( home_url( '/inicjatywy' ) ); ?>">Inicjatywy</a> \ <span class="breadcrumb_last"><?php echo get_the_archive_title(); ?></span></span></span>
      <?php
         elseif (is_singular('initiatives')) : 
            $term = get_the_terms($post->ID, 'location');
      ?>
         <span><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a> \ <a href="<?php echo esc_url( home_url( '/inicjatywy' ) ); ?>">Inicjatywy</a> \ <a href="<?php echo get_category_link( $term[0]->term_id); ?>"><?php echo $term[0]->name; ?></a> \ <span class="breadcrumb_last"><?php the_title(); ?></span></span></span>
      <?php 
         else :
            if ( function_exists('yoast_breadcrumb') ) {
               yoast_breadcrumb();
            }
         endif;
      ?>
   </div>
</div>