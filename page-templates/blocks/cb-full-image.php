<?php
/**
 * Block template for CB Full Image.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="full-image">
	<?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'full-image__image' ) ); ?>
</section>