<?php
    /**
    * Base template for PAGES
    */
    get_header(); 
?>
        <div class="section">
            <div class="row">
                <div class="column">
                    <h2 class="section__title">
                        <?php _e('Nie znaleziono strony - Błąd 404', 'theme') ?>
                    </h2>
                </div>

                <?php if(have_posts()) : ?>
                    <div class="column small-12">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php


?>

<?php get_footer();?>