<?php
/**
 * Post Updated.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Post_Updated' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Post_Updated {

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
		 * @return string $posted_on The date the post was posted.
		 */
		public function render() {
			$allowed_tags = array(
				'a'   => array(
					'href' => array(),
					'class'  => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'time' => array(
					'class'    => array(),
					'datetime' => array(),
				),
			);

			/**
			 * Updated on time tag classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The time tag classes.
			 */
			$time_tag_classes = apply_filters( 'updated_on_time_tag_classes_filter', 'meta__date updated' );

			/**
			 * Updated on text filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The updated on text.
			 */
			$text     = apply_filters( 'updated_on_text_filter', __( 'Updated on', '{{theme-textdomain}}' ) );
			$time_tag = '<time class="' . esc_attr( $time_tag_classes ) . '" datetime="%1$s">%2$s</time>';
			$url      = get_the_permalink();
			$time     = sprintf( $time_tag, esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

			/**
			 * Updated on span tag classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The span tag classes.
			 */
			$span_tag_classes = apply_filters( 'updated_on_span_tag_classes_filter', 'updated-on' );
			$output   = wp_kses( '<span class="' . esc_attr( $span_tag_classes ) . '">' . esc_html( $text ) . ' <a href="' . esc_url( $url ) . '" rel="bookmark">' . wp_kses( $time, $allowed_tags ). '</a></span>', $allowed_tags );

			/**
			 * Updated on Output filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string $output The updated on markup output.
			 * @param arrar $args {
			 *     The argulents for the updated on markup output.
			 *
			 *     @type string $span_tag_classes The classes for the span HTML tag
			 *     @type string $text             The updated on text.
			 *     @type string $url              The post URL.
			 *     @type string $time             The updated timedate.
			 *     @type array  $allowed_tags     The tags allowed in the output.
			 * }
			 */
			return apply_filters( 'updated_on_output_filter', $output, $span_tag_classes, $text, $url, $time, $allowed_tags );
		}
	}
}
