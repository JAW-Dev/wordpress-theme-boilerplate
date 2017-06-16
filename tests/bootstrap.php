<?php
/**
 * Test Bootstrapper.
 *
 * @since   1.0.0
 * @package Pro_Dev_Tools
 */

// Get our tests directory.
$_tests_dir = '/tmp/wordpress-tests-lib';

// Include our tests functions.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually require our plugin for testing.
 *
 * @since 1.0.0
 */
function _manually_load_plugins() {

	// Require our plugin.
	if ( file_exists( trailingslashit( PROJECT_DIR ) . 'plugin-file-name.php' ) ) {
		require dirname( dirname( __FILE__ ) ) . '/plugin-file-name.php';
	}
}

// Inject in our plugin.
tests_add_filter( 'muplugins_loaded', '_manually_load_plugins' );

// Include the main tests bootstrapper.
require $_tests_dir . '/includes/bootstrap.php';

// Require Base class.
require dirname( __FILE__ ) . '/base.php';
