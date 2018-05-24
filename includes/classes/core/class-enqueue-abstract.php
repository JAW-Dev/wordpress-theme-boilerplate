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
	protected $min;

	/**
	 * Arguments.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @var array
	 */
	protected $args;

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
	 *         @type string $handle      (Required) The handle or name of the script.
	 *         @type string $scr         (Required) The source of the file to enqueue.
	 *         @type string $dependecies (Optional) The dependencies of the enqueued file. Default: array()
	 *         @type string $version     (Optional) The version of the file. Default: filetime()/Your theme version.
	 *         @type string $media       (Optional) If Stylesheet, The media for which this stylesheet has been defined. Default: 'all'.
	 *         @type string $in_footer   (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.ype string $in_footer     (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.
	 *     }
	 * }
	 *
	 * @return void
	 */
	public function __construct( $args = array() ) {
		$this->debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? true : false;
		$this->min  = ( ! $this->debug ) ? '.min' : '';
		$this->args  = $this->defaults( $args );

		$this->hooks();
	}

	/**
	 * Defaults.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param array $args The arguments.
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

		// If custom version is set return it.
		if ( ! empty( $version ) ) {
			return $version;
		}

		$version = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? self::cache_buster( $src ) : self::theme_version( $handle );

		// if src is not on the server domain, bail.
		if ( ! self::check_domain( $src ) ) {
			return;
		}

		return $version;
	}

	/**
	 * Check Domain.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param string $src     The file source.
	 *
	 * @return void
	 */
	public static function check_domain( $src ) {
		$server_domain = Server_Information::get_domain();
		$src_domain    = wp_parse_url( $src, PHP_URL_HOST );

		if ( $src_domain !== $server_domain ) {
			return;
		}

		return true;
	}

	/**
	 * Theme version.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param string $handle  The css file handle.
	 *
	 * @return string
	 */
	private static function theme_version( $handle ) {
		$parent_template = wp_get_theme()->get( 'Template' );
		$theme_version   = wp_get_theme()->get( 'Version' );

		if ( 'parent-style' === $handle ) {
			$theme_version = wp_get_theme( $parent_template )->get( 'Version' );
		}

		return $theme_version;
	}

	/**
	 * Cache Buster.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param string $src     The file source.
	 *
	 * @return string
	 */
	private static function cache_buster( $src ) {
		$document_root = Server_Information::get_document_root();
		return filemtime( realpath( $document_root . wp_parse_url( $src, PHP_URL_PATH ) ) );
	}
}
