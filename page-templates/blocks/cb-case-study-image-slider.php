<?php
/**
 * Block template for CB Case Study Image Slider.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="case-study-image-slider py-5 has-slate-background-color">
	<div class="container swiper case-study-image-slider__swiper">
		<div class="swiper-wrapper">
			<?php
			foreach ( get_field( 'images' ) as $image ) {
				$image_url = wp_get_attachment_image_url( $image, 'full' );
				if ( $image_url ) {
					?>
				<div class="case-study-image-slider__item swiper-slide">
					<a href="<?= esc_url( wp_get_attachment_image_url( $image, 'full' ) ); ?>" class="case-study-image-slider__link glightbox" data-gallery="case-study-gallery">
						<?= wp_get_attachment_image( $image, 'large', false, array( 'class' => 'case-study-image-slider__image' ) ); ?>
					</a>
				</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const lightbox = GLightbox({});
	new Swiper('.case-study-image-slider__swiper', {
		slidesPerView: 3,
		spaceBetween: 24, // adjust as needed
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		breakpoints: {
			1200: {
			slidesPerView: 3,
			},
			992: {
			slidesPerView: 2,
			},
			768: {
			slidesPerView: 1,
			},
			576: {
			slidesPerView: 1,
			}
		}
	});
});
</script>