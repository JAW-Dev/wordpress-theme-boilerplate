/**
 * Bump Project Version.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 *
 * 1. gulp bump                    : Bumps the package.json and bower.json to the next minor revision.
 * 2. gulp bump --version 1.1.1    : Bumps/sets the package.json and bower.json to the specified revision.
 * 3. gulp bump --type major       : Bumps to 1.0.0.
 *    gulp bump --type minor       : Bumps to 0.1.0.
 *    gulp bump --type patch       : Bumps to 0.0.2.
 *    gulp bump --type prerelease  : Bumps to 1.0.0-2.
 */

/* global args, bump, getPackageJson, gulp, handleErrors, plumber, replace */

/**
 * package.json version bump.
 *
 * @since 1.0.0
 */
gulp.task( 'packageBump', () => {
	var type = args.type,
		version = args.version,
		options = {};
	if ( version ) {
		options.version = version;
	} else {
		options.type = type;
	}
	return gulp.src([ './package.json' ])
		.pipe( plumber({'errorHandler': handleErrors}) )
		.pipe( bump( options ) )
		.pipe( gulp.dest( './' ) );
});

/**
 * All files version bump.
 *
 * @since 1.0.0
 */
gulp.task( 'bump', [ 'packageBump' ], () => {
	var pkg = getPackageJson(),
		filePaths = [
			'!node_modules/',
			'!node_modules/**',
			'!Gulpfile.js',
			'!package.json',
			'!./gulp-tasks/bump.js',
			'./**/*',
			'./dist',
		];
	gulp.src( filePaths, {
		base: './',
		dot: false,
	})
	.pipe( plumber({'errorHandler': handleErrors}) )
	.pipe( replace( /@since[ \t]+NEXT/g, '@since ' + pkg.version ) )
	.pipe( replace( /@version(?!\s\s\s\s)\s\s\s(.*)/g, '@version   ' + pkg.version ) )
	.pipe( replace( /@version\s\s\s\s(.*)/g, '@version    ' + pkg.version ) )
	.pipe( replace( /@version(.*)/g, '@version ' + pkg.version ) )
	.pipe( gulp.dest( './' ) );
});
