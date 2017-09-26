jQuery(document).ready(function($) {
    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var MqL = 1025;
    //move nav element position according to window width
    moveNavigation();
    jQuery(window).on('resize', function() {
        (!window.requestAnimationFrame)
            ? setTimeout(moveNavigation, 300)
            : window.requestAnimationFrame(moveNavigation);
    });

    //mobile - open lateral menu clicking on the menu icon
    jQuery('.nav__menu-trigger').on('click', function(event) {
        event.preventDefault();
        if (jQuery('.main__content').hasClass('js-visible')) {
            closeNav();
            jQuery('.nav__menu-overlay').removeClass('js-visible');
        } else {
            jQuery(this).addClass('js-visible');
            jQuery('.nav__primary').addClass('js-visible');
            jQuery('.nav__header').addClass('js-visible');
            jQuery('.main__content').addClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                jQuery('body').addClass('overflow-hidden');
            });
            toggleSearch('close');
            jQuery('.nav__menu-overlay').addClass('js-visible');
        }
    });

    //open search form
    jQuery('.nav__search-trigger').on('click', function(event) {
        event.preventDefault();
        toggleSearch();
        closeNav();
    });

    //close lateral menu on mobile
    jQuery('.nav__menu-overlay').on('swiperight', function() {
        if (jQuery('.nav__primary').hasClass('js-visible')) {
            closeNav();
            jQuery('.nav__menu-overlay').removeClass('js-visible');
        }
    });
    jQuery('.nav-on-left .nav__menu-overlay').on('swipeleft', function() {
        if (jQuery('.nav__primary').hasClass('js-visible')) {
            closeNav();
            jQuery('.nav__menu-overlay').removeClass('js-visible');
        }
    });
    jQuery('.nav__menu-overlay').on('click', function() {
        closeNav();
        toggleSearch('close')
        jQuery('.nav__menu-overlay').removeClass('js-visible');
    });

    //prevent default clicking on direct children of .nav__primary
    jQuery('.nav__primary').children('.nav__menu-links').children('a').on('click', function(event) {
        event.preventDefault();
    });
    //open submenu
    jQuery('.nav__menu-links').children('a').on('click', function(event) {
        if (!checkWindowWidth())
            event.preventDefault();
        var selected = jQuery(this);
        if (selected.next('ul').hasClass('js-hidden')) {
            //desktop version only
            selected.addClass('selected').next('ul').removeClass('js-hidden').end().parent('.nav__menu-links').parent('ul').addClass('js-moves-out');
            selected.parent('.nav__menu-links').siblings('.nav__menu-links').children('ul').addClass('js-hidden').end().children('a').removeClass('selected');
            jQuery('.nav__menu-overlay').addClass('js-visible');
        } else {
            selected.removeClass('selected').next('ul').addClass('js-hidden').end().parent('.nav__menu-links').parent('ul').removeClass('js-moves-out');
            jQuery('.nav__menu-overlay').removeClass('js-visible');
        }
        toggleSearch('close');
    });

    //submenu items - go back link
    jQuery('.js-go-back').on('click', function() {
        jQuery(this).parent('ul').addClass('js-hidden').parent('.nav__menu-links').parent('ul').removeClass('js-moves-out');
    });

    function closeNav() {
        jQuery('.nav__menu-trigger').removeClass('js-visible');
        jQuery('.nav__header').removeClass('js-visible');
        jQuery('.nav__primary').removeClass('js-visible');
        jQuery('.nav__menu-links ul').addClass('js-hidden');
        jQuery('.nav__menu-links a').removeClass('selected');
        jQuery('.js-moves-out').removeClass('js-moves-out');
        jQuery('.main__content').removeClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
            jQuery('body').removeClass('overflow-hidden');
        });
    }

    function toggleSearch(type) {
        if (type == "close") {
            //close serach
            jQuery('.nav__search').removeClass('js-visible');
            jQuery('.nav__search-trigger').removeClass('js-search-visible');
            jQuery('.nav__menu-overlay').removeClass('js-search-visible');
        } else {
            //toggle search visibility
            jQuery('.nav__search').toggleClass('js-visible');
            jQuery('.nav__search-trigger').toggleClass('js-search-visible');
            jQuery('.nav__menu-overlay').toggleClass('js-search-visible');
            if (jQuery(window).width() > MqL && jQuery('.nav__search').hasClass('js-visible'))
                jQuery('.nav__search').find('input[type="search"]').focus();

            (jQuery('.nav__search').hasClass('js-visible'))
                ? jQuery('.nav__menu-overlay').addClass('js-visible')
                : jQuery('.nav__menu-overlay').removeClass('js-visible');
        }
    }

    function checkWindowWidth() {
        //check window width (scrollbar included)
        var e = window,
            a = 'inner';
        if (!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if (e[a + 'Width'] >= MqL) {
            return true;
        } else {
            return false;
        }
    }

    function moveNavigation() {
        var navigation = jQuery('.nav__menu-mobile');
        var desktop = checkWindowWidth();
        if (desktop) {
            navigation.detach();
            navigation.insertBefore('.nav__menu-buttons');
        } else {
            navigation.detach();
            navigation.insertAfter('.main__content');
        }
    }
});
