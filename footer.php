<?php
/**
 * Footer
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme-author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme-author}}
 * @license   GNU General Public License v2 or later
 * @version   {{theme-version}}
 */

do_action( 'before_main_close' );
?>
</main><!-- / #main -->
<?php
do_action( 'before_footer_main' );
	get_template_part( 'template-parts/footer', 'main' );
do_action( 'before_wp_footer' );
	wp_footer();
do_action( 'after_wp_footer' );
do_action( 'before_body_close' );
?>
</body>
<?php do_action( 'after_body' ); ?>
</html>
