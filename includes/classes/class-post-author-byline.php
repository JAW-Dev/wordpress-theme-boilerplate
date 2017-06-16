<?php
/**
 * Post Author Byline.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Post_Author_Byline' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Post_Author_Byline {

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
				'a'   => array(
					'href' => array(),
					'class'  => array(),
				),
				'span' => array(
					'class' => array(),
				),
			);

			/**
			 * Author byline text filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The time tag classes.
			 */
			$text = apply_filters( 'author_byline_text_filter', __( 'Written by', '{{theme-textdomain}}' ) );

			/**
			 * Author byline a tag classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The a tag classes.
			 */
			$a_tag_classes = apply_filters( 'author_byline_a_tag_classes_filter', 'url fn n' );
			$url           = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
			$link          = '<a class="' . esc_attr( $a_tag_classes ) . '" href="' . esc_url( $url ) . '">' . esc_html( get_the_author() ) . '</a>';

			/**
			 * Author byline byline span tag classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The span tag classes.
			 */
			$byline_span_tag_classes = apply_filters( 'author_byline_span_tag_classes_filter', 'byline' );

			/**
			 * Author byline aothor span tag classes filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The span tag classes.
			 */
			$author_span_tag_classes = apply_filters( 'author_byline_author_span_tag_classes_filter', 'author vcard' );

			$output        = wp_kses( '<span class="' . esc_attr( $byline_span_tag_classes ) . '">' . esc_html( $text ) . ' <span class="' . esc_attr( $author_span_tag_classes ) . '">' . wp_kses( $link, $allowed_tags ) . '</span></span>', $allowed_tags );

			/**
			 * Updated on Output filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string $output The author byline markup output.
			 * @param arrar $args {
			 *     The argulents for the author byline markup output.
			 *
			 *     @type string $author_span_tag_classes The classes for the author span HTML tag.
			 *     @type string $text                    The author byline text.
			 *     @type string $byline_span_tag_classes The classes for the byline span HTML tag.
			 *     @type string $link                    The link markup
			 *     @type array  $allowed_tags            The tags allowed in the output.
			 * }
			 */
			return apply_filters( 'author_byline_output_filter', $output, $byline_span_tag_classes, $text, $author_span_tag_classes, $link, $allowed_tags );
		}
	}
}
