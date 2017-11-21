<?php
/**
 * Content
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="header__title">', '</h1>' );
		else :
			the_title( '<h2 class="header__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( has_post_thumbnail() ) :
			?>
			<figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>
			<?php
		endif;
		if ( 'post' === get_post_type() ) :
		?>
			<div class="header__meta">
				<?php
				wp_dl_post_published();
				wp_dl_post_updated();
				wp_dl_post_author_byline();
				?>
			</div><!-- /.header__meta -->
		<?php endif; ?>
	</header><!-- /.entry__header -->
	<div class="entry__content">
		<?php
			the_content( wp_dl_content_more_text() );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '{{theme-textdomain}}' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- /.entry__content -->
</article><!-- /#post-<?php the_ID(); ?> -->
