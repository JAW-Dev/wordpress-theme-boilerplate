'use strict';

/**
 * Menu Accessibility.
 *
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */
class MenuAccessibility {

	/**
	 * Constructor
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @param {string} menu The menu selector.
	 * @param {string} hasChild    The selector when menu item has a submenu.
	 *
	 * @return void
	 */
	constructor( menu, hasChild ) {
		this.menu = document.querySelector( menu );
		this.hasChild = this.menu.querySelectorAll( hasChild );
		this.menuEvents();
	}

	menuEvents() {
		for ( let i = 0; i < this.hasChild.length; i++ ) {
			let childMenu = this.hasChild[i].getElementsByTagName( 'ul' )[0];
			let childLink = this.hasChild[i].firstElementChild;
			this.addHasPopup( this.hasChild[i]);
			this.hoverToggleHidden( this.hasChild[i], childMenu );
		}
	}

	/**
	 * Add Aria haspopup attribute to menu item with sub menu.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	addHasPopup( target ) {
		if ( ! target.hasAttribute( 'aria-haspopup' ) ) {
			target.setAttribute( 'aria-haspopup', true );
		}
	}

	/**
	 * Toggle Aria hidden attribute when parent is hovered.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	hoverToggleHidden( target, subTarget ) {
		target.addEventListener( 'mouseover', () => {
			subTarget.setAttribute( 'aria-hidden', false );
		});

		target.addEventListener( 'mouseout', () => {
			subTarget.setAttribute( 'aria-hidden', true );
		});
	}
}

export default MenuAccessibility;
