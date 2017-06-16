<?php
/**
 * Content Page
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry__content">
		<?php
			the_content( do_content_read_more() );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '{{theme-textdomain}}' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
