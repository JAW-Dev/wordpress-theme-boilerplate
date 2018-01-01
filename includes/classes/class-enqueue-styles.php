<?php
/**
 * Enqueue Styles.
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Includes/Classes
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

namespace Theme_Package\Includes\Classes;

if ( ! class_exists( 'Enqueue_Styles' ) ) {

	/**
	 * Enqueue Styles
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Enqueue_Styles {

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
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$this->debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? true : false;
			$this->min   = ( ! $this->debug ) ? '.min' : '';

			$this->hooks();
		}

		/**
		 * Hooks.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function hooks() {
			add_action( 'wp_enqueue_scripts', array( $this, 'theme_base_styles' ) );
		}

		/**
		 * Stylesheet Version.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @param string $file           The file to enqueue.
		 * @param int    $custom_version The custom stylesheet version.
		 *
		 * @return int
		 */
		public function stylesheet_version( $file, $custom_version = '' ) {

			// Bail if file is not set.
			if ( ! $file ) {
				return '1.0.0';
			}

			// If custom version is set return it.
			if ( $custom_version ) {
				return $custom_version;
			}

			$cache_buster  = filemtime( trailingslashit( get_stylesheet_directory() ) . $file );
			$theme_version = wp_get_theme()->get( 'Version' );
			$version       = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ? $cache_buster : $theme_version;

			return $version;
		}

		/**
		 * Theme Base Styles.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function theme_base_styles() {
			$file  = 'style' . $this->min . '.css';
			wp_enqueue_style( 'Theme_Textdomain-style', trailingslashit( get_stylesheet_directory_uri() ) . $file, array(), $this->stylesheet_version( $file ) );
		}
	}
}
