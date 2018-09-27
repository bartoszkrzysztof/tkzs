<?php 
   $gallery = acf_photo_gallery('gallery', $post->ID);
?>
<?php if ($gallery) : ?>
   <div class="container gallery">
      <div class="row">
         <?php foreach ($gallery as $image) : ?>
            <div class="col-12 col-md-8 col-lg-6">
               <div class="gallery__image-container">
                  <a href="<?php echo $image['full_image_url']; ?>">
                     <div class="gallery__image" style="background-image: url(<?php echo $image['thumbnail_image_url']; ?>)">
                     </div>
                  </a>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
<?php endif; ?>