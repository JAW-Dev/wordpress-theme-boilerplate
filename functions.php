<?php
/**
 * Find Replace
 *
 * Theme_Name
 * Theme_Package
 * Theme_URI
 * Theme_Description
 * Theme_Textdomain
 * Theme_Prefix
 * Theme_Author
 * Theme_Author_Email
 * Theme_Author_URL
 * Development_URL
 *
 *
 * Functions.php
 *
 * @package   Theme_Package
 * @author    Theme_Author <Theme_Author_Email>
 * @copyright Copyright (c) 2018, Theme_Author
 * @license   GNU General Public License v2 or later
 * @since     1.0.0
 */

namespace Theme_Package;

use Theme_Package\Includes\Classes as Classes;

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

/**
 * Autoloader.
 *
 * @author Theme_Author
 * @since  1.0.0
 *
 * @param array The theme setup arguments.
 */
require_once trailingslashit( get_template_directory() ) . trailingslashit( 'includes' ) . 'autoload.php';

/**
 * Custom theme setup.
 *
 * @author Theme_Author
 * @since  1.0.0
 *
 * @param array The theme setup arguments.
 */
$args = apply_filters( 'custom_theme_setup', array(

	/**
	 * Add theme support filter.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param array Add theme support.
	 *
	 * @example array( 'type' => 'automatic-feed-links' ).
	 * @example array(
	 *        'type'   => 'html5',
	 *        'params' => array(
	 *            'search-form',
	 *            'comment-form',
	 *            'comment-list',
	 *            'gallery',
	 *            'caption',
	 *        ),
	 *    )
	 */
	'theme_support' => apply_filters( 'custom_theme_support', array(
		array( 'type' => 'automatic-feed-links' ),
		array( 'type' => 'title-tag' ),
		array( 'type' => 'post-thumbnails' ),
		array( 'type' => 'align-wide' ),
		array(
			'type'   => 'html5',
			'params' => array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			),
		),
	) ),

	/**
	 * Add custom image sizes filter.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param array Add custom image sizes.
	 *
	 * @example array(
	 *        'name'   => '',
	 *        'width'  => '',
	 *        'height' => '',
	 *        'crop'   => '',
	 *     )
	 */
	'add_image_size' => apply_filters( 'custom_add_image_size', array() ),

	/**
	 * Register nav menus filter.
	 *
	 * @author Theme_Author
	 * @since  1.0.0
	 *
	 * @param array Register nav menus.
	 *
	 * @example 'primary-menu' => __( 'Primary Menu', 'Theme_Textdomain' )
	 */
	'register_nav_menus' => apply_filters( 'custom_register_nav_menus', array(
		'primary-menu' => __( 'Primary Menu', 'Theme_Textdomain' ),
	) ),
) );

$setup = new Classes\Setup( $args );

/**
 * Admin Footer Text
 *
 * @author Theme_Author
 * @since  1.0.0
 *
 * @param $arg string The text to replace the admin footer text.
 */
$admin_footer_text = new Classes\Admin_Footer_Text();

/**
 * Register Widget Areas.
 *
 * @author Theme_Author
 * @since  1.0.0
 *
 * @param array $args {
 *     Array of register widget areas arguments.
 *
 *     @type array {
 *         Array or string of arguments for the sidebar being registered.
 *
 *         @type string $id            (Required) The unique identifier by which the sidebar will be called.
 *         @type string $name          (Required) The name or title of the sidebar.
 *         @type string $description   (Optional) Description of the sidebar, displayed in the Widgets interface. Default: 'Widget area for the $name'.
 *         @type string $class         (Optional) Extra CSS class to assign to the sidebar in the Widgets interface. Default: empty.
 *         @type string $before_widget (Optional) HTML content to prepend to each widget's HTML output. Default: '<aside class="widget %2$s">'.
 *         @type string $after_widget  (Optional) HTML content to append to each widget's HTML output. Default: '</aside>'.
 *         @type string $before_title  (Optional) HTML content to prepend to the sidebar title. Default: '<h3 class="widget-title">'.
 *         @type string $after_title   (Optional) HTML content to append to the sidebar title. Default: '</h3>'.
 *     }
 * }
 */
$args = apply_filters( 'custom_register_widget_areas',
	array(
		array(
			'id'   => 'primary',
			'name' => __( 'Primary Sidebar', 'Theme_Textdomain' ),
		),
	)
);

$register_widget_areas = new Classes\Register_Widget_Areas( $args );

/**
 * Enqueue Styles
 *
 * @author Theme_Author
 * @since  1.0.0
 *
 * @param array $args {
 *     Array of enqueued script arguments.
 *
 *     @type array {
 *         Array or string of arguments for the script being registered.
 *
 *         @type string $handle      (Required) The handle or name of the script.
 *         @type string $scr         (Required) The source of the file to enqueue.
 *         @type string $dependecies (Optional) The dependencies of the enqueued file. Default: array()
 *         @type string $version     (Optional) The version of the file. Default: '1.0.0'.
 *         @type string $media       (Optional) If Stylesheet, The media for which this stylesheet has been defined. Default: 'all'.
 *         @type string $in_footer   (Optional) If JavaScript, set to true to enqueue file in the footer. Default: true.
 *     }
 * }
 */
$args = array(
	array(
		'handle'       => 'Theme_Textdomain-theme',
		'scr'          => trailingslashit( get_stylesheet_directory_uri() ) . 'style',
		'version'      => '1.0.1',
	),
	array(
		'handle'       => 'Theme_Textdomain-style',
		'scr'          => trailingslashit( get_stylesheet_directory_uri() ) . 'assets/styles/style',
	),
);
$enqueue_styles = new Classes\Enqueue_Styles( $args );

/**
 * Template Tags
 *
 * @author Theme_Author
 * @since  1.0.0
 */
$template_tags = new Classes\Template_Tags( trailingslashit( get_stylesheet_directory() ) . trailingslashit( 'includes/functions' ) );

/**
 * Disable Templates
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
$disable_tempates = new Classes\Disable_Templates();
