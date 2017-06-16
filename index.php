<?php
/**
 * {{theme-name}}
 *
 * {{theme-description}}
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme-author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme-author}}
 * @license   GNU General Public License v2 or later
 * @version   {{theme-version}}
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();
