<footer class="footer">
   <div class="container">
      <div class="row">
         <div class="col-24 text-center footer-menu">
            <?php 
               $headerMenuArgs = array(
                  'theme_location' => 'footer_menu',
                  'walker' => new Mda_Menu_Walker,
                  'container'=>false,
                  'fallback_cb'=>false,
                  'menu_class' => 'footer-menu__nav',
                  'menu_item_classes' => array('footer-menu__item'),
                  'menu_link_classes' => array('footer-menu__link')
               );
               wp_nav_menu($headerMenuArgs);
            ?>
            <a href="#" target="_blank" class="facebook"><span class="icon-facebook"></span></a>
         </div>
         
         <div class="col-24 text-center footer-info">
            <p>Wszystkie prawa zastrzeżone przez <strong>Towarzystwo Kultury Ziemi Szamotulskiej</strong> © 2018</p>
            <p>Projekt i wykonanie: <a href="http://vespa-design.pl/" target="_blank"><strong>Vespa Studio Graficzne</strong></a></p>
         </div>
      </div>
   </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>