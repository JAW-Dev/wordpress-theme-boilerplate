<?php
/**
 * Sidebar
 *
 * {{theme-description}}
 *
 * @package   {{theme-package}}
 * @author    {{theme-author}} <{{theme_author-email}}>
 * @copyright Copyright (c) {{year}}, {{theme_author}}
 * @license   GNU General Public License v2 or later
 * @since     {{theme-version}}
 */

if ( ! is_active_sidebar( 'primary' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'primary' ); ?>
</aside><!-- /.widget-area -->
