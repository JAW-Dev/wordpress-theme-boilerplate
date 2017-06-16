<?php
/**
 * Header
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme-author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme_author}}
 * @license   GNU General Public License v2 or later
 * @version   {{theme-version}}
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
		do_action( 'before_wp_head' );
			wp_head();
		do_action( 'after_wp_head' );
	?>
</head>
<?php do_action( 'before_body' ); ?>
<body <?php body_class(); ?>>
	<?php do_action( 'after_body_open' ); ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', '{{theme-textdomain}}' ); ?></a>
	<?php get_template_part( 'template-parts/header', 'main' ); ?>
	<?php do_action( 'before_main' ); ?>
	<main id="main" class="main" role="main">
		<?php do_action( 'after_main_open' ); ?>
