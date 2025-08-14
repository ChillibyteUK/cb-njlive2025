<?php
/**
 * Template Name: Services
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
?>
<main class="services">
   	<section class="services-hero">
		<div class="container">
			<h1>Our Services</h1>
	  	</div>
   	</section>
   	<section class="services-list pb-5">
	  	<div class="container pb-5">
		 	<div class="accordion" id="services-list">
		 	<?php
			while ( have_rows( 'service' ) ) {
				the_row();
				$service_title       = get_sub_field( 'service_title' );
				$service_description = get_sub_field( 'service_description' );
				$collapse_id         = 'service-' . esc_attr( sanitize_title( $service_title ) );
				if ( have_rows( 'service_highlights' ) ) {
					$left_col = 'col-lg-6';
				} else {
					$left_col = 'col-lg-8';
				}
				?>
				<div class="accordion-item">
			   		<h2 class="accordion-header" id="heading-<?= esc_attr( $collapse_id ); ?>">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
							<?= esc_html( $service_title ); ?>
						</button>
			   		</h2>
			   		<div id="<?= esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc_attr( $collapse_id ); ?>" data-bs-parent="#services-list">
				  		<div class="accordion-body">
					 		<div class="row">
								<div class="<?= esc_attr( $left_col ); ?> text-lg">
						   			<p><?= wp_kses_post( $service_description ); ?></p>
								</div>
								<?php
								if ( have_rows( 'service_highlights' ) ) {
									?>
								<div class="col-lg-5 offset-lg-1 service-highlights py-4 px-lg-0">
									<?php
									while ( have_rows( 'service_highlights' ) ) {
										the_row();
										$highlight = get_sub_field( 'service_highlight' );
										?>
										<div class="service-highlight"><?= esc_html( $highlight ); ?></div>
										<?php
									}
									?>
								</div>
									<?php
								}
								?>
					 		</div>
				  		</div>
			   		</div>
				</div>
				<?php
			}
			?>
		 	</div>
	  	</div>
   	</section>
</main>
<?php
get_footer();