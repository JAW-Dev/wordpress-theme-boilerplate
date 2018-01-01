<?php
/**
 * Nav Menu Main
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Template_Parts
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
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
