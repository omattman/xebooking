(function ($) {

    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var MqL = 818;
    //move nav element position according to window width
    moveNavigation();
    $(window).on('resize', function () {
        (!window.requestAnimationFrame) ?
        setTimeout(moveNavigation, 300): window.requestAnimationFrame(moveNavigation);
    });

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

    //open search form
    $('.nav__search-trigger').on('click', function (event) {
        event.preventDefault();
        toggleSearch();
        closeNav();
    });

    //open submenu
    if ($(window).width() < 818) {
        //mobile - open lateral menu clicking on the menu icon
        $('.nav__menu-trigger, .nav__close-button').on('click', function (event) {
            //event.preventDefault();
            if ($('.main__content').hasClass('js-visible')) {
                closeNav();
                $('.nav__menu-overlay').removeClass('js-visible');
                $('body').css('overflow', 'visible');
            } else {
                $('.main__content').addClass('js-visible');
                $('.nav__primary').addClass('js-visible');
                $('body').css('overflow', 'hidden');
                $('.nav__header').addClass('js-visible');
                //$('.main__content').addClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
                toggleSearch('close');
                $('.nav__menu-overlay').addClass('js-visible');
            }
        });

        //prevent default clicking on direct children of .nav__primary
        $('.nav__primary').children('.nav__menu-links').children('a').on('click', function (event) {
            event.preventDefault();
        });

        $('.nav__menu-links').children('a').on('click', function (event) {
            /*if (!checkWindowWidth())
                event.preventDefault(); */
            var selected = $(this);
            if (selected.next('ul').hasClass('js-hidden')) {
                //desktop version only
                selected.addClass('selected').next('ul').removeClass('js-hidden').end().parent('.nav__menu-links').parent('ul').addClass('js-moves-out');
                selected.parent('.nav__menu-links').siblings('.nav__menu-links').children('ul').addClass('js-hidden').end().children('a').removeClass('selected');
                $('.nav__menu-overlay').addClass('js-visible');
            } else {
                selected.removeClass('selected').next('ul').addClass('js-hidden').end().parent('.nav__menu-links').parent('ul').removeClass('js-moves-out');
                $('.nav__menu-overlay').removeClass('js-visible');
            }
            toggleSearch('close');
        });

        //submenu items - go back link
        $('.js-go-back').on('click', function () {
            $(this).parent('ul').addClass('js-hidden').parent('.nav__menu-links').parent('ul').removeClass('js-moves-out');
        });

        function closeNav() {
            $('.nav__menu-trigger').removeClass('js-visible');
            $('.nav__header').removeClass('js-visible');
            $('.nav__primary').removeClass('js-visible');
            $('.nav__menu-links ul').addClass('js-hidden');
            $('.nav__menu-links a').removeClass('selected');
            $('.js-moves-out').removeClass('js-moves-out');
            $('.main__content').removeClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        }
    }


    function toggleSearch(type) {
        if (type == "close") {
            //close serach
            $('.nav__search').removeClass('js-visible');
            $('.nav__search-trigger').removeClass('js-search-visible');
            $('.nav__menu-overlay').removeClass('js-search-visible');
        } else {
            //toggle search visibility
            $('.nav__search').toggleClass('js-visible');
            $('.nav__search-trigger').toggleClass('js-search-visible');
            $('.nav__menu-overlay').toggleClass('js-search-visible');
            if ($(window).width() > MqL && $('.nav__search').hasClass('js-visible'))
                $('.nav__search').find('input[type="search"]').focus();
            ($('.nav__search').hasClass('js-visible')) ?
            $('.nav__menu-overlay').addClass('js-visible'): $('.nav__menu-overlay').removeClass('js-visible');
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
})(jQuery);