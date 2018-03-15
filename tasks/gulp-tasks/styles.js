/**
 * Compile Styles.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

/* global autoprefixer, cssnano, del, files, gulp, handleErrors, paths, plumber, postcss, rename, sass, sourcemaps */

/**
 * Delete style.css and style.min.css before we minify and optimize
 *
 * @since 1.0.0
 */
gulp.task( 'cleanStyles', () =>
	del([ files.css, files.cssmin ])
);

/**
 * Compile Sass and run stylesheet through PostCSS.
 *
 * @since 1.0.0
 */
gulp.task( 'compileStyles', [ 'cleanStyles' ], () =>
	gulp.src( files.sass, [ files.css, ! files.cssmin ])
		.pipe( plumber({'errorHandler': handleErrors}) )
		.pipe( sourcemaps.init() )
		.pipe( sass({'errLogToConsole': true, 'outputStyle': 'expanded'}) )
		.pipe( postcss([ autoprefixer({'browsers': [ 'last 2 version' ]}) ]) )
		.pipe( sourcemaps.write() )
		.pipe( gulp.dest( paths.styles ) )
	);

/**
 * Minify and optimize style.css.
 *
 * @since 1.0.0
 */
gulp.task( 'minifyStyles', [ 'compileStyles' ], () =>
gulp.src( files.styles )
	.pipe( plumber({'errorHandler': handleErrors}) )
	.pipe( cssnano({'safe': true, discardComments: {removeAll: true}}) )
	.pipe( rename( 'style.min.css' ) )
	.pipe( gulp.dest( paths.styles ) )
);

/**
  * Compile Styles.
  *
  * @since 1.0.0
  */
gulp.task( 'styles', [ 'minifyStyles' ]);
