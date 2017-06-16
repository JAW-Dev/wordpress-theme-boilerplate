<?php
/**
 * Register Widget Areas.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Register_Widget_Areas' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Register_Widget_Areas {

		/**
		 * Widgets.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @var array
		 */
		protected $widgets = array();

		/**
		 * Initialize the class
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @param array $args The array of register widget areas arguments.
		 *
		 * @return void
		 */
		public function __construct( $args ) {
			$this->widgets = $this->arguments( $args );

			$this->hooks();
		}

		/**
		 * Arguments.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @param array $args The array of defined arguments.
		 *
		 * @return void
		 */
		public function arguments( $args ) {

			// Bail if not array or is empty.
			if ( ! is_array( $args ) || empty( $args ) ) {
				return;
			}

			$widgets = array();

			foreach ( $args as $widget ) {

				// Skip if 'id' or 'name' is not set.
				if ( ! isset( $widget['id'] ) || ! isset( $widget['name'] ) ) {
					continue;
				}

				// Set the defaults.
				$defaults = array(
					'id'            => '',
					'name'          => '',
					'description'   => sprintf( __( 'Widget area for the %s', '{{theme-textdomain}}' ), $widget['name'] ),
					'before_widget' => '<aside class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				);

				// Add parsed arguments to the widgets array.
				 $widgets[] = wp_parse_args( $widget, $defaults );
			}

			return $widgets;
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
			add_action( 'widgets_init', array( $this, 'register_widget_areas' ) );
		}

		/**
		 * Register Widget Areas.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function register_widget_areas() {
			foreach ( $this->widgets as $widget ) {
				register_sidebar( array(
					'id'            => $widget['id'],
					'name'          => $widget['name'],
					'description'   => $widget['description'],
					'before_widget' => $widget['before_widget'],
					'after_widget'  => $widget['after_widget'],
					'before_title'  => $widget['before_title'],
					'after_title'   => $widget['after_title'],
				) );
			}
		}
	}
}
