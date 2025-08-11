<?php
/**
 * Block template for CB Homepage Cards.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="homepage-cards">
	<div class="container py-5">
		<div class="row g-4">
			<?php
			while ( have_rows( 'cards' ) ) {
				the_row();
				$card_width = get_sub_field( 'width' );
				if ( '2-col' === $card_width ) {
					$card_width = 'col-12';
				} elseif ( '1-col' === $card_width ) {
					$card_width = 'col-lg-6';
				}
				$card_link = get_sub_field( 'link' );
				if ( is_array( $card_link ) && ! empty( $card_link['url'] ) && ! empty( $card_link['title'] ) ) {
					?>
			<div class="<?= esc_attr( $card_width ); ?>" data-aos="fade">
				<a href="<?= esc_url( $card_link['url'] ); ?>" class="homepage-cards__card">
					<?=
					wp_get_attachment_image(
						get_sub_field( 'background' ),
						'large',
						false,
						array(
							'class' => 'homepage-cards__card-image',
						)
					);
					?>
					<div class="overlay"></div>
					<div class="homepage-cards__card-body">
						<h2 class="homepage-cards__card-title"><?= esc_html( get_sub_field( 'title' ) ); ?></h2>
						<div class="homepage-cards__card-inner">
							<p class="homepage-cards__card-text"><?= esc_html( get_sub_field( 'content' ) ); ?></p>
							<?php
							if ( is_array( $card_link ) && ! empty( $card_link['url'] ) && ! empty( $card_link['title'] ) ) {
								?>
								<div class="homepage-cards__link"><?= esc_html( $card_link['title'] ); ?></div>
								<?php
							}
							?>
						</div>
					</div>
				</a>
			</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>