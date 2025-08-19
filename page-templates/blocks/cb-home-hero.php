<?php
/**
 * Block template for CB Homepage Hero.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="cb-homepage-hero">
	<div class="cb-homepage-hero__image-wrapper">
		<?php
		$images = get_field( 'images' );
		if ( $images && is_array( $images ) && count( $images ) > 0 ) {
			?>
			<section class="image_hero">
				<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
					<div class="carousel-inner">
						<?php
						foreach ( $images as $index => $image ) {
							?>
							<div class="carousel-item <?= 0 === $index ? 'active' : ''; ?>">
								<?php echo wp_get_attachment_image( $image['ID'], 'full', false, array( 'class' => 'cb-homepage-hero__image d-block w-100' ) ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</section>
			<?php
		} else {
			$vimeo_id = get_field( 'vimeo_id' );
			if ( $vimeo_id ) {
				if ( get_field( 'video_poster' ) ) {
					$bg_image_url = wp_get_attachment_image_url( get_field( 'video_poster' ), 'full' );
				} else {
					$bg_image_url = get_vimeo_data_from_id( $vimeo_id, 'thumbnail_url' );
				}
				?>
		<img src="<?= esc_url( $bg_image_url ); ?>" alt="" class="cb-homepage-hero__image">
		<div class="vimeo-container">
			<iframe src="https://player.vimeo.com/video/<?= esc_attr( $vimeo_id ); ?>?api=1&background=1&autoplay=1&loop=1" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
		</div>
				<?php
			}
		}
		?>
	</div>
</div>