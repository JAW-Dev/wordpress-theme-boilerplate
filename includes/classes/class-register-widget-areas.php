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
	 * Register Widget Areas.
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
		 *     Array of register widget areas arguments.
		 *
		 *     @type array {
		 *         Array or string of arguments for the sidebar being registered.
		 *
		 *         @type string $id            (Required) The unique identifier by which the sidebar will be called.
		 *         @type string $name          (Required) The name or title of the sidebar.
		 *         @type string $description   (Optional) Description of the sidebar, displayed in the Widgets interface.
		 *                                         Default: 'Widget area for the $name'.
		 *         @type string $class         (Optional) Extra CSS class to assign to the sidebar in the Widgets interface.
		 *                                         Default: empty.
		 *         @type string $before_widget (Optional) HTML content to prepend to each widget's HTML output.
		 *                                         Default: '<aside class="widget %2$s">'.
		 *         @type string $after_widget  (Optional) HTML content to append to each widget's HTML output.
		 *                                         Default: '</aside>'.
		 *         @type string $before_title  (Optional) HTML content to prepend to the sidebar title.
		 *                                         Default: '<h3 class="widget-title">'.
		 *         @type string $after_title   (Optional) HTML content to append to the sidebar title.
		 *                                         Default: '</h3>'.
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
		 *     Array or string of arguments for the sidebar being registered.
		 *
		 *     @type string $id            (Required) The unique identifier by which the sidebar will be called.
		 *     @type string $name          (Required) The name or title of the sidebar.
		 *     @type string $description   (Optional) Description of the sidebar, displayed in the Widgets interface.
		 *                                     Default: 'Widget area for the $name'.
		 *     @type string $class         (Optional) Extra CSS class to assign to the sidebar in the Widgets interface.
		 *                                     Default: empty.
		 *     @type string $before_widget (Optional) HTML content to prepend to each widget's HTML output.
		 *                                     Default: '<aside class="widget %2$s">'.
		 *     @type string $after_widget  (Optional) HTML content to append to each widget's HTML output.
		 *                                     Default: '</aside>'.
		 *     @type string $before_title  (Optional) HTML content to prepend to the sidebar title.
		 *                                     Default: '<h3 class="widget-title">'.
		 *     @type string $after_title   (Optional) HTML content to append to the sidebar title.
		 *                                     Default: '</h3>'.
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
					'id'            => $widget['id'],
					'name'          => $widget['name'],
					// Translators: The widget name.
					'description'   => sprintf( __( 'Widget area for the %s', '{{theme-textdomain}}' ), $widget['name'] ),
					'class'         => '',
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
					'class'         => $widget['class'],
					'before_widget' => $widget['before_widget'],
					'after_widget'  => $widget['after_widget'],
					'before_title'  => $widget['before_title'],
					'after_title'   => $widget['after_title'],
				) );
			}
		}
	}
}
