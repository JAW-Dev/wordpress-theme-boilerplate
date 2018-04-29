<?php
/**
 * Change the admin Footer text.
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

if ( ! class_exists( __NAMESPACE__ . '\\Admin_Footer_Text' ) ) {

	/**
	 * Change the admin Footer text.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Admin_Footer_Text {

		/**
		 * Text.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string
		 */
		protected $text;

		/**
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @param string $text The admin footer text.
		 *
		 * @return void
		 */
		public function __construct( $text = '' ) {
			$this->text = $this->defaults( $text );

			$this->hooks();
		}

		/**
		 * Defaults.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @param string $text The admin footer text.
		 *
		 * @return string
		 */
		public function defaults( $text ) {
			$default_text = 'Thank you for creating with <a href="https://wordpress.org/">WordPress</a>.';
			$text         = ( '' !== $text ) ? $text : $default_text;

			return sprintf( '<span id="footer-thankyou">%s</span>', $text );
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
			add_filter( 'admin_footer_text', array( $this, 'footer_text' ) );
		}

		/**
		 * Admin Footer Text.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function footer_text() {
			echo wp_kses_post( $this->text );
		}
	}
}
