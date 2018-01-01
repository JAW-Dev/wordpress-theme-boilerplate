<?php
/**
 * Single
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

get_header();
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', get_post_format() );
	the_post_navigation();
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile;
get_sidebar();
get_footer();
