<?php
/**
 * Setup
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

if ( ! class_exists( __NAMESPACE__ . '\\Setup' ) ) {

	/**
	 * Name
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Setup {

		/**
		 * Arguments.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var array
		 */
		protected $args = array();

		/**
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
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

			// Initiate.
			$this->init();
		}

		/**
		 * Initiate.
		 *
		 * @author Jason Witt
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function init() {
			add_action( 'after_setup_theme', function() {
				$this->load_textdomain();
				$this->add_theme_support();
				$this->add_image_size();
				$this->register_nav_menus();
			} );
		}

		/**
		 * Load textdomain.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function load_textdomain() {
			load_theme_textdomain( 'Theme_Textdomain', get_template_directory() . '/languages' );
		}

		/**
		 * Add Theme support.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
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
					return;
				}
				add_theme_support( $support['type'] );
			}
		}

		/**
		 * Add Image Size.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
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
					return;
				}
				add_image_size( $sizes['name'], $sizes['width'], $sizes['height'] );
			}
		}

		/**
		 * Register Nav Menus.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
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
