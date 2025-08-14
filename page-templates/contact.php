<?php
/**
 * Template Name: Contact
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

get_header();
the_post();
$socials = get_field( 'social', 'option' );
?>
<main class="contact">
	<section class="contact-list pb-5">
		<div class="container pb-5">
			<div class="row">
				<div class="col-lg-6 py-lg-5 my-auto">
					<h1>Contact us</h1>
				</div>
				<div class="col-lg-6 pb-4 py-lg-5 my-auto">
					<ul class="fa-ul">
						<?php
						if ( $socials['instagram_url'] ) {
							?>
							<li><span class="fa-li"><i class="fa-brands fa-instagram fa-2x"></i></span> <a href="<?= esc_url( $socials['instagram_url'] ); ?>"><?= $socials['instagram_url']; ?></a></li>
							<?php
						}
						if ( $socials['linkedin_url'] ) {
							?>
							<li><span class="fa-li"><i class="fa-brands fa-linkedin fa-2x"></i></span> <a href="<?= esc_url( $socials['linkedin_url'] ); ?>"><?= $socials['linkedin_url']; ?></a></li>
							<?php
						}
						?>
						<li><span class="fa-li"><i class="fa-solid fa-paper-plane fa-2x"></i></span> <a href="mailto:<?= antispambot( esc_html( get_field( 'contact_email', 'option' ) ) ); ?>"><?= esc_html( get_field( 'contact_email', 'option' ) ); ?></a></li>
						<li><span class="fa-li"><i class="fa-solid fa-phone fa-2x"></i></span> <a href="tel:<?= esc_html( parse_phone( get_field( 'contact_phone', 'option' ) ) ); ?>"><?= esc_html( get_field( 'contact_phone', 'option' ) ); ?></a></li>
					</ul>
				</div>
			</div>
	  	</div>
   	</section>
</main>
<?php
get_footer();