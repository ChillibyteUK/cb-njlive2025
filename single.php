<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="single-blog">
	<div class="container py-5">
		<?php
		$post_cat = get_the_category();
		?>
		<!-- <div class="single-blog__category">
			<?= esc_html( $post_cat[0]->name ); ?>
		</div> -->
		<div class="row">
			<div class="col-lg-12 my-auto">
				<a href="/insights/" class="single-blog__back-link mb-3 d-block"><?= esc_html__( 'Back to Insights', 'cb-njlive2025' ); ?></a>
				<h1><?= esc_html( get_the_title() ); ?></h1>
				<div class="post_hero mb-4">
					<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'single-blog__image' ) ); ?>
				</div>
			</div>
			<div class="col-lg-12 my-auto">
				<div class="single-content">
					<?php
					echo wp_kses_post( get_the_content() );
					?>
				</div>
			</div>
		</div>
    </div>
</main>
<?php
get_footer();
?>