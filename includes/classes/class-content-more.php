<?php
/**
 * Content More Link.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Content_More' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Content_More {

		/**
		 * Initialize the class
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function __construct() {}

		/**
		 * Posted.
		 *
		 * @author {{theme_author}}
		 * @since  {{theme-version}}
		 *
		 * @return string The date the post was posted.
		 */
		public function render() {
			$allowed_tags = array(
				'span' => array(
					'class' => array(),
				),
			);

			/**
			 * Read more text filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The read more text.
			 */
			$text = apply_filters( 'content_more_text_filter',  __( 'Continue reading', '{{theme-textdomain}}' ) );

			/**
			 * Read More span classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The read more span classes.
			 */
			$span_classes       = apply_filters( 'content_more_span_classes_filter', 'screen-reader-text' );
			$screen_reader_text = sprintf( '<span class="' . esc_attr( $span_classes ) . '"> %s</span>', esc_html( get_the_title() ) );
			$output             = wp_kses( esc_html( $text ) . wp_kses( $screen_reader_text, $allowed_tags ), $allowed_tags );

			/**
			 * Content More Output filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string $output The content more markup output.
			 * @param arrar $args {
			 *     The argulents for the content more markup output.
			 *     @type string $text               The updated on text.
			 *     @type string $screen_reader_text The markup for the screen reader text HTML tag.
			 * }
			 */
			return apply_filters( 'content_more_outout_filter', $output, $text, $screen_reader_text );
		}
	}
}
