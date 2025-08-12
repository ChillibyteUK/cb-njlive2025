<?php
/**
 * Template for displaying the blog index page.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );

get_header();
?>
<main class="blog">
	<section class="hero">
		<div class="container h-100">
			<div class="hero__image-wrapper">
				<?=
				get_the_post_thumbnail(
					$page_for_posts,
					'full',
					array(
						'class'    => 'hero__image',
						'data-aos' => 'zoom-out',
					)
				);
				?>
			</div>
			<div class="hero__title" data-aos="fade">Insights</div>
		</div>
	</section>
	<?php
	$categories = get_categories(
		array(
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);
	?>
	<section class="latest-posts">
		<div class="container" id="latest-posts">
			<?php
			$n = 1;
			foreach ( $categories as $c ) {
				?>
			<div class="latest-posts__row" data-aos="fade-right">
				<div class="column-header collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#category-<?= esc_attr( $c->slug ); ?>" aria-expanded="false" aria-controls="category-<?= esc_attr( $c->slug ); ?>">
					<div class="column-number"><?= esc_html( $n ); ?></div>
					<div class="column-title">
						<?= esc_html( $c->name ); ?>
					</div>
				</div>
				<div id="category-<?= esc_attr( $c->slug ); ?>" class="latest-posts__content collapse mt-3" data-bs-parent="#latest-posts">
					<div class="swiper latest-posts__swiper" style="width:100%;">
						<div class="swiper-wrapper">
							<?php
							$args = array(
								'post_type'      => 'post',
								'posts_per_page' => -1,
								'category_name'  => $c->slug,
							);
							$q    = new WP_Query( $args );
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
										<div class="latest-insights-slider__excerpt"><?php the_excerpt(); ?></div>
									</a>
								</div>
								<?php
							}
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
				<?php
				++$n;
			}
			?>
		</div>
	</section>
</main>
<!-- Swiper CSS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	// Find all swipers in the latest-posts section
	document.querySelectorAll('.latest-posts__swiper').forEach(function(swiperEl, idx) {
		new Swiper(swiperEl, {
			slidesPerView: 2.5,
			spaceBetween: 24,
			navigation: false,
			arrows: false,
			loop: false,
			// Optional: responsive breakpoints
			breakpoints: {
				0: { slidesPerView: 1.2 },
				768: { slidesPerView: 2.5 }
			}
		});
	});
});
</script>
<?php
get_footer();
?>