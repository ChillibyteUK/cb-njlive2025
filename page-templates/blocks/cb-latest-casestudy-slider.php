<?php
/**
 * Block template for CB Latest Insights Slider.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>

<section class="latest-insights-slider">
  	<div class="container py-5">
		<div class="slider-bleed-right">
	  		<div class="swiper latest-insights-slider__swiper">
				<div class="swiper-wrapper">
		  			<?php
					$q = new WP_Query(
						array(
							'post_type'      => 'casestudy',
							'posts_per_page' => 6,
						)
					);
		  			if ( $q->have_posts() ) {
						while ( $q->have_posts() ) {
			  				$q->the_post();
							?>
			  		<div class="swiper-slide latest-insights-slider__item">
						<a href="<?php the_permalink(); ?>" class="latest-insights-slider__link">
							<div class="latest-insights-slider__image-wrapper">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'large', array( 'class' => 'latest-insights-slider__image' ) );
								} else {
									echo '<img src="' . esc_url( get_stylesheet_directory_uri() . '/img/default-thumbnail.jpg' ) . '" alt="" class="latest-insights-slider__image">';
								}
								?>
							</div>
							<?php
							if ( get_field( 'card_title', get_the_ID() ) ) {
								?>
				  			<h3 class="latest-insights-slider__title"><?= esc_html( get_field( 'card_title', get_the_ID() ) ); ?></h3>
							<div class="fw-semibold lh-regular"><?=get_field( 'card_subtitle_1', get_the_ID() ) ? esc_html( get_field( 'card_subtitle_1', get_the_ID() ) ) : ''; ?></div>
							<div class="fw-semibold"><?=get_field( 'card_subtitle_2', get_the_ID() ) ? esc_html( get_field( 'card_subtitle_2', get_the_ID() ) ) : ''; ?></div>
								<?php
							} else {
								?>
				  			<h3 class="latest-insights-slider__title"><?php the_title(); ?></h3>
								<?php
							}
							?>
						</a>
			  		</div>
			  				<?php
						}
						wp_reset_postdata();
		  			}
		  			?>
				</div>
	  		</div>
		</div>
  	</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
	new Swiper('.latest-insights-slider__swiper', {
		slidesPerView: 1.25,
		spaceBetween: 24, // adjust as needed
		loop: true,
		loopAdditionalSlides: 3,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		breakpoints: {
			1200: {
			slidesPerView: 2.5,
			},
			992: {
			slidesPerView: 2,
			},
			768: {
			slidesPerView: 1.5,
			},
			576: {
			slidesPerView: 1.25,
			}
		}
	});
});
</script>