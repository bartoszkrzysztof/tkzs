<?php
   $cite = get_field('single-cite-content');
?>
<div class="single-cite">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-24 col-lg-16">
            <div class="single-cite__content">
               <h2 class="headline text-center headline--main section__headline"><?php echo $cite['title']; ?></h2>
               <div class="single-cite__text">
                  <?php echo $cite['text']; ?>
                  
                  <p class="single-cite__author">
                     <?php if($cite['photo']) : ?>
                        <div class="single-cite__photo" style="background: url(<?php echo $cite['photo']['url']; ?>)">

                        </div>
                     <?php endif; ?>
                     <?php echo $cite['author']; ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
