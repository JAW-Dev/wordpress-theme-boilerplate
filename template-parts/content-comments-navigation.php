<?php
/**
 * Comments Navigation
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Template_Parts
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

?>
<nav id="comment-nav-above" class="navigation comment__navigation" role="navigation">
	<h2 class="screen-reader-text">
		<?php esc_html_e( 'Comment navigation', 'Theme_Textdomain' ); ?>
	</h2>
	<div class="navigation__links">
		<div class="links__previous">
			<?php previous_comments_link( esc_html__( 'Older Comments', 'Theme_Textdomain' ) ); ?>
		</div><!-- /.links__previous -->
		<div class="links__next">
			<?php next_comments_link( esc_html__( 'Newer Comments', 'Theme_Textdomain' ) ); ?>
		</div><!-- /.links__next -->
	</div><!-- /.nav-links -->
</nav><!-- /.comment__navigation -->
