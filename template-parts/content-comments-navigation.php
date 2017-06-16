<?php
/**
 * Comments Navigation
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */
?>
<nav id="comment-nav-above" class="navigation comment__navigation" role="navigation">
	<h2 class="screen-reader-text">
		<?php esc_html_e( 'Comment navigation', '{{theme-textdomain}}' ); ?>
	</h2>
	<div class="navigation__links">
		<div class="links__previous">
			<?php previous_comments_link( esc_html__( 'Older Comments', '{{theme-textdomain}}' ) ); ?>
		</div><!-- /.links__previous -->
		<div class="links__next">
			<?php next_comments_link( esc_html__( 'Newer Comments', '{{theme-textdomain}}' ) ); ?>
		</div><!-- /.links__next -->
	</div><!-- /.nav-links -->
</nav><!-- /.comment__navigation -->
