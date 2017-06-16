<?php
/**
 * Search
 *
 * {{theme-description}}
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme_author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme_author}}
 * @license   GNU General Public License v2 or later
 * @version   {{theme-version}}
 */

get_header();
if ( have_posts() ) :
	?>
	<header class="page__header">
		<h1 class="header__title">
			<?php printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</header><!-- /.page__header -->
	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'search' );
		the_post_navigation();
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
endif;
get_sidebar();
get_footer();
