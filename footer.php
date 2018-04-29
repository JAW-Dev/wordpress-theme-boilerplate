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

if ( ! defined( 'WPINC' ) ) {
	 wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

?>
</main><!-- / #main -->
<?php
get_template_part( 'template-parts/footer', 'main' );
wp_footer();
?>
</body>
</html>
