<?php
/**
 * Load Template Tag Functions.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Template_Tags' ) ) {

	/**
	 * Load Template Tag Functions.
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 */
	class Template_Tags {

		/**
		 * Directory.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @var string dir The directory that contains the template tag functions.
		 */
		protected $dir;

		/**
		 * Initialize the class
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @param string $dir The directory that contains the template tag functions.
		 *
		 * @return void
		 */
		public function __construct( $dir ) {
			// Set the directory path.
			$this->dir = trailingslashit( get_stylesheet_directory() ) . $dir;

			// Include the files.
			$this->include_the_files();
		}

		/**
		 * Initiate.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function include_the_files() {
			// Get the file to include.
			$files = $this->scan_directory( $this->dir );

			// Loop through the files array.
			foreach ( $files as $file ) {

				// Verify that the file exists.
				if ( file_exists( $file ) ) {

					// Include the file.
					include $file;
				}
			}
		}

		/**
		 * Scan the Directory.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return array
		 */
		public function scan_directory() {
			// Declare the results array to return.
			$results = array();

			// Scan the dir for files.
			$files = scandir( $this->dir );

			// Loop through the files in the directory.
			foreach ( $files as $file ) {
				// Exclude . and ..
				if ( ('.' === $file ) || ( '..' === $file ) ) {
					continue;
				}

				// Get the path to the file.
				$file = trailingslashit( $this->dir ) . $file;

				// Get the file header info.
				$header = get_file_data( $file, array( 'Load' => 'Load' ) );

				// Get the file extension.
				$extension = substr( $file, strrpos( $file, '.' ) + 1 );

				// If 'Load' is true and the file is a PHP file.
				if ( 'true' === $header['Load'] && 'php' === $extension ) {
					$results[] = $file;
				}
			}

			// Return the results array.
			return $results;
		}
	}
}
