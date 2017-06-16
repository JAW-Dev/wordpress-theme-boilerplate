<?php
/**
 * Enqueue Styles.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Enqueue_Styles' ) ) {

	/**
	 * Enqueue Styles
	 *
	 * @author {{theme_author}}
	 * @since  0.0.1
	 */
	class Enqueue_Styles {

		/**
		 * Debug.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @var boolean
		 */
		protected $debug;

		/**
		 * Minified File.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @var string
		 */
		protected $min;

		/**
		 * Initialize the class
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
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
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function hooks() {
			add_action( 'wp_enqueue_scripts', array( $this, 'theme_base_styles' ) );
		}

		/**
		 * Stylesheet Version.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @param string $file           The file to enqueue.
		 * @param int    $custom_version The custom stylesheet version.
		 *
		 * @return int
		 */
		public function stylesheet_version( $file, $custom_version = '' ) {

			// Bail if file is not set.
			if ( ! $file ) {
				return '0.0.1';
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
		 * @author {{theme_author}}
		 * @since  0.0.1
		 *
		 * @return void
		 */
		public function theme_base_styles() {
			$file  = 'style' . $this->min . '.css';
			wp_enqueue_style( '{{theme-textdomain}}-style', trailingslashit( get_stylesheet_directory_uri() ) . $file, array(), $this->stylesheet_version( $file ) );
		}
	}
}
