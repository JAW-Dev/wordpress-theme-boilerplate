/**
 * Compile Scripts.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

/* global babel, concat, del, files, gulp, handleErrors, paths, plumber, rename, sourcemaps, webpack, webpackStream, uglify */

const js = [ files.js, '!' + files.jsmin ];
const webpackConfig = require( './../../webpack.config.js' );

/**
 * Delete index.js and index.min.js before we minify and optimize
 *
 * @since 1.0.0
 */
gulp.task( 'cleanScripts', () =>
	del([ files.js, files.jsmin ])
);

/**
 * Concatenate and transform JavaScript.
 *
 * @since 1.0.0
 */
gulp.task( 'concat', () =>
	gulp.src( files.concatScripts )
		.pipe( plumber({'errorHandler': handleErrors}) )
		.pipe( sourcemaps.init() )
		.pipe( babel({ presets: [ 'latest' ] }) )
		.pipe( concat( 'script.js' ) )
		.pipe( sourcemaps.write() )
		.pipe( gulp.dest( paths.scripts ) )
);

/**
 * Webpack.
 *
 * @since 1.0.0
 */
gulp.task( 'webpack', [ 'concat' ], () => {
	gulp.src( './' + paths.scripts + '/script.js' )
		.pipe( webpackStream( webpackConfig ), webpack )
		.pipe( gulp.dest( paths.scripts ) );
});

/**
  * Compile JavaScript.
  *
  * @since 1.0.0
  */
gulp.task( 'scripts', [ 'webpack' ]);
