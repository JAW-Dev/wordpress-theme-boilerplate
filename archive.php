<?php
/**
 * Archive
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
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
