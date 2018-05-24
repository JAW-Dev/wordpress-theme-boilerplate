/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _skipLinkFocusFix = __webpack_require__(1);

var _skipLinkFocusFix2 = _interopRequireDefault(_skipLinkFocusFix);

var _mobileMenu = __webpack_require__(2);

var _mobileMenu2 = _interopRequireDefault(_mobileMenu);

var _menuAccessibility = __webpack_require__(3);

var _menuAccessibility2 = _interopRequireDefault(_menuAccessibility);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var mainMobileMenu = new _mobileMenu2.default('#nav__primary', '#nav__open', '#nav__close', '#site-header__overlay', '.menu__item-has-children', 'menu-open', 'clicked');
var ManiMenuAccessibility = new _menuAccessibility2.default('#nav__primary', '.menu__item-has-children');

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
	var isIe = /(trident|msie)/i.test(navigator.userAgent);

	if (isIe && document.getElementById && window.addEventListener) {
		window.addEventListener('hashchange', function () {
			var id = location.hash.substring(1),
			    element;

			if (!/^[A-z0-9_-]+$/.test(id)) {
				return;
			}

			element = document.getElementById(id);

			if (element) {
				if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false);
	}
})();

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Mobile Menu.
 *
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MobileMenu = function () {

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
	function MobileMenu(menu, openButton, closeButton, overlay, hasChild, toggleClass, clickedClass) {
		_classCallCheck(this, MobileMenu);

		this.menu = document.querySelector(menu);
		this.openButton = document.querySelector(openButton);
		this.closeButton = document.querySelector(closeButton);
		this.overlay = document.querySelector(overlay);
		this.menuChildElements = this.menu.querySelectorAll('*');
		this.hasChildClass = hasChild.replace('.', '');
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


	_createClass(MobileMenu, [{
		key: 'openButtonClickHandler',
		value: function openButtonClickHandler() {
			var _this = this;

			this.openButton.addEventListener('click', function (event) {
				event.preventDefault();
				_this.menu.parentElement.classList.add(_this.toggleClass);
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

	}, {
		key: 'closeButtonClickHandler',
		value: function closeButtonClickHandler() {
			var _this2 = this;

			this.closeButton.addEventListener('click', function (event) {
				event.preventDefault();
				_this2.menu.parentElement.classList.remove(_this2.toggleClass);
				for (var i = 0; i < _this2.hasChild.length; i++) {
					var childLink = _this2.hasChild[i].firstElementChild;
					childLink.classList.remove(_this2.clickedClass);
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

	}, {
		key: 'closeOverlayClickHandler',
		value: function closeOverlayClickHandler() {
			var _this3 = this;

			this.overlay.addEventListener('click', function () {
				_this3.menu.parentElement.classList.remove(_this3.toggleClass);
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

	}, {
		key: 'addClickedClass',
		value: function addClickedClass(event) {
			for (var i = 0; i < this.menuChildElements.length; i++) {
				if (this.isString(this.menuChildElements[i].className) && this.menuChildElements[i].classList.contains(this.hasChildClass)) {
					var childLink = this.menuChildElements[i].getElementsByTagName('a')[0];
					var parent = this.menuChildElements[i].parentNode.parentNode.classList.contains(this.hasChildClass);
					this.linkClickHandler(this.menuChildElements[i], childLink, parent);
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

	}, {
		key: 'linkClickHandler',
		value: function linkClickHandler(element, childLink, parent) {
			var _this4 = this;

			childLink.addEventListener('click', function (event) {
				var hasClass = element.classList.contains(_this4.clickedClass);
				if (parent !== true) {
					_this4.clearClickedClass();
				}
				if (hasClass !== true) {
					event.preventDefault();
					element.classList.add(_this4.clickedClass);
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

	}, {
		key: 'clearClickedClass',
		value: function clearClickedClass() {
			for (var i = 0; i < this.menuChildElements.length; i++) {
				if (this.isString(this.menuChildElements[i].className) && this.menuChildElements[i].classList.contains(this.hasChildClass)) {
					var hasClass = this.menuChildElements[i].classList.contains(this.clickedClass);
					if (hasClass === true) {
						this.menuChildElements[i].classList.remove(this.clickedClass);
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

	}, {
		key: 'isString',
		value: function isString(value) {
			return typeof value === 'string' || value instanceof String;
		}
	}]);

	return MobileMenu;
}();

exports.default = MobileMenu;

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Menu Accessibility.
 *
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MenuAccessibility = function () {

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
	function MenuAccessibility(menu, hasChild) {
		_classCallCheck(this, MenuAccessibility);

		this.menu = document.querySelector(menu);
		this.hasChild = this.menu.querySelectorAll(hasChild);
		this.menuEvents();
	}

	_createClass(MenuAccessibility, [{
		key: 'menuEvents',
		value: function menuEvents() {
			for (var i = 0; i < this.hasChild.length; i++) {
				var childMenu = this.hasChild[i].getElementsByTagName('ul')[0];
				var childLink = this.hasChild[i].firstElementChild;
				this.addHasPopup(this.hasChild[i]);
				this.hoverToggleHidden(this.hasChild[i], childMenu);
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

	}, {
		key: 'addHasPopup',
		value: function addHasPopup(target) {
			if (!target.hasAttribute('aria-haspopup')) {
				target.setAttribute('aria-haspopup', true);
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

	}, {
		key: 'hoverToggleHidden',
		value: function hoverToggleHidden(target, subTarget) {
			target.addEventListener('mouseover', function () {
				subTarget.setAttribute('aria-hidden', false);
			});

			target.addEventListener('mouseout', function () {
				subTarget.setAttribute('aria-hidden', true);
			});
		}
	}]);

	return MenuAccessibility;
}();

exports.default = MenuAccessibility;

/***/ })
/******/ ]);
//# sourceMappingURL=script.js.map