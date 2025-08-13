<?php
/**
 * Block template for CB Team Slider.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="team-slider">
  	<div class="container py-5">
		<h1 class="team-slider__title" data-aos="fade">Player Profiles</h1>
		<div class="slider-bleed-right">
	  		<div class="swiper team-slider__swiper">
				<div class="swiper-wrapper">
		  			<?php
					$q = new WP_Query(
						array(
							'post_type'      => 'person',
							'posts_per_page' => -1,
						)
					);
		  			if ( $q->have_posts() ) {
						while ( $q->have_posts() ) {
			  				$q->the_post();
							?>
					<div class="swiper-slide team-slider__item">
						<div class="team-slider__card">
							<?= get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'team-slider__image' ) ); ?>
							<div class="team-slider__detail">
								<h3 class="team-slider__name"><?= esc_html( get_the_title() ); ?></h3>
								<div class="team-slider__role"><?= esc_html( get_field( 'role', get_the_ID() ) ); ?></div>
							</div>
						</div>
					</div>
							<?php
						}
						wp_reset_postdata();
					}
		  			?>
				</div>
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
	new Swiper('.team-slider__swiper', {
		slidesPerView: 1.25,
		spaceBetween: 24, // adjust as needed
		loop: true,
		autoplay: false,
		breakpoints: {
			1200: {
			slidesPerView: 3.5,
			},
			992: {
			slidesPerView: 2.5,
			},
			768: {
			slidesPerView: 1.5,
			},
			576: {
			slidesPerView: 1.25,
			}
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
	});
});
</script>