<?php
/**
 * Get the server information.
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

if ( ! class_exists( __NAMESPACE__ . '\\Server_Information' ) ) {

	/**
	 * Get the server information.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Server_Information {

		/**
		 * Singleton instance.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var boolean
		 */
		private static $instance = false;

		/**
		 * Server.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var array
		 */
		private static $server;

		/**
		 * Document Root.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string
		 */
		private static $document_root;

		/**
		 * Protocol.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string
		 */
		private static $protocol;

		/**
		 * Domain.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string
		 */
		private static $domain;

		/**
		 * Creates or returns an instance of this class.
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return static
		 */
		private static function initialize() {
			if ( self::$instance ) {
				return;
			}

			self::$server        = isset( $_SERVER ) ? $_SERVER : ''; // Input var okay.
			self::$document_root = self::$server['DOCUMENT_ROOT'];
			self::$protocol      = empty( self::$server['HTTPS'] ) ? 'http' : 'https';
			self::$domain        = self::$server['SERVER_NAME'];
		}

		/**
		 * Get Document Root.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return string
		 */
		public static function get_document_root() {
			self::initialize();
			return self::$document_root;
		}

		/**
		 * Get Protocol.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return string
		 */
		public static function get_protocol() {
			self::initialize();
			return self::$protocol;
		}

		/**
		 * Get Domain.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return string
		 */
		public static function get_domain() {
			self::initialize();
			return self::$domain;
		}

		/**
		 * Get URL.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return string
		 */
		public function get_url() {
			self::initialize();
			return self::$protocol . '://' . self::$domain;
		}
	}
}
