<?php
/**
 * Page
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
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'page' );
	the_post_navigation();
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile;
get_sidebar();
get_footer();
