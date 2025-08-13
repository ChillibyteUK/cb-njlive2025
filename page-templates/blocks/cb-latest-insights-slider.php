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
							'post_type'      => 'post',
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
				  			<h3 class="latest-insights-slider__title"><?php the_title(); ?></h3>
							<div class="latest-insights-slider__excerpt d-none d-md-block"><?php the_excerpt(); ?></div>
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