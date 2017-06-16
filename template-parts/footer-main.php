<?php
/**
 * Footer Main
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */
?>
<footer class="site-footer">
	<div class="wrap">
		<section class="site-footer__info">
			<span class="copyright"><?php echo esc_html( sprintf( __( '{{theme-name}} &copy; %s', '{{theme-textdomain}}' ), date( 'Y' ) ) ); ?></span>
		</section><!-- / .site-footer__info -->
	</div><!-- / .wrap -->
</footer><!-- / .site-footer -->
