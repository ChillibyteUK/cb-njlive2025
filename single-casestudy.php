<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="casestudy">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		echo '<section class="has-green-background-color">';
		echo '<div class="container">';
		yoast_breadcrumb( '<p class="pt-4 mb-0" id="breadcrumbs">', '</p>' );
		echo '</div>';
		echo '</section>';
	}
    the_post();
    the_content();
	?>
</main>
<?php
get_footer();
?>