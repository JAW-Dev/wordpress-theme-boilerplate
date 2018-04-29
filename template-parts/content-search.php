<?php
/**
 * Content Search
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
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
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
	<div class="entry__excerpt">
		<?php the_excerpt(); ?>
	</div><!-- /.entry__excerpt -->
</article><!-- /#post-<?php the_ID(); ?> -->
