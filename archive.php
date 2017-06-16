<?php
/**
 * Archive
 *
 * {{theme-description}}
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme-author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme_author}}
 * @license   GNU General Public License v2 or later
 * @version   {{theme-version}}
 */

$format = get_post_format() ? : 'standard';
get_header();
if ( have_posts() ) :
?>
	<header class="page__header archive__header category__title">
		<?php
			the_archive_title( '<h1 class="header__title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- /.page__header -->
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_sidebar();
get_footer();
