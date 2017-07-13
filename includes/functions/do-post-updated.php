<?php
/**
 * Do Post Published
 *
 * Load: true
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Functions
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

if ( ! function_exists( 'do_post_updated' ) ) {
	/**
	 * Post Updated
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 *
	 * @return void
	 */
	function do_post_updated() {
		$allowed_tags = array(
			'time' => array(
				'class'    => array(),
				'datetime' => array(),
			),
			'a'    => array(
				'href' => array(),
				'rel'  => array(),
			),
			'span' => array(
				'class' => array(),
			),
		);
		$update = new Theme_Namespace\Includes\Classes\Post_Updated;
		echo wp_kses( $update->render(), $allowed_tags );
	}
}
