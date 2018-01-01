<?php
/**
 * Load Template Tag Functions.
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes/Classes
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

namespace Theme_Package\Includes\Classes;

if ( ! class_exists( 'Template_Tags' ) ) {

	/**
	 * Load Template Tag Functions.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Template_Tags {

		/**
		 * Directory.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string dir The directory that contains the template tag functions.
		 */
		protected $dir;

		/**
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
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
		 * @author Theme_Author
		 * @since  1.0.0
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
		 * @author Theme_Author
		 * @since  1.0.0
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
				if ( ( '.' === $file ) || ( '..' === $file ) ) {
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
