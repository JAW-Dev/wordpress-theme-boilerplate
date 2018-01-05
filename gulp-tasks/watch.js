/**
 * Watch.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

/* global files, gulp, livereload */

/**
 * Watch
 *
 * @since 1.0.0
 */
gulp.task( 'watch', () => {
	livereload.listen();
	gulp.watch( files.sass, [ 'styles' ]);
	gulp.watch( files.concatScripts, [ 'scripts' ]);
	gulp.watch( files.images, [ 'imagemin' ]);
});
