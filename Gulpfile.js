/*
 * Gulp.
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

/* global require */
/* eslint no-undef: 0 */
/* eslint no-unused-expressions: 0 */

const requireDir    = require( 'require-dir' );
const gulpVars      = require( './tasks/gulp-variables' );


// Require the gulp tasks.
requireDir( './tasks/gulp-tasks', { recurse: true });

gulp.task( 'default', [ 'scripts', 'styles', 'imagemin', 'bump', 'pot' ]);
