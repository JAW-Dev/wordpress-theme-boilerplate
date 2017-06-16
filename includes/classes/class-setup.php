<?php
/**
 * Setup
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Setup' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Setup {

		/**
		 * Arguments.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @var array
		 */
		protected $args = array();

		/**
		 * Initialize the class
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @param array $args The array of setup arguments.
		 *
		 * @return void
		 */
		public function __construct( $args ) {
			$defaults   = array(
				'theme_support'      => array(
					'type'   => '',
					'params' => array(),
				),
				'add_image_size'     => array(
					array(
						'name'   => '',
						'width'  => '',
						'height' => '',
						'crop'   => '',
					),
				),
				'register_nav_menus' => array(),
			);
			$this->args = wp_parse_args( $args, $defaults );

			$this->load_textdomain();
			$this->add_theme_support();
			$this->add_image_size();
			$this->register_nav_menus();
		}

		/**
		 * Load textdomain.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function load_textdomain() {
			load_theme_textdomain( '{{theme-textdomain}}', get_template_directory() . '/languages' );
		}

		/**
		 * Add Theme support.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function add_theme_support() {
			$theme_support = $this->args['theme_support'];

			// Bail early is not set.
			if ( ! isset( $theme_support ) ) {
				return;
			}

			foreach ( $theme_support as $support ) {

				// Bail if required arguments aren't set.
				if ( ! $support['type'] ) {
					return;
				}
				$params = ( ! empty( $support['params'] ) || isset( $support['params'] ) ) ? $support['params'] : null;
				if ( null !== $params ) {
					add_theme_support( $support['type'], $params );
				} else {
					add_theme_support( $support['type'] );
				}
			}
		}

		/**
		 * Add Image Size.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function add_image_size() {
			$images_sizes = $this->args['add_image_size'];

			// Bail early is not set.
			if ( ! isset( $images_sizes ) ) {
				return;
			}

			foreach ( $images_sizes as $sizes ) {

				// Bail if required arguments aren't set.
				if ( ! $sizes['name'] || ! $sizes['width'] || ! $sizes['height'] ) {
					return;
				}
				if ( isset( $sizes['crop'] ) ) {
					add_image_size( $sizes['name'], $sizes['width'], $sizes['height'], $sizes['crop'] );
				} else {
					add_image_size( $sizes['name'], $sizes['width'], $sizes['height'] );
				}
			}
		}

		/**
		 * Register Nav Menus.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function register_nav_menus() {

			$register_nav_menus = $this->args['register_nav_menus'];

			// Bail early is not set.
			if ( ! isset( $register_nav_menus ) ) {
				return;
			}

			register_nav_menus( $register_nav_menus );
		}
	}
}
