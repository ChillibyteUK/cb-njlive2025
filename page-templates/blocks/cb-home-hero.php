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
		// images take precedence over video.
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
			$video_url = get_field( 'video_url' );
			if ( $video_url ) {
				$poster = get_field( 'video_poster' );
				?>
				<section class="video_hero">
					<div class="ratio ratio-16x9">
						<picture>
							<source srcset="<?= esc_attr( wp_get_attachment_image_srcset( $poster, 'full' ) ); ?>" type="image/jpeg">
							<img 
								src="<?= esc_url( wp_get_attachment_url( $poster ) ); ?>" 
								alt="Poster image"
							>
						</picture>
						<video class="absolute inset-0 h-full w-full" autoplay="" loop="" muted="" playsinline="" x-ref="video">
							<source src="<?= esc_url( $video_url ); ?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
				</section>
				<?php
			} else {
				$bg_image = get_field( 'video_poster' );
				echo wp_get_attachment_image( $bg_image, 'full', false, array( 'class' => 'cb-homepage-hero__image' ) );
			}
		}
		?>
	</div>
</div>