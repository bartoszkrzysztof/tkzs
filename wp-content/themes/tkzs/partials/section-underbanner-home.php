<div class="container container--wide under-banner">
    <div class="row">
        <div class="cup">
			<video id="video" style="display:none" autoplay>
				<source src="<?php echo get_template_directory_uri(); ?>/video/kubek2.mp4" />
			</video>
			<canvas width="600" height="1200" id="buffer" class="cup__buffer"></canvas>
			<canvas width="600" height="600" id="output" class="cup__output"></canvas>
        </div>
        <div class="col-24 col-md-12 section section--white cta-section cta-section--home cta-section--home-start text-md-right" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/static/img/temp/start-left.png);">
            <p class="text-label">Będziemy tam gdzie ty</p>
            <h3 class="headline headline--section-small cta-section__headline">Eventy z kawą</h3>
            <div class="text text--light">
                <p>Spotkanie otulone aromatycznym zapachem kawy, zrobi wrażenie na Twoich gościach i pracownikach.</p>
            </div>
            <a href="#" class="button button--arrow cta-section__button">Więcej</a>
        </div>
        <div class="col-24 col-md-12 section section--accent cta-section cta-section--home cta-section--home-end" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/static/img/temp/start-right.png);">
            <p class="text-label color color--white-75">Twój własny biznes</p>
            <h3 class="headline headline--section-small cta-section__headline">Dołącz do nas!</h3>
            <div class="text text--light color color--white-75">
                <p>Jeśli kochasz kawę oraz chcesz dzielić się nią z i,nnymi, wypełnij formularz i stań się częścią zespołu Bike Cafe!</p>
            </div>
            <a href="#" class="button button--arrow button--shadow button--noborder cta-section__button">Więcej</a>
        </div>
    </div>
</div>