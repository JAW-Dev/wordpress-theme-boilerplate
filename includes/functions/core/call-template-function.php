<?php
/**
 * Call Template Function.
 *
 * Load: true
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes/Functions
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

if ( ! function_exists( 'Theme_Textdomain_call_template_function' ) ) {
	/**
	 * Example Function.
	 *
	 * @author Jason Witt
	 * @since  1.0.0
	 *
	 * @param string $callback The function to callback.
	 * @param mixed  ...$args  The arguments for the function.
	 *
	 * @return string
	 */
	function Theme_Textdomain_call_template_function( $callback, ...$args ) {
		$call_template_function = new Theme_Package\Includes\Classes\Call_Template_Function();
		return $call_template_function->init( $callback, $args );
	}
}
