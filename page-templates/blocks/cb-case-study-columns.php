<?php
/**
 * Block template for CB Case Study Columns.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="case-study-columns has-green-background-color py-5">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-lg-6 px-md-5">
				<h3 class="text-4xl fw-extrabold pb-3"><?= esc_html( get_field( 'left_title' ) ); ?></h3>
				<div><?= wp_kses_post( get_field( 'left_content' ) ); ?></div>
			</div>
			<div class="col-lg-6 px-md-5">
				<h3 class="text-4xl fw-extrabold pb-3"><?= esc_html( get_field( 'right_title' ) ); ?></h3>
				<div><?= wp_kses_post( get_field( 'right_content' ) ); ?></div>
			</div>
		</div>
	</div>
</section>