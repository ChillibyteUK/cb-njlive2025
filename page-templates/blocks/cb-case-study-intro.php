<?php
/**
 * Block template for CB Case Study Intro.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="case-study-intro">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		echo '<div class="container">';
		yoast_breadcrumb( '<p class="pb-3 mb-0" id="breadcrumbs">', '</p>' );
		echo '</div>';
	}
	?>
	<div class="container h-100">
		<div class="row h-100 g-5">
			<div class="col-md-5">
				<div class="case-study-intro__hero-wrapper mb-3">
					<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'case-study-intro__hero' ) ); ?>
				</div>
			</div>
			<div class="col-md-7 my-auto">
				<div class="case-study-intro__meta">
					<?php
					$terms = get_the_terms( get_the_ID(), 'case_study_type' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $csterm ) {
							echo '<span class="case-study-intro__category">' . esc_html( $csterm->name ) . '</span>';
						}
					}
					?>
				</div>
				<h1 class="case-study-intro__title"><?= esc_html( get_the_title() ); ?></h1>
				<?php
				echo wp_kses_post( get_field( 'content' ) );
				?>
			</div>
		</div>
	</div>
</section>