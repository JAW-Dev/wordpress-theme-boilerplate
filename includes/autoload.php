<?php
/**
 * Autoloader
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

namespace Theme_Package\Includes;

/**
 * Autoloader
 *
 * @param string $class Name of the class being requested.
 *
 * @since 1.0.0
 *
 * @return void
 */
function _autoload_classes( $class ) {

	// Get the class name.
	$class = explode( '\\', $class );

	// Full path to the classes directory.
	$path  = trailingslashit( get_stylesheet_directory() ) . trailingslashit( 'includes/classes' );

	// Constructed file with full path to autoload.
	$file  = $path . 'class-' . strtolower( str_replace( '_', '-', end( $class ) ) ) . '.php';

	// Add classes to be excluded from autoloading. example: array( $path . 'class-name.php' );.
	$excludes  = array();

	// Require file if the file exists and is not in the excludes list.
	if ( file_exists( $file ) && ! in_array( $file, $excludes, true ) ) {

		require_once( $file );
	}
}
spl_autoload_register( __NAMESPACE__ . '\\_autoload_classes' );
