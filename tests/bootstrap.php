<?php
/**
 * Test Bootstrapper.
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Tests
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
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
	if ( file_exists( dirname( dirname( __FILE__ ) ) . '/plugin-file-name.php' ) ) {
		require dirname( dirname( __FILE__ ) ) . '/plugin-file-name.php';
	}

	// Plugins to activate.
	$active_plugins = array(
		'plugin-file-name/plugin-file-name.php',
	);

	// Update the active_plugins options with the $active_plugins array.
	update_option( 'active_plugins', $active_plugins );
}

// Inject in our plugin.
tests_add_filter( 'muplugins_loaded', '_manually_load_plugins' );

// Include the main tests bootstrapper.
require $_tests_dir . '/includes/bootstrap.php';

// Require Base class.
require dirname( __FILE__ ) . '/base.php';
