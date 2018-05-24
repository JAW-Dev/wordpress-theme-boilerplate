'use strict';

import SkipLinkFocusFix from './skip-link-focus-fix';
import MobileMenu from './mobile-menu';
import MenuAccessibility from './menu-accessibility';

let mainMobileMenu = new MobileMenu( '#nav__primary', '#nav__open', '#nav__close', '#site-header__overlay', '.menu__item-has-children', 'menu-open', 'clicked' );
let ManiMenuAccessibility = new MenuAccessibility( '#nav__primary', '.menu__item-has-children' );
