<?php
/**
 * Template Name: Page
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Templates
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

get_header();
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', 'page' );
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile;
get_sidebar();
get_footer();
