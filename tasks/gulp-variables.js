/*
 * Gulp Variables.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

args           = require( 'yargs' ).argv;
autoprefixer   = require( 'autoprefixer' );
babel          = require( 'gulp-babel' );
browserSync    = require( 'browser-sync' ).create();
bump           = require( 'gulp-bump' );
concat         = require( 'gulp-concat' );
cssnano        = require( 'gulp-cssnano' );
del            = require( 'del' );
fs             = require( 'fs' );
gulp           = require( 'gulp' );
gulpUtil       = require( 'gulp-util' );
imagemin       = require( 'gulp-imagemin' );
notify         = require( 'gulp-notify' );
plumber        = require( 'gulp-plumber' );
postcss        = require( 'gulp-postcss' );
rename         = require( 'gulp-rename' );
replace        = require( 'gulp-replace' );
sass           = require( 'gulp-sass' );
sassLint       = require( 'gulp-sass-lint' );
sort           = require( 'gulp-sort' );
sourcemaps     = require( 'gulp-sourcemaps' );
webpack        = require( 'webpack' );
webpackStream  = require( 'webpack-stream' );
wpPot          = require( 'gulp-wp-pot' );
UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );
paths          = {
	'styles': './',
	'images': 'assets/images',
	'scripts': 'assets/scripts',
	'sass': 'assets/styles/sass',
	'dist': './dist',
};
files = {
	'css': paths.styles + '/*.css',
	'cssmin': paths.styles + '/*.min.css',
	'concatScripts': paths.scripts + '/concat/*.js',
	'html': [ './*.html', './**/*.html' ],
	'images': paths.images + '/*',
	'svg': paths.images + '/*.svg',
	'js': paths.scripts + '/*.js',
	'jsmin': paths.scripts + '/*.min.js',
	'php': [ './*.php', './**/*.php' ],
	'sass': paths.sass + '/**/*.scss',
	'styles': paths.styles + '/style.css',
};
dist = [
	'./**/*',
	'!bin',
	'!bin/**',
	'!dist',
	'!dist/**',
	'!git',
	'!git/**',
	'!gulp-tasks',
	'!gulp-tasks/**',
	'!node_modules',
	'!node_modules/**',
	'!tests',
	'!tests/**',
	'!' + paths.sass,
	'!' + paths.sass + '/**',
	'!' + paths.scripts,
	'!' + paths.scripts + '/**',
	'!.bablerc',
	'!.editorconfig',
	'!.eslintrc.js',
	'!.gitignore',
	'!.sas-lint.yml',
	'!.travis.yml',
	'!Gulpfile.js',
	'!package-lock.json',
	'!package.json',
	'!phpcs.xml',
	'!phpmd.xml',
	'!phpunit.xml',
	'!yarn.lock',
],
getPackageJson = () => { // Get the package.json file content
	return JSON.parse( fs.readFileSync( './package.json', 'utf8' ) );
};
handleErrors = ( err ) => { // Handle the errors.
	notify.onError({
		title: 'Error!',
		message: '<%= error.message %>',
		sound: 'Beep',
	})( err );
	return plumber();
};
