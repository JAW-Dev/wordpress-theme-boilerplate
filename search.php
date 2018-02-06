<?php
/**
 * Search
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

get_header();
if ( have_posts() ) :
	?>
	<header class="page__header">
		<h1 class="header__title">
			<?php
			/* translators: search results */
			printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</header><!-- /.page__header -->
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'search' );
		the_post_navigation();
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
endif;
get_sidebar();
get_footer();
