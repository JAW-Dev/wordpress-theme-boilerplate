<?php
/**
 * Post Published.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme-author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Post_Published' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 */
	class Post_Published {

		/**
		 * Initialize the class
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function __construct() {}

		/**
		 * Posted.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return string The date the post was posted.
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
			 * Published on time tag classes filter.
			 *
			 * @author {{theme-author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The time tag classes.
			 */
			$time_tag_classes = apply_filters( 'published_on_time_tag_classes_filter', 'meta__date published' );
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

				/**
				 * Published on Time tag updated classes filter.
				 *
				 * @author {{theme-author}}
				 * @since  {{theme-version}}
				 *
				 * @param string The time tag updated classes.
				 */
				$time_tag_classes = apply_filters( 'published_on_time_tag_updated_classes_filter', 'meta__date published updated' );
			}

			/**
			 * Published on text filter.
			 *
			 * @author {{theme-author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The published on text.
			 */
			$text   = apply_filters( 'published_on_text_filter', __( 'Published on', '{{theme-textdomain}}' ) );
			$time_tag = '<time class="' . esc_attr( $time_tag_classes ) . '" datetime="%1$s">%2$s</time>';
			$url    = get_the_permalink();
			$time   = sprintf( $time_tag, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );

			/**
			 * Published on span tag classes filter.
			 *
			 * @author {{theme-author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The span tag classes.
			 */
			$span_tag_classes = apply_filters( 'published_on_span_tag_classes_filter', 'published-on' );
			$output           = wp_kses( '<span class="' . esc_attr( $span_tag_classes ) . '">' . esc_html( $text ) . ' <a href="' . esc_url( $url ) . '" rel="bookmark">' . wp_kses( $time, $allowed_tags ) . '</a></span>', $allowed_tags );

			/**
			 * Published on Output filter.
			 *
			 * @author {{theme-author}}
			 * @since  {{theme-version}}
			 *
			 * @param string $output The published on markup output.
			 * @param arrar $args {
			 *     The argulents for the published on markup output.
			 *
			 *     @type string $span_tag_classes The classes for the span HTML tag.
			 *     @type string $text             The published on text.
			 *     @type string $url              The post URL.
			 *     @type string $time             The published timedate.
			 *     @type array  $allowed_tags     The tags allowed in the output.
			 * }
			 */
			return apply_filters( 'published_on_output_filter', $output, $span_tag_classes, $text, $url, $time, $allowed_tags );
		}
	}
}
