<?php
/**
 * Block template for CB Column Hero.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="column-hero">
	<div class="container py-5">
		<div class="row align-items-center g-5">
			<div class="col-lg-7 position-relative">
				<div class="column-hero__image-wrapper">
					<?php
					if ( get_field( 'hero_image' ) ) {
						echo wp_get_attachment_image( get_field( 'hero_image' ), 'full', false, array( 'class' => 'column-hero__image' ) );
					} else {
						echo '<img src="' . esc_url( get_stylesheet_directory_uri() . '/img/default-thumbnail.jpg' ) . '" alt="" class="column-hero__image">';
					}
					?>
				</div>
				<h1 class="column-hero__title" data-aos="fade"><?= esc_html( get_field( 'hero_title' ) ); ?></h1>
			</div>
			<div class="col-lg-5 text-2xl">
				<div class="column-hero__intro" data-aos="fade" data-aos-delay="300"><?= esc_html( get_field( 'intro' ) ); ?></div>
				<div class="highlight-wrap" data-aos="fade" data-aos-delay="600">
					<div class="highlight-text"><?= esc_html( get_field( 'highlight' ) ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
// Wait for highlight to become visible (AOS fade complete), then reveal
document.addEventListener('DOMContentLoaded', () => {
	const el = document.querySelector('.highlight-text');
  	if (!el) return;
  	const wrap = el.closest('.highlight-wrap');
  	// Fallback: Use MutationObserver to detect when .highlight-wrap is visible
  	const DELAY = 800; // ms
  	const reveal = () => setTimeout(() => el.classList.add('reveal'), DELAY);
  	const observer = new MutationObserver(() => {
		if (wrap && wrap.offsetParent !== null) {
			reveal();
			observer.disconnect();
		}
	});
  	observer.observe(document.body, { attributes: true, childList: true, subtree: true });
  	// Also listen for aos:in event if AOS is present
  	document.addEventListener('aos:in', function handler(e) {
		if (e.target === wrap) {
	  		reveal();
	  		document.removeEventListener('aos:in', handler);
	  		observer.disconnect();
		}
  	});
});
</script>