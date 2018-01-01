<?php
/**
 * Footer
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
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
