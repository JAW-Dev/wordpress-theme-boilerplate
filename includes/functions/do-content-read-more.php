<?php
/**
 * Do Content Read More
 *
 * @package   {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Functions
 * @author    {{theme-author}} <{{theme_author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme_author}}
 * @license   GNU General Public License v2 or later
 * @since     {{theme-version}}
 */

 if ( ! function_exists( 'do_content_read_more' ) ) {
	 /**
	  * Content More Link
	  *
	  * @author {{theme_author}}
	  * @since  {{theme-version}}
	  *
	  * @return string The Content read more text.
	  */
	 function do_content_read_more() {
		 $allowed_tags = array(
			 'span' => array(
				 'class' => array(),
			 ),
		 );
		 $content_more = new Theme_Namespace\Includes\Classes\Content_More;
		 return wp_kses( $content_more->render(), $allowed_tags );
	 }
 }
