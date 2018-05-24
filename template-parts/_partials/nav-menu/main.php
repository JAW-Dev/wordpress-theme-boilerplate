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

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}
?>

<nav id="site-header__nav" class="col-2 site-header__nav nav" role="navigation" aria-label="Main Menu">
	<div id="site-header__overlay" class="site-header__overlay"></div>
	<button id="nav__open" class="nav__open" aria-controls="menu-primary" aria-expanded="false">
		<svg id="nav__open-icon" class="nav__open-icon" viewBox="0 0 448 512">
			<path d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/>
		</svg>
	</button>
	<?php
	$close_button = '<button id="nav__close" class="nav__close" aria-controls="menu-primary" aria-expanded="false">
						<svg id="nav__close-icon" class="nav__close-icon"  viewBox="0 0 512 512">
							<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"/>
						</svg>
					</button>';
	wp_nav_menu( array(
		'theme_location'  => 'menu-primary',
		'container'       => false,
		'menu_class'      => 'menu row nav__primary',
		'menu_id'         => 'nav__primary',
		'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menubar">' . $close_button . '%3$s</ul>',
		'walker'          => new Theme_Package\Includes\Classes\Primary_Nav_Walker(),
	) );
	?>
</nav><!-- #site-navigation -->
