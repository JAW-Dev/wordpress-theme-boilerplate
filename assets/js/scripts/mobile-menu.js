'use strict';

/**
 * Mobile Menu.
 *
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */
class MobileMenu {

	/**
	 * Constructor
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @param {string} menu         The menu selector.
	 * @param {string} openButton   The open button selector.
	 * @param {string} closeButton  The close button selector.
	 * @param {string} overlay      The overlay selector.
	 * @param {string} hasChild     The selector when menu item has a submenu.
	 * @param {string} toggleClass  The class to add to the menu.
	 * @param {string} clickedClass The class to add when link is clicked.
	 *
	 * @return void
	 */
	constructor( menu, openButton, closeButton, overlay, hasChild, toggleClass, clickedClass ) {
		this.menu = document.querySelector( menu );
		this.openButton = document.querySelector( openButton );
		this.closeButton = document.querySelector( closeButton );
		this.overlay = document.querySelector( overlay );
		this.menuChildElements = this.menu.querySelectorAll( '*' );
		this.hasChildClass = hasChild.replace( '.', '' );
		this.hasChild = hasChild;
		this.toggleClass = toggleClass;
		this.clickedClass = clickedClass;
		this.openButtonClickHandler();
		this.closeButtonClickHandler();
		this.closeOverlayClickHandler();
		this.addClickedClass();
	}

	/**
	 * Open the mobile menu.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	openButtonClickHandler() {
		this.openButton.addEventListener( 'click', ( event ) => {
			event.preventDefault();
			this.menu.parentElement.classList.add( this.toggleClass );
		});
	}

	/**
	 * Close the mobile menu button.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	closeButtonClickHandler() {
		this.closeButton.addEventListener( 'click', ( event ) => {
			event.preventDefault();
			this.menu.parentElement.classList.remove( this.toggleClass );
			for ( let i = 0; i < this.hasChild.length; i++ ) {
				let childLink = this.hasChild[i].firstElementChild;
				childLink.classList.remove( this.clickedClass );
			}
		});
	}

	/**
	 * Close the mobile menu overlay.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	closeOverlayClickHandler() {
		this.overlay.addEventListener( 'click', () => {
			this.menu.parentElement.classList.remove( this.toggleClass );
		});
	}

	/**
	 * Add clicked class to cliked links.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	addClickedClass( event ) {
		for ( let i = 0; i < this.menuChildElements.length; i++ ) {
			if ( this.isString( this.menuChildElements[i].className ) && this.menuChildElements[i].classList.contains( this.hasChildClass ) ) {
				let childLink = this.menuChildElements[i].getElementsByTagName( 'a' )[0];
				let parent = this.menuChildElements[i].parentNode.parentNode.classList.contains( this.hasChildClass );
				this.linkClickHandler( this.menuChildElements[i], childLink, parent );
			}
		}
	}

	/**
	 * Handle the link click.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @param {string} element   The current element.
	 * @param {string} childLink The child link for the current element.
	 * @param {string} parent    The parent link for the current element.
	 *
	 * @return void
	 */
	linkClickHandler( element, childLink, parent ) {
		childLink.addEventListener( 'click', ( event ) => {
			let hasClass = element.classList.contains( this.clickedClass );
			if ( parent !== true ) {
				this.clearClickedClass();
			}
			if ( hasClass !== true ) {
				event.preventDefault();
				element.classList.add( this.clickedClass );
			}
		});
	}

	/**
	 * Remove the clicked classes.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @return void
	 */
	clearClickedClass() {
		for ( let i = 0; i < this.menuChildElements.length; i++ ) {
			if ( this.isString( this.menuChildElements[i].className ) &&  this.menuChildElements[i].classList.contains( this.hasChildClass ) ) {
				let hasClass =  this.menuChildElements[i].classList.contains( this.clickedClass );
				if ( hasClass === true ) {
					this.menuChildElements[i].classList.remove( this.clickedClass );
				}
			}
		}
	}

	/**
	 * Check if value is a string.
	 *
	 * @author Theme_Author
	 * @since 1.0.0
	 *
	 * @param {string} value The value to test.
	 *
	 * @return boolean
	 */
	isString( value ) {
		return typeof value === 'string' || value instanceof String;
	}
}

export default MobileMenu;
