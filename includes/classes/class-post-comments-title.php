<?php
/**
 * Comments Title.
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Includes/Classes
 * @author     {{theme_author}} <{{theme-author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

namespace Theme_Namespace\Includes\Classes;

if ( ! class_exists( 'Post_Comments_Title' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme_author}}
	 * @since  {{theme-version}}
	 */
	class Post_Comments_Title {

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
		 * Comments Title.
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

			$comment_count = get_comments_number();

			/**
			 * Comments title text filter.
			 *
			 * @author {{theme_author}}
			 * @since  {{theme-version}}
			 *
			 * @param string The comments title.
			 */
			$title_text    = apply_filters( 'comments_title_text_filter', _nx( 'Comment for', 'Comments for', $comment_count, 'comments title', '{{theme-textdomain}}' ) );
			$text          = sprintf( '%1$s ' . esc_html( $title_text ) . ' %2$s', esc_html( number_format_i18n( $comment_count ) ), esc_html( get_the_title() ) );
			$output        = wp_kses( esc_html( $text ), $allowed_tags );

			/**
			 * Comments Title Output filter.
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
			return apply_filters( 'comments_title_outout_filter', $output, $text );
		}
	}
}
