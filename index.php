<?php
/**
 * Template for displaying the blog index page.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );
$hero_title     = $page_for_posts ? get_the_title( $page_for_posts ) : __( 'Insights', 'cb-njlive2025' );

get_header();
?>
<main class="blog">
	<section class="hero">
		<div class="container h-100">
			<?php if ( $page_for_posts && has_post_thumbnail( $page_for_posts ) ) : ?>
				<div class="hero__image-wrapper">
					<?= get_the_post_thumbnail( $page_for_posts, 'full', array( 'class' => 'hero__image' ) ); ?>
				</div>
			<?php endif; ?>
			<div class="hero__title"><?= esc_html( $hero_title ); ?></div>
		</div>
	</section>
	<section class="latest-posts latest-posts--grid">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="row g-4">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<div class="col-md-6 col-lg-4">
							<article <?php post_class( 'post-card h-100' ); ?>>
								<a href="<?= esc_url( get_permalink() ); ?>" class="post-card__link h-100">
									<div class="post-card__media">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'large', array( 'class' => 'post-card__image' ) ); ?>
										<?php else : ?>
											<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/default-thumbnail.jpg' ); ?>" alt="" class="post-card__image">
										<?php endif; ?>
									</div>
									<div class="post-card__body">
										<!-- <p class="post-card__meta"><?= esc_html( get_the_date() ); ?></p> -->
										<h2 class="post-card__title"><?= esc_html( get_the_title() ); ?></h2>
										<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
									</div>
								</a>
							</article>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="latest-posts__pagination">
					<?php the_posts_pagination(); ?>
				</div>
			<?php else : ?>
				<p class="latest-posts__empty"><?= esc_html__( 'No posts found.', 'cb-njlive2025' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
?>
