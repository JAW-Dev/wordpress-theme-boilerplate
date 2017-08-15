<?php
/**
 * Register Widget Areas.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Register_Widget_Areas' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 */
	class Register_Widget_Areas {

		/**
		 * Widgets.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @var array
		 */
		protected $widgets = array();

		/**
		 * Initialize the class
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @param array $args {
		 *     The array of register widget areas arguments.
		 *
		 *     @type array {
		 *         The individual widget area arguments.
		 *
		 *         @type string $name          The name or title of the sidebar. Default 'Sidebar $instance'.
		 *         @type string $id            The unique identifier by which the sidebar will be called. Default 'sidebar-$instance'.
		 *         @type string $description   Description of the sidebar, displayed in the Widgets interface. Default empty string.
		 *         @type string $class         Extra CSS class to assign to the sidebar in the Widgets interface.  Default empty.
		 *         @type string $before_widget HTML content to prepend to each widget's HTML output. Default is an opening list item element.
		 *         @type string $after_widget  HTML content to append to each widget's HTML output. Default is a closing list item element.
		 *         @type string $before_title  HTML content to prepend to the sidebar title. Default is an opening h2 element.
		 *         @type string $after_title   HTML content to append to the sidebar title. Default is a closing h2 element.
		 *     }
		 * }
		 *
		 * @return void
		 */
		public function __construct( $args ) {
			// Set the widget area arguments.
			$this->widgets = $this->arguments( $args );

			// Initiate.
			$this->hooks();
		}

		/**
		 * Arguments.
		 *
		 * @author Jason Witt
		 * @since  0.0.1
		 *
		 * @param array|string $args {
		 *     Optional. Array or string of arguments for the sidebar being registered.
		 *
		 *     @type string $name          The name or title of the sidebar. Default 'Sidebar $instance'.
		 *     @type string $id            The unique identifier by which the sidebar will be called. Default 'sidebar-$instance'.
		 *     @type string $description   Description of the sidebar, displayed in the Widgets interface. Default empty string.
		 *     @type string $class         Extra CSS class to assign to the sidebar in the Widgets interface.  Default empty.
		 *     @type string $before_widget HTML content to prepend to each widget's HTML output. Default is an opening list item element.
		 *     @type string $after_widget  HTML content to append to each widget's HTML output. Default is a closing list item element.
		 *     @type string $before_title  HTML content to prepend to the sidebar title. Default is an opening h2 element.
		 *     @type string $after_title   HTML content to append to the sidebar title. Default is a closing h2 element.
		 * }
		 *
		 * @return void
		 */
		public function arguments( $args ) {

			// Bail if not array or is empty.
			if ( ! is_array( $args ) || empty( $args ) ) {
				return;
			}

			$widgets = array();

			// Loop through the defined arguments.
			foreach ( $args as $widget ) {

				// Skip if 'id' or 'name' is not set.
				if ( ! isset( $widget['id'] ) || ! isset( $widget['name'] ) ) {
					continue;
				}

				// Set the defaults.
				$defaults = array(
					'id'            => '',
					'name'          => '',
					// Translators: The widget name.
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
		 * @author {{theme-author}}
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
		 * @author {{theme-author}}
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
