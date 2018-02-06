<?php
/**
 * Call Template Function.
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes/Classes
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

namespace Theme_Package\Includes\Classes;

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

if ( ! class_exists( __NAMESPACE__ . '\\Call_Template_Function' ) ) {

	/**
	 * Enqueue Styles
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Call_Template_Function {

		/**
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function __construct() {}

		/**
		 * Initialize.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @param string $callback The function to callback.
		 * @param mixed  ...$args  The arguments for the function.
		 *
		 * @return void
		 */
		public function init( $callback, ...$args ) {
			$this->include_file( $callback );

			call_user_func( $callback, $args );
		}

		/**
		 * Scan the Directory.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @param string $pattern The file to find.
		 *
		 * @return void
		 */
		public function include_file( $pattern ) {

			if ( null == $pattern ) {
				return;
			}

			// Recursively scan the dirs for files.
			$files = new \RecursiveDirectoryIterator( trailingslashit( get_stylesheet_directory() ) . trailingslashit( 'includes/functions' ) );

			// Loop through the files.
			foreach ( new \RecursiveIteratorIterator( $files ) as $file ) {
				$filename = 'Theme_Textdomain_' . $file->getFilename();
				$filepath = $file->getPathname();

				// Exclude dot files.
				if ( '.' === substr( $filename, 0, 1 ) ) {
					continue;
				}

				// Get the path to the file.
				$file = $filepath;

				// Get the file extension.
				$extension = substr( $file, strrpos( $file, '.' ) + 1 );

				// If 'Load' is true and the file is a PHP file.
				if ( $filename == $pattern . '.php' ) {

					include $file;
				}
			}
		}
	}
}
