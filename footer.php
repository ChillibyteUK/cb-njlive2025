<?php
/**
 * Footer template for the CB TXP theme.
 *
 * This file contains the footer section of the theme, including navigation menus,
 * office addresses, and colophon information.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_page( 'contact' ) ) {
	// Include the contact CTA block if not on the contact page.
	get_template_part( 'page-templates/blocks/cb-contact-cta' );
}
?>
<div id="footer-top"></div>
<footer class="footer pb-4">
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-12 text-center">
				&copy; <?= esc_html( gmdate( 'Y' ) ); ?> NJ Live is part of the Human Network Group of companies, legally trading as NJ Live Ltd, a company registered in England and Wales Company Number 04786124.
            </div>
            <div class="col-lg-6 offset-lg-3 text-center">
				<a href="/privacy-policy/" class="text-decoration-none">Privacy Policy</a> |
				<a href="/cookie-policy/" class="text-decoration-none">Cookie Policy</a> |
            </div>
			<div class="col-lg-3 text-center text-lg-end">
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>