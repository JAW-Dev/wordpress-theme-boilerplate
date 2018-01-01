/**
 * Compile Dist.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

/* global del, dist, gulp, handleErrors, paths, plumber */

/**
 * Delete the dist directory.
 *
 * @since 1.0.0
 */
gulp.task( 'cleanDist', () =>
	del([ paths.dist ])
);

 /**
  * Copy files to the dist directory.
  *
  * @since 1.0.0
  */
gulp.task( 'copy', [ 'cleanDist' ], () =>
	gulp.src( dist )
		.pipe( plumber({'errorHandler': handleErrors}) )
		.pipe( gulp.dest( paths.dist ) )
);

/**
  * Build Dist.
  *
  * @since 1.0.0
  */
gulp.task( 'build', [ 'copy' ]);
