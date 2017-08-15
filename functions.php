<?php
/**
 * Functions.php
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme-author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme-author}}
 * @license   GNU General Public License v2 or later
 * @since     {{theme-version}}
 */

namespace Theme_Namespace;

use Theme_Namespace\Includes\Classes as Classes;

// ==============================================
// Autoloader
// ==============================================
require_once trailingslashit( get_stylesheet_directory() ) . trailingslashit( 'includes' ) . 'autoload.php';

// ==============================================
// Theme Setup
// ==============================================
/**
 * Custom theme setup filter.
 *
 * @author {{theme-author}}
 * @since  {{theme-version}}
 *
 * @param array The theme setup.
 */
$args = apply_filters( 'custom_theme_setup', array(

	/**
	 * Add theme support filter.
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 *
	 * @param array Add theme support.
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
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 *
	 * @param array Add custom image sizes.
	 */
	'add_image_size' => apply_filters( 'custom_add_image_size', array(
		array(
			'name'   => '',
			'width'  => '',
			'height' => '',
			'crop'   => '',
		),
	) ),

	/**
	 * Register nav menus filter.
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 *
	 * @param array Register nav menus.
	 */
	'register_nav_menus' => apply_filters( 'custom_register_nav_menus', array(
		'primary-menu' => __( 'Primary Menu', '{{theme-textdomain}}' ),
	) ),
) );

$setup = new Classes\Setup( $args );

// ==============================================
// Register Widget Areas.
// ==============================================
/**
 * Register Widget Areas.
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
 */
$args = apply_filters( 'custom_register_widget_areas',
	array(
		array(
			'id'   => 'primary',
			'name' => __( 'Primary Sidebar', '{{theme-textdomain}}' ),
		),
	)
);

$register_widget_areas = new Classes\Register_Widget_Areas( $args );

// ==============================================
// Stylesheets
// ==============================================
$enqueue_styles = new Classes\Enqueue_Styles;

// ==============================================
// Template Tags
// ==============================================
$template_tags = new Classes\Template_Tags( 'includes/functions' );
