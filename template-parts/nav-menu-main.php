<?php
/**
 * Nav Menu Main
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @since      {{theme-version}}
 */
?>
<nav id="main-navigation" class="main-navigation" role="navigation">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary-menu',
			'menu_id'        => 'primary-menu',
		) );
	?>
</nav><!-- #site-navigation -->