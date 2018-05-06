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

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

if ( ! class_exists( __NAMESPACE__ . '\\Enqueue_Styles' ) ) {

	/**
	 * Enqueue Styles
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Enqueue_Styles extends Enqueue_Abstract {

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
		 *         @type string $version     (Optional) The version of the file. Default: '1.0.0'.
		 *         @type string $media       (Optional) If Stylesheet, The media for which this stylesheet has been defined. Default: 'all'.
		 *         @type string $in_footer   (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.
		 *     }
		 * }
		 *
		 * @return void
		 */
		public function __construct( $args = array() ) {
			parent::__construct( $args );
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
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		}

		/**
		 * Enqueue Styles.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function enqueue() {
			foreach ( self::$args as $arg ) {
				$src = ( '.css' === substr( $arg['scr'], -4 ) ) ? $arg['scr'] : $arg['scr'] . self::$min . '.css';
				wp_enqueue_style( $arg['handle'], $src, $arg['dependencies'], self::version( $arg['version'], $src, $arg['handle'] ), $arg['media'] );
			}
		}
	}
}
