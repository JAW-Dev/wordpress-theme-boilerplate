<?php
/**
 * Do Comments Title
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Functions
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

 if ( ! function_exists( 'do_comments_title' ) ) {
	 /**
	  * Comments Title
	  *
	  * @author {{theme-author}}
	  * @since  {{theme-version}}
	  *
	  * @return void
	  */
	 function do_comments_title() {
		 $allowed_tags = array(
			 'span' => array(
				 'class' => array(),
			 ),
		 );
		 $comments_title = new Theme_Namespace\Includes\Classes\Post_Comments_Title;
		 echo wp_kses( $comments_title->render(), $allowed_tags );
	 }
 }
