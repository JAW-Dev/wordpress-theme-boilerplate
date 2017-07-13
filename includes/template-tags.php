<?php
/**
 * Template Tags
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

/**
 * Include all the files in the functions folder.
 *
 * @param string $dir The directory to scan.
 *
 * @return array
 */
 function load_files( $dir ) {

	 // Declare the results array to return.
	 $results = array();

	 // Scan the dir for files.
	 $files = scandir( $dir );

	 // Loop through the files in the directory.
	 foreach ( $files as $file ) {
		 // Exclude . and ..
		 if ( ('.' === $file ) || ( '..' === $file ) ) {
			 continue;
		 }

		 // Get the path to the file.
		 $file = trailingslashit( $dir ) . $file;

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

// Get the file to include.
$files = load_files( trailingslashit( get_stylesheet_directory() ) . 'includes/functions' );

// Loop through the files array.
foreach ( $files as $file ) {

	// Verify that the file exists.
	if ( file_exists( $file ) ) {

		// Include the file.
		include $file;
	}
}
