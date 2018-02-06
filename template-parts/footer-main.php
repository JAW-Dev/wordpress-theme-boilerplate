<?php
/**
 * Footer Main
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Template_Parts
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

?>
<footer class="site-footer">
	<div class="wrap">
		<section class="site-footer__info">
			<span class="copyright">
				<?php
				// Translators: Theme Name.
				echo esc_html( sprintf( __( '&copy; %s', 'Theme_Textdomain' ), date( 'Y' ) ) );
				?>
			</span>
		</section><!-- / .site-footer__info -->
	</div><!-- / .wrap -->
</footer><!-- / .site-footer -->
