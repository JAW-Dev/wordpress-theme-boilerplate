<?php
/**
 * Theme_Name
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();
