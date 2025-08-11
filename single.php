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
	<div class="container">
		<?php
		$post_cat = get_the_category();
		?>
		<div class="single-blog__category">
			<?= esc_html( $post_cat[0]->name ); ?>
		</div>
		<div class="row">
			<div class="col-lg-7 order-lg-2 my-auto">
				<div class="post_hero">
					<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'single-blog__image' ) ); ?>
				</div>
			</div>
			<div class="col-lg-5 order-lg-1 my-auto">
		        <h1><?= esc_html( get_the_title() ); ?></h1>
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