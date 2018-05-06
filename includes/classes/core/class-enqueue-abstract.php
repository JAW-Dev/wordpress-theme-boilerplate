<?php
/**
 * Enqueue.
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes/Classes
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

namespace Theme_Package\Includes\Classes;

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

/**
 * Enqueue Styles
 *
 * @author Theme_Author
 * @since  1.0.0
 */
abstract class Enqueue_Abstract {

	/**
	 * Debug.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @var boolean
	 */
	protected $debug;

	/**
	 * Minified File.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @var string
	 */
	public static $min;

	/**
	 * Arguments.
	 *
	 * @author Jason Witt
	 * @since  1.0.0
	 *
	 * @var array
	 */
	protected static $args;

	/**
	 * Initialize the class
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param array $args {
	 *     Array of enqueued script arguments.
	 *
	 *     @type array {
	 *         Array or string of arguments for the script being registered.
	 *
	 *         @type string $handle        (Required) The handle or name of the script.
	 *         @type string $scr           (Required) The source of the file to enqueue.
	 *         @type string $dependecies   (Optional) The dependencies of the enqueued file.
	 *                                         Default: array()
	 *         @type string $version       (Optional) The version of the file.
	 *                                         Default: '1.0.0'.
	 *         @type string $media     (Optional) If Stylesheet, The media for which this stylesheet has been defined.
	 *                                         Default: 'all'.
	 *         @type string $in_footer     (Optional) If JavaScript, set to true to enqueue file in the footer.
	 *                                         Default: true.
	 *     }
	 * }
	 *
	 * @return void
	 */
	public function __construct( $args = array() ) {
		$this->debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? true : false;
		self::$min   = ( ! $this->debug ) ? '.min' : '';
		self::$args = $this->defaults( $args );

		$this->hooks();
	}

	/**
	 * Defaults.
	 *
	 * @author Jason Witt
	 * @since  1.0.0
	 *
	 * @param array $args {
	 *     Array of enqueued script arguments.
	 *
	 *     @type array {
	 *         Array or string of arguments for the script being registered.
	 *
	 *         @type string $handle      (Required) The handle or name of the script.
	 *         @type string $scr         (Required) The source of the file to enqueue.
	 *         @type string $dependecies (Optional) The dependencies of the enqueued file. Default: array()
	 *         @type string $version     (Optional) The version of the file. Default: filetime().
	 *         @type string $media       (Optional) If Stylesheet, The media for which this stylesheet has been defined. Default: 'all'.
	 *         @type string $in_footer   (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.ype string $in_footer     (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.
	 *     }
	 * }
	 *
	 * @return array
	 */
	public function defaults( $args = array() ) {

		if ( empty( $args ) ) {
			return;
		}

		$files    = array();
		$defaults = array(
			'handle'       => '',
			'scr'          => '',
			'dependencies' => array(),
			'version'      => '',
			'media'        => 'all',
			'in_footer'    => true,
		);

		foreach ( $args as $arg ) {
			$files[] = wp_parse_args( $arg, $defaults );
		}

		return $files;
	}

	/**
	 * Hooks.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function hooks() {}

	/**
	 * Version.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param string $version The version.
	 * @param string $src     The file source.
	 * @param string $handle  The css file handle.
	 *
	 * @return int
	 */
	public static function version( $version, $src, $handle ) {
		$parent_template = wp_get_theme()->get( 'Template' );
		$theme_version   = wp_get_theme()->get( 'Version' );

		if ( 'parent-style' === $handle ) {
			$theme_version = wp_get_theme( $parent_template )->get( 'Version' );
		}

		// If custom version is set return it.
		if ( $version ) {
			return $version;
		}

		$document_root = isset( $_SERVER['DOCUMENT_ROOT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['DOCUMENT_ROOT'] ) ) : ''; // Input var okay.
		$cache_buster  = filemtime( realpath( $document_root . wp_parse_url( $src, PHP_URL_PATH ) ) );
		$version       = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? $cache_buster : $theme_version;
		return $version;
	}
}
