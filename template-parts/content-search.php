<?php
/**
 * Content Search
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
		<?php
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		if ( 'post' === get_post_type() ) : ?>
			<div class="header__meta">
				<?php
				do_post_published();
				do_post_updated();
				do_author_byline();
				?>
			</div><!-- /.header__meta -->
		<?php
		endif; ?>
	</header><!-- /.entry__header -->
	<div class="entry__excerpt">
		<?php the_excerpt(); ?>
	</div><!-- /.entry__excerpt -->
</article><!-- /#post-<?php the_ID(); ?> -->
