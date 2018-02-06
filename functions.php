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

/*
 * Autoloader
 * ----------------------------------------
 */
require_once trailingslashit( get_template_directory() ) . trailingslashit( 'includes' ) . 'autoload.php';

/*
 * Setup
 * ----------------------------------------
 */
/**
 * Custom theme setup filter.
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

/*
 * Register Widget Areas.
 * ----------------------------------------
 */
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

/*
 * Enqueue Styles.
 * ----------------------------------------
 */
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
 *         @type string $handle        (Required) The handle or name of the script.
 *         @type string $scr           (Required) The source of the file to enqueue.
 *         @type string $dependecies   (Optional) The dependencies of the enqueued file.
 *                                         Default: array()
 *         @type string $version       (Optional) The version of the file.
 *                                         Default: '1.0.0'.
 *     }
 * }
 */

$args = array(
	array(
		'handle'       => 'Theme_Textdomain-style',
		'scr'          => trailingslashit( get_stylesheet_directory_uri() ) . 'style' . Classes\Enqueue_Styles::$min . '.css',
		'dependencies' => array(),
		'version'      => Classes\Enqueue_Styles::version( 'style' . Classes\Enqueue_Styles::$min . '.css' ),
	),
);
$enqueue_styles = new Classes\Enqueue_Styles( $args );

/*
 * Template Tags
 * ----------------------------------------
 */
$template_tags = new Classes\Template_Tags( trailingslashit( get_stylesheet_directory() ) . trailingslashit( 'includes/functions' ) );
