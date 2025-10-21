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
					<h1 data-aos="fade">Let's get started</h1>
				</div>
				<div class="col-lg-6 pb-4 py-lg-5 my-auto">
					<ul class="fa-ul contacts">
						<?php
						$d = 0;
						if ( $socials['instagram_url'] ) {
							?>
							<li data-aos="fade-left" data-aos-delay="<?= esc_attr( $d ); ?>"><span class="fa-li"><i class="fa-brands fa-instagram fa-2x"></i></span> <a href="<?= esc_url( $socials['instagram_url'] ); ?>"><?= $socials['instagram_url']; ?></a></li>
							<?php
							$d += 100;
						}
						if ( $socials['linkedin_url'] ) {
							?>
							<li data-aos="fade-left" data-aos-delay="<?= esc_attr( $d ); ?>"><span class="fa-li"><i class="fa-brands fa-linkedin fa-2x"></i></span> <a href="<?= esc_url( $socials['linkedin_url'] ); ?>"><?= $socials['linkedin_url']; ?></a></li>
							<?php
							$d += 100;
						}
						?>
						<li data-aos="fade-left" data-aos-delay="<?= esc_attr( $d ); ?>"><span class="fa-li"><i class="fa-solid fa-paper-plane fa-2x"></i></span> <a href="mailto:<?= antispambot( esc_html( get_field( 'contact_email', 'option' ) ) ); ?>"><?= esc_html( get_field( 'contact_email', 'option' ) ); ?></a></li>
					</ul>
					<div class="row addresses g-5">
						<div class="col-md-6" data-aos="fade-up">
							<h2 class="h4 has-njgreen-color">NJLive London</h2>
							<ul class="fa-ul">
								<li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span> <?= wp_kses_post( get_field( 'contact_address_uk', 'option' ) ); ?></li>
								<li class="mt-2">
									<span class="fa-li"><i class="fa-solid fa-phone"></i></span>
									<a class="has-white-color" href="tel:<?= esc_html( parse_phone( get_field( 'contact_phone', 'option' ) ) ); ?>"><?= esc_html( get_field( 'contact_phone', 'option' ) ); ?></a>
								</li>
							</ul>
						</div>
						<div class="col-md-6" data-aos="fade-up">
							<h2 class="h4 has-njgreen-color">NJLive USA, East Coast</h2>
							<ul class="fa-ul">
								<li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
								<?= wp_kses_post( get_field( 'contact_address_ny', 'option' ) ); ?>
								</li>
							<?php
							if ( get_field( 'contact_phone_ny', 'option' ) ) {
								?>
								<li class="mt-2">
									<span class="fa-li"><i class="fa-solid fa-phone"></i></span>
									<a class="has-white-color" href="tel:<?= esc_html( parse_phone( get_field( 'contact_phone_ny', 'option' ), '+1' ) ); ?>"><?= esc_html( get_field( 'contact_phone_ny', 'option' ) ); ?></a>
								</li>
								<?php
							}
							?>
							</ul>
						</div>
						<div class="col-md-6" data-aos="fade-up">
							<h2 class="h4 has-njgreen-color">NJLive USA, West Coast</h2>
							<ul class="fa-ul">
								<li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
								<?= wp_kses_post( get_field( 'contact_address_ca', 'option' ) ); ?>
								</li>
							<?php
							if ( get_field( 'contact_phone_ca', 'option' ) ) {
								?>
								<li class="mt-2">
									<span class="fa-li"><i class="fa-solid fa-phone"></i></span>
									<a class="has-white-color" href="tel:<?= esc_html( parse_phone( get_field( 'contact_phone_ca', 'option' ), '+1' ) ); ?>"><?= esc_html( get_field( 'contact_phone_ca', 'option' ) ); ?></a>
								</li>
								<?php
							}
							?>
							</ul>
						</div>
						<div class="col-md-6" data-aos="fade-up">
							<h2 class="h4 has-njgreen-color">NJLive USA, North West</h2>
							<ul class="fa-ul">
								<li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
								<?= wp_kses_post( get_field( 'contact_address_wa', 'option' ) ); ?>
								</li>
							<?php
							if ( get_field( 'contact_phone_wa', 'option' ) ) {
								?>
								<li class="mt-2">
									<span class="fa-li"><i class="fa-solid fa-phone"></i></span>
									<a class="has-white-color" href="tel:<?= esc_html( parse_phone( get_field( 'contact_phone_wa', 'option' ), '+1' ) ); ?>"><?= esc_html( get_field( 'contact_phone_wa', 'option' ) ); ?></a>
								</li>
								<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
	  	</div>
   	</section>
</main>
<?php
get_footer();