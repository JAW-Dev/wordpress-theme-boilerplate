<?php
/**
 * Template Tags
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

/**
 * Include all the files in the functions folder.
 */
foreach ( glob( trailingslashit( get_stylesheet_directory() ) . 'includes/functions/*.php' ) as $file ) {
	if ( file_exists( $file ) ) {
		include $file;
	}
}
