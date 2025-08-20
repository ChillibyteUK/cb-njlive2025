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
    the_post();
    the_content();
	?>
</main>
<?php
get_footer();
?>