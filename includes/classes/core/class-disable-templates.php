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

if ( ! class_exists( __NAMESPACE__ . '\\Disable_Templates' ) ) {

	/**
	 * Change the admin Footer text.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 */
	class Disable_Templates {

		/**
		 * Text.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @var string
		 */
		protected $args;

		/**
		 * Initialize the class
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @param array $args {
		 *     Array of arguments for the disabling the template pages.
		 *
		 *     @type boolean $single         (Optional) Disable the single page template. Default: true.
		 *     @type array   $single_types   (Optional) Disable an array of specific single page templates. Default: array().
		 *     @type boolean $archives       (Optional) The all archives page templates. Default: true.
		 *     @type boolean $category       (Optional) Disable the category page template. Default: true.
		 *     @type array   $category_types (Optional) Disable an array of specific category page templates. Default: array().
		 *     @type boolean $tag            (Optional) Disable the tag page template. Default: true.
		 *     @type array   $tag_types      (Optional) Disable an array of specific tag page templates. Default: array().
		 *     @type boolean $taxonomy       (Optional) Disable the taxonomy page template. Default: true.
		 *     @type array   $taxonomy_types (Optional) Disable an array of specific taxonomy page templates. Default: array().
		 *     @type boolean $author         (Optional) Disable the author page template. Default: true.
		 *     @type array   $authors        (Optional) Disable an array of specific author page templates. Default: array().
		 *     @type boolean $date           (Optional) Disable the date page template. Default: true.
		 *     @type boolean $year           (Optional) Disable the year page template. Default: true.
		 *     @type boolean $month          (Optional) Disable the month page template. Default: true.
		 *     @type boolean $day            (Optional) Disable the day page template. Default: true.
		 *     @type boolean $time           (Optional) Disable the time page template. Default: true.
		 *     @type boolean $attachment     (Optional) Disable the attachment page template. Default: true.
		 *     @type boolean $search         (Optional) Disable the search page template. Default: true.
		 *     @type string  $redirect_type  (Optional) The type of redirection, '404' page or 'home' page. Default: 'home'.
		 * }
		 *
		 * @see https://codex.wordpress.org/Conditional_Tags
		 *
		 * @return void
		 */
		public function __construct( $args = '' ) {
			$this->args = $this->arguments( $args );

			$this->hooks();
		}

		/**
		 * Arguments.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @param array $args Array of arguments for the disabling the template pages.
		 *
		 * @return array
		 */
		public function arguments( $args ) {
			// Set the defaults.
			$defaults = array(
				'category' => true,
				'category_types' => array(),
				'tag' => true,
				'tag_types' => array(),
				'taxonomy' => true,
				'taxonomy_types' => array(),
				'author' => true,
				'authors' => array(),
				'attachment' => true,
				'date' => true,
				'year' => true,
				'month' => true,
				'day' => true,
				'time' => true,
				'archives' => true,
				'single' => true,
				'single_types' => array(),
				'search' => true,
				'redirect_type' => 'home',
			);

			 return wp_parse_args( $args, $defaults );
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
			add_action( 'wp', array( $this, 'disable_templates' ) );
			add_action( 'parse_query', array( $this, 'disable_search' ) );

			if ( false === $this->args['search'] && is_search() ) {
				add_filter( 'get_search_form', create_function( '$a', 'return null;' ) );
			}
		}

		/**
		 * Disable Templates.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function disable_templates() {
			$this->disable( 'is_category', 'category', 'category_types' ); // Category.
			$this->disable( 'is_tag', 'tag', 'tag_types' ); // Tags.
			$this->disable( 'is_tax', 'taxonomy', 'taxonomy_types' ); // Taxonomies.
			$this->disable( 'is_author', 'author', 'authors' ); // Authors.
			$this->disable( 'is_date', 'date' ); // Date.
			$this->disable( 'is_year', 'year' ); // Year.
			$this->disable( 'is_month', 'month' ); // Month.
			$this->disable( 'is_day', 'day' ); // Day.
			$this->disable( 'is_time', 'time' ); // Time.
			$this->disable( 'is_attachment', 'attachment' ); // Attachments.
			$this->disable( 'is_archive', 'archives' ); // Archives.
			$this->disable( 'is_single', 'single', 'single_types' ); // Single.
		}

		/**
		 * Disable Search.
		 *
		 * @author Jason Witt
		 * @since  1.0.0
		 *
		 * @param string $query The modified query.
		 *
		 * @return void
		 */
		public function disable_search( $query ) {
			if ( false === $this->args['search'] && is_search() ) {
				$query->is_search       = false;
				$query->query_vars[ s ] = false;
				$query->query[ s ]      = false;

				$this->redirection();
			}
		}

		/**
		 * Disable.
		 *
		 * @author Jason Witt
		 * @since  1.0.0
		 *
		 * @param callback $callback The funtion to use.
		 * @param string   $template The singlgular template type.
		 * @param array    $types    The specific template types.
		 *
		 * @return void
		 */
		public function disable( $callback, $template, $types = '' ) {
			$types = ( isset( $this->args[ $types ] ) ) ? $this->args[ $types ] : array();

			if ( ! empty( $types ) && call_user_func( $callback, $types ) ) {
				$this->redirection();
			}
			if ( false === $this->args[ $template ] && call_user_func( $callback ) ) {
				$this->redirection();
			}
		}

		/**
		 * Redirection.
		 *
		 * @author Theme_Author
		 * @since  1.0.0
		 *
		 * @global $wp_query
		 *
		 * @return void
		 */
		public function redirection() {
			global $wp_query;

			if ( '404' === $this->args['redirect_type'] ) {
				$wp_query->set_404();
				return;
			}

			wp_safe_redirect( home_url() );
			exit;
		}
	}
}
