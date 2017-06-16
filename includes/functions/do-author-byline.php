<?php
/**
 * Do Author Byline
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Functions
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

 if ( ! function_exists( 'do_author_byline' ) ) {
	 /**
	  * Author Byline
	  *
	  * @author {{theme_author}}
	  * @since  {{theme-version}}
	  *
	  * @return void
	  */
	 function do_author_byline() {
		 $allowed_tags = array(
			 'a'   => array(
				 'href' => array(),
				 'class'  => array(),
			 ),
			 'span' => array(
				 'class' => array(),
			 ),
		 );
		 $author_byline = new Theme_Namespace\Includes\Classes\Post_Author_Byline;
		 echo wp_kses( $author_byline->render(), $allowed_tags );
	 }
 }
