// self executing function here
(function() {
    // your page initialization code here
    // the DOM will be available here
})();

/*!
 * @preserve
 *
 * Readmore.js jQuery plugin
 * Author: @jed_foster
 * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license
 *
 * Debounce function from http://davidwalsh.name/javascript-debounce-function
 */

/* global jQuery */

(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function($) {
    'use strict';

    var readmore = 'readmore',
        defaults = {
            speed: 100,
            collapsedHeight: 200,
            heightMargin: 16,
            moreLink: '<a href="#">Read More</a>',
            lessLink: '<a href="#">Close</a>',
            embedCSS: true,
            blockCSS: 'display: block; width: 100%;',
            startOpen: false,

            // callbacks
            blockProcessed: function() {},
            beforeToggle: function() {},
            afterToggle: function() {}
        },
        cssEmbedded = {},
        uniqueIdCounter = 0;

    function debounce(func, wait, immediate) {
        var timeout;

        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) {
                    func.apply(context, args);
                }
            };
            var callNow = immediate && !timeout;

            clearTimeout(timeout);
            timeout = setTimeout(later, wait);

            if (callNow) {
                func.apply(context, args);
            }
        };
    }

    function uniqueId(prefix) {
        var id = ++uniqueIdCounter;

        return String(prefix == null
            ? 'rmjs-'
            : prefix) + id;
    }

    function setBoxHeights(element) {
        var el = element.clone().css({height: 'auto', width: element.width(), maxHeight: 'none', overflow: 'hidden'}).insertAfter(element),
            expandedHeight = el.outerHeight(),
            cssMaxHeight = parseInt(el.css({maxHeight: ''}).css('max-height').replace(/[^-\d\.]/g, ''), 10),
            defaultHeight = element.data('defaultHeight');

        el.remove();

        var collapsedHeight = cssMaxHeight || element.data('collapsedHeight') || defaultHeight;

        // Store our measurements.
        element.data({expandedHeight: expandedHeight, maxHeight: cssMaxHeight, collapsedHeight: collapsedHeight})
        // and disable any `max-height` property set in CSS
            .css({maxHeight: 'none'});
    }

    var resizeBoxes = debounce(function() {
        $('[data-readmore]').each(function() {
            var current = $(this),
                isExpanded = (current.attr('aria-expanded') === 'true');

            setBoxHeights(current);

            current.css({
                height: current.data((isExpanded
                    ? 'expandedHeight'
                    : 'collapsedHeight'))
            });
        });
    }, 100);

    function embedCSS(options) {
        if (!cssEmbedded[options.selector]) {
            var styles = ' ';

            if (options.embedCSS && options.blockCSS !== '') {
                styles += options.selector + ' + [data-readmore-toggle], ' + options.selector + '[data-readmore]{' + options.blockCSS + '}';
            }

            // Include the transition CSS even if embedCSS is false
            styles += options.selector + '[data-readmore]{' + 'transition: height ' + options.speed + 'ms;' + 'overflow: hidden;' + '}';

            (function(d, u) {
                var css = d.createElement('style');
                css.type = 'text/css';

                if (css.styleSheet) {
                    css.styleSheet.cssText = u;
                } else {
                    css.appendChild(d.createTextNode(u));
                }

                d.getElementsByTagName('head')[0].appendChild(css);
            }(document, styles));

            cssEmbedded[options.selector] = true;
        }
    }

    function Readmore(element, options) {
        this.element = element;

        this.options = $.extend({}, defaults, options);

        embedCSS(this.options);

        this._defaults = defaults;
        this._name = readmore;

        this.init();

        // IE8 chokes on `window.addEventListener`, so need to test for support.
        if (window.addEventListener) {
            // Need to resize boxes when the page has fully loaded.
            window.addEventListener('load', resizeBoxes);
            window.addEventListener('resize', resizeBoxes);
        } else {
            window.attachEvent('load', resizeBoxes);
            window.attachEvent('resize', resizeBoxes);
        }
    }

    Readmore.prototype = {
        init: function() {
            var current = $(this.element);

            current.data({defaultHeight: this.options.collapsedHeight, heightMargin: this.options.heightMargin});

            setBoxHeights(current);

            var collapsedHeight = current.data('collapsedHeight'),
                heightMargin = current.data('heightMargin');

            if (current.outerHeight(true) <= collapsedHeight + heightMargin) {
                // The block is shorter than the limit, so there's no need to truncate it.
                if (this.options.blockProcessed && typeof this.options.blockProcessed === 'function') {
                    this.options.blockProcessed(current, false);
                }
                return true;
            } else {
                var id = current.attr('id') || uniqueId(),
                    useLink = this.options.startOpen
                        ? this.options.lessLink
                        : this.options.moreLink;

                current.attr({'data-readmore': '', 'aria-expanded': this.options.startOpen, 'id': id});

                current.after($(useLink).on('click', (function(_this) {
                    return function(event) {
                        _this.toggle(this, current[0], event);
                    };
                })(this)).attr({'data-readmore-toggle': id, 'aria-controls': id}));

                if (!this.options.startOpen) {
                    current.css({height: collapsedHeight});
                }

                if (this.options.blockProcessed && typeof this.options.blockProcessed === 'function') {
                    this.options.blockProcessed(current, true);
                }
            }
        },

        toggle: function(trigger, element, event) {
            if (event) {
                event.preventDefault();
            }

            if (!trigger) {
                trigger = $('[aria-controls="' + this.element.id + '"]')[0];
            }

            if (!element) {
                element = this.element;
            }

            var $element = $(element),
                newHeight = '',
                newLink = '',
                expanded = false,
                collapsedHeight = $element.data('collapsedHeight');

            if ($element.height() <= collapsedHeight) {
                newHeight = $element.data('expandedHeight') + 'px';
                newLink = 'lessLink';
                expanded = true;
            } else {
                newHeight = collapsedHeight;
                newLink = 'moreLink';
            }

            // Fire beforeToggle callback
            // Since we determined the new "expanded" state above we're now out of sync
            // with our true current state, so we need to flip the value of `expanded`
            if (this.options.beforeToggle && typeof this.options.beforeToggle === 'function') {
                this.options.beforeToggle(trigger, $element, !expanded);
            }

            $element.css({'height': newHeight});

            // Fire afterToggle callback
            $element.on('transitionend', (function(_this) {
                return function() {
                    if (_this.options.afterToggle && typeof _this.options.afterToggle === 'function') {
                        _this.options.afterToggle(trigger, $element, expanded);
                    }

                    $(this).attr({'aria-expanded': expanded}).off('transitionend');
                }
            })(this));

            $(trigger).replaceWith($(this.options[newLink]).on('click', (function(_this) {
                return function(event) {
                    _this.toggle(this, element, event);
                };
            })(this)).attr({'data-readmore-toggle': $element.attr('id'), 'aria-controls': $element.attr('id')}));
        },

        destroy: function() {
            $(this.element).each(function() {
                var current = $(this);

                current.attr({'data-readmore': null, 'aria-expanded': null}).css({maxHeight: '', height: ''}).next('[data-readmore-toggle]').remove();

                current.removeData();
            });
        }
    };

    $.fn.readmore = function(options) {
        var args = arguments,
            selector = this.selector;

        options = options || {};

        if (typeof options === 'object') {
            return this.each(function() {
                if ($.data(this, 'plugin_' + readmore)) {
                    var instance = $.data(this, 'plugin_' + readmore);
                    instance.destroy.apply(instance);
                }

                options.selector = selector;

                $.data(this, 'plugin_' + readmore, new Readmore(this, options));
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            return this.each(function() {
                var instance = $.data(this, 'plugin_' + readmore);
                if (instance instanceof Readmore && typeof instance[options] === 'function') {
                    instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }
            });
        }
    };

}));

jQuery(document).ready(function($) {
    $('.js-truncate-text').readmore({
        moreLink: '<a class="truncator-link" href="#">Vis hele beskrivelsen</a>',
        lessLink: '<a class="truncator-link" href="#">Skjul beskrivelsen</a>',
        collapsedHeight: 700,
        afterToggle: function(trigger, element, expanded) {
            if (!expanded) { // The "Close" link was clicked
                jQuery('html, body').animate({
                    scrollTop: jQuery('.et_pb_column_1_2').offset.top
                }, {duration: 100});
            }
        }
    });

    $('.js-truncate-description').readmore({
        moreLink: '<a class="c__blue f__und" href="#">Vis hele beskrivelsen</a>',
        lessLink: '<a class="c__blue f__und" href="#">Skjul beskrivelsen</a>',
        collapsedHeight: 200,
        afterToggle: function(trigger, element, expanded) {
            if (!expanded) { // The "Close" link was clicked
                jQuery('html, body').animate({
                    scrollTop: jQuery('.et_pb_column').offset.top
                }, {duration: 100});
            }
        }
    });
});

jQuery('.js-truncate-text').readmore({speed: 500});
jQuery('.js-truncate-description').readmore({speed: 500});

jQuery(document).ready(function($) {
    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var MqL = 1025;
    //move nav element position according to window width
    moveNavigation();
    $(window).on('resize', function() {
        (!window.requestAnimationFrame)
            ? setTimeout(moveNavigation, 300)
            : window.requestAnimationFrame(moveNavigation);
    });

    //mobile - open lateral menu clicking on the menu icon
    $('.nav__menu-trigger').on('click', function(event) {
        event.preventDefault();
        if ($('.main__content').hasClass('js-visible')) {
            closeNav();
            $('.nav__menu-overlay').removeClass('js-visible');
        } else {
            $(this).addClass('js-visible');
            $('.nav__primary').addClass('js-visible');
            $('.nav__header').addClass('js-visible');
            $('.main__content').addClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                $('body').addClass('overflow-hidden');
            });
            toggleSearch('close');
            $('.nav__menu-overlay').addClass('js-visible');
        }
    });

    //open search form
    $('.nav__search-trigger').on('click', function(event) {
        event.preventDefault();
        toggleSearch();
        closeNav();
    });

    //close lateral menu on mobile
    $('.nav__menu-overlay').on('swiperight', function() {
        if ($('.nav__primary').hasClass('js-visible')) {
            closeNav();
            $('.nav__menu-overlay').removeClass('js-visible');
        }
    });
    $('.nav-on-left .nav__menu-overlay').on('swipeleft', function() {
        if ($('.nav__primary').hasClass('js-visible')) {
            closeNav();
            $('.nav__menu-overlay').removeClass('js-visible');
        }
    });
    $('.nav__menu-overlay').on('click', function() {
        closeNav();
        toggleSearch('close')
        $('.nav__menu-overlay').removeClass('js-visible');
    });

    //prevent default clicking on direct children of .nav__primary
    $('.nav__primary').children('.nav__menu-links').children('a').on('click', function(event) {
        event.preventDefault();
    });
    //open submenu
    $('.nav__menu-links').children('a').on('click', function(event) {
        if (!checkWindowWidth())
            event.preventDefault();
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
    $('.js-go-back').on('click', function() {
        $(this).parent('ul').addClass('js-hidden').parent('.nav__menu-links').parent('ul').removeClass('js-moves-out');
    });

    function closeNav() {
        $('.nav__menu-trigger').removeClass('js-visible');
        $('.nav__header').removeClass('js-visible');
        $('.nav__primary').removeClass('js-visible');
        $('.nav__menu-links ul').addClass('js-hidden');
        $('.nav__menu-links a').removeClass('selected');
        $('.js-moves-out').removeClass('js-moves-out');
        $('.main__content').removeClass('js-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
            $('body').removeClass('overflow-hidden');
        });
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

            ($('.nav__search').hasClass('js-visible'))
                ? $('.nav__menu-overlay').addClass('js-visible')
                : $('.nav__menu-overlay').removeClass('js-visible');
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
        var navigation = $('.nav__menu-mobile');
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

/*! jQuery Mobile v1.4.5 | Copyright 2010, 2014 jQuery Foundation, Inc. | jquery.org/license */

(function(e, t, n) {
    typeof define == "function" && define.amd
        ? define(["jquery"], function(r) {
            return n(r, e, t),
            r.mobile
        })
        : n(e.jQuery, e, t)
})(this, document, function(e, t, n, r) {
    (function(e, t, n, r) {
        function T(e) {
            while (e && typeof e.originalEvent != "undefined")
                e = e.originalEvent;
            return e
        }
        function N(t, n) {
            var i = t.type,
                s,
                o,
                a,
                l,
                c,
                h,
                p,
                d,
                v;
            t = e.Event(t),
            t.type = n,
            s = t.originalEvent,
            o = e.event.props,
            i.search(/^(mouse|click)/) > -1 && (o = f);
            if (s)
                for (p = o.length, l; p;)
                    l = o[--p],
                    t[l] = s[l];
        i.search(/mouse(down|up)|click/) > -1 && !t.which && (t.which = 1);
            if (i.search(/^touch/) !== -1) {
                a = T(s),
                i = a.touches,
                c = a.changedTouches,
                h = i && i.length
                    ? i[0]
                    : c && c.length
                        ? c[0]
                        : r;
                if (h)
                    for (d = 0, v = u.length; d < v; d++)
                        l = u[d],
                        t[l] = h[l]
            }
            return t
        }
        function C(t) {
            var n = {},
                r,
                s;
            while (t) {
                r = e.data(t, i);
                for (s in r)
                    r[s] && (n[s] = n.hasVirtualBinding = !0);
                t = t.parentNode
            }
            return n
        }
        function k(t, n) {
            var r;
            while (t) {
                r = e.data(t, i);
                if (r && (!n || r[n]))
                    return t;
                t = t.parentNode
            }
            return null
        }
        function L() {
            g = !1
        }
        function A() {
            g = !0
        }
        function O() {
            E = 0,
            v.length = 0,
            m = !1,
            A()
        }
        function M() {
            L()
        }
        function _() {
            D(),
            c = setTimeout(function() {
                c = 0,
                O()
            }, e.vmouse.resetTimerDuration)
        }
        function D() {
            c && (clearTimeout(c), c = 0)
        }
        function P(t, n, r) {
            var i;
            if (r && r[t] || !r && k(n.target, t))
                i = N(n, t),
                e(n.target).trigger(i);
            return i
        }
        function H(t) {
            var n = e.data(t.target, s),
                r;
            !m && (!E || E !== n) && (r = P("v" + t.type, t), r && (r.isDefaultPrevented() && t.preventDefault(), r.isPropagationStopped() && t.stopPropagation(), r.isImmediatePropagationStopped() && t.stopImmediatePropagation()))
        }
        function B(t) {
            var n = T(t).touches,
                r,
                i,
                o;
            n && n.length === 1 && (r = t.target, i = C(r), i.hasVirtualBinding && (E = w++, e.data(r, s, E), D(), M(), d = !1, o = T(t).touches[0], h = o.pageX, p = o.pageY, P("vmouseover", t, i), P("vmousedown", t, i)))
        }
        function j(e) {
            if (g)
                return;
            d || P("vmousecancel", e, C(e.target)),
            d = !0,
            _()
        }
        function F(t) {
            if (g)
                return;
            var n = T(t).touches[0],
                r = d,
                i = e.vmouse.moveDistanceThreshold,
                s = C(t.target);
            d = d || Math.abs(n.pageX - h) > i || Math.abs(n.pageY - p) > i,
            d && !r && P("vmousecancel", t, s),
            P("vmousemove", t, s),
            _()
        }
        function I(e) {
            if (g)
                return;
            A();
            var t = C(e.target),
                n,
                r;
            P("vmouseup", e, t),
            d || (n = P("vclick", e, t), n && n.isDefaultPrevented() && (r = T(e).changedTouches[0], v.push({touchID: E, x: r.clientX, y: r.clientY}), m = !0)),
            P("vmouseout", e, t),
            d = !1,
            _()
        }
        function q(t) {
            var n = e.data(t, i),
                r;
            if (n)
                for (r in n)
                    if (n[r])
                        return !0;
        return !1
        }
        function R() {}
        function U(t) {
            var n = t.substr(1);
            return {
                setup: function() {
                    q(this) || e.data(this, i, {});
                    var r = e.data(this, i);
                    r[t] = !0,
                    l[t] = (l[t] || 0) + 1,
                    l[t] === 1 && b.bind(n, H),
                    e(this).bind(n, R),
                    y && (l.touchstart = (l.touchstart || 0) + 1, l.touchstart === 1 && b.bind("touchstart", B).bind("touchend", I).bind("touchmove", F).bind("scroll", j))
                },
                teardown: function() {
                    --l[t],
                    l[t] || b.unbind(n, H),
                    y && (--l.touchstart, l.touchstart || b.unbind("touchstart", B).unbind("touchmove", F).unbind("touchend", I).unbind("scroll", j));
                    var r = e(this),
                        s = e.data(this, i);
                    s && (s[t] = !1),
                    r.unbind(n, R),
                    q(this) || r.removeData(i)
                }
            }
        }
        var i = "virtualMouseBindings",
            s = "virtualTouchID",
            o = "vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "),
            u = "clientX clientY pageX pageY screenX screenY".split(" "),
            a = e.event.mouseHooks
                ? e.event.mouseHooks.props
                : [],
            f = e.event.props.concat(a),
            l = {},
            c = 0,
            h = 0,
            p = 0,
            d = !1,
            v = [],
            m = !1,
            g = !1,
            y = "addEventListener" in n,
            b = e(n),
            w = 1,
            E = 0,
            S,
            x;
        e.vmouse = {
            moveDistanceThreshold: 10,
            clickDistanceThreshold: 10,
            resetTimerDuration: 1500
        };
        for (x = 0; x < o.length; x++)
            e.event.special[o[x]] = U(o[x]);
        y && n.addEventListener("click", function(t) {
            var n = v.length,
                r = t.target,
                i,
                o,
                u,
                a,
                f,
                l;
            if (n) {
                i = t.clientX,
                o = t.clientY,
                S = e.vmouse.clickDistanceThreshold,
                u = r;
                while (u) {
                    for (a = 0; a < n; a++) {
                        f = v[a],
                        l = 0;
                        if (u === r && Math.abs(f.x - i) < S && Math.abs(f.y - o) < S || e.data(u, s) === f.touchID) {
                            t.preventDefault(),
                            t.stopPropagation();
                            return
                        }
                    }
                    u = u.parentNode
                }
            }
        }, !0)
    })(e, t, n),
    function(e) {
        e.mobile = {}
    }(e),
    function(e, t) {
        var r = {
            touch: "ontouchend" in n
        };
        e.mobile.support = e.mobile.support || {},
        e.extend(e.support, r),
        e.extend(e.mobile.support, r)
    }(e),
    function(e, t, r) {
        function l(t, n, i, s) {
            var o = i.type;
            i.type = n,
            s
                ? e.event.trigger(i, r, t)
                : e.event.dispatch.call(t, i),
            i.type = o
        }
        var i = e(n),
            s = e.mobile.support.touch,
            o = "touchmove scroll",
            u = s
                ? "touchstart"
                : "mousedown",
            a = s
                ? "touchend"
                : "mouseup",
            f = s
                ? "touchmove"
                : "mousemove";
        e.each("touchstart touchmove touchend tap taphold swipe swipeleft swiperight scrollstart scrollstop".split(" "), function(t, n) {
            e.fn[n] = function(e) {
                return e
                    ? this.bind(n, e)
                    : this.trigger(n)
            },
            e.attrFn && (e.attrFn[n] = !0)
        }),
        e.event.special.scrollstart = {
            enabled: !0,
            setup: function() {
                function s(e, n) {
                    r = n,
                    l(t, r
                        ? "scrollstart"
                        : "scrollstop", e)
                }
                var t = this,
                    n = e(t),
                    r,
                    i;
                n.bind(o, function(t) {
                    if (!e.event.special.scrollstart.enabled)
                        return;
                    r || s(t, !0),
                    clearTimeout(i),
                    i = setTimeout(function() {
                        s(t, !1)
                    }, 50)
                })
            },
            teardown: function() {
                e(this).unbind(o)
            }
        },
        e.event.special.tap = {
            tapholdThreshold: 750,
            emitTapOnTaphold: !0,
            setup: function() {
                var t = this,
                    n = e(t),
                    r = !1;
                n.bind("vmousedown", function(s) {
                    function a() {
                        clearTimeout(u)
                    }
                    function f() {
                        a(),
                        n.unbind("vclick", c).unbind("vmouseup", a),
                        i.unbind("vmousecancel", f)
                    }
                    function c(e) {
                        f(),
                        !r && o === e.target
                            ? l(t, "tap", e)
                            : r && e.preventDefault()
                    }
                    r = !1;
                    if (s.which && s.which !== 1)
                        return !1;
                    var o = s.target,
                        u;
                    n.bind("vmouseup", a).bind("vclick", c),
                    i.bind("vmousecancel", f),
                    u = setTimeout(function() {
                        e.event.special.tap.emitTapOnTaphold || (r = !0),
                        l(t, "taphold", e.Event("taphold", {target: o}))
                    }, e.event.special.tap.tapholdThreshold)
                })
            },
            teardown: function() {
                e(this).unbind("vmousedown").unbind("vclick").unbind("vmouseup"),
                i.unbind("vmousecancel")
            }
        },
        e.event.special.swipe = {
            scrollSupressionThreshold: 30,
            durationThreshold: 1e3,
            horizontalDistanceThreshold: 30,
            verticalDistanceThreshold: 30,
            getLocation: function(e) {
                var n = t.pageXOffset,
                    r = t.pageYOffset,
                    i = e.clientX,
                    s = e.clientY;
                if (e.pageY === 0 && Math.floor(s) > Math.floor(e.pageY) || e.pageX === 0 && Math.floor(i) > Math.floor(e.pageX))
                    i -= n,
                    s -= r;
                else if (s < e.pageY - r || i < e.pageX - n)
                    i = e.pageX - n,
                    s = e.pageY - r;
                return {x: i, y: s}
            },
            start: function(t) {
                var n = t.originalEvent.touches
                        ? t.originalEvent.touches[0]
                        : t,
                    r = e.event.special.swipe.getLocation(n);
                return {
                    time: (new Date).getTime(),
                    coords: [
                        r.x, r.y
                    ],
                    origin: e(t.target)
                }
            },
            stop: function(t) {
                var n = t.originalEvent.touches
                        ? t.originalEvent.touches[0]
                        : t,
                    r = e.event.special.swipe.getLocation(n);
                return {
                    time: (new Date).getTime(),
                    coords: [r.x, r.y]
                }
            },
            handleSwipe: function(t, n, r, i) {
                if (n.time - t.time < e.event.special.swipe.durationThreshold && Math.abs(t.coords[0] - n.coords[0]) > e.event.special.swipe.horizontalDistanceThreshold && Math.abs(t.coords[1] - n.coords[1]) < e.event.special.swipe.verticalDistanceThreshold) {
                    var s = t.coords[0] > n.coords[0]
                        ? "swipeleft"
                        : "swiperight";
                    return l(r, "swipe", e.Event("swipe", {
                        target: i,
                        swipestart: t,
                        swipestop: n
                    }), !0),
                    l(r, s, e.Event(s, {
                        target: i,
                        swipestart: t,
                        swipestop: n
                    }), !0),
                    !0
                }
                return !1
            },
            eventInProgress: !1,
            setup: function() {
                var t,
                    n = this,
                    r = e(n),
                    s = {};
                t = e.data(this, "mobile-events"),
                t || (t = {
                    length: 0
                }, e.data(this, "mobile-events", t)),
                t.length++,
                t.swipe = s,
                s.start = function(t) {
                    if (e.event.special.swipe.eventInProgress)
                        return;
                    e.event.special.swipe.eventInProgress = !0;
                    var r,
                        o = e.event.special.swipe.start(t),
                        u = t.target,
                        l = !1;
                    s.move = function(t) {
                        if (!o || t.isDefaultPrevented())
                            return;
                        r = e.event.special.swipe.stop(t),
                        l || (l = e.event.special.swipe.handleSwipe(o, r, n, u), l && (e.event.special.swipe.eventInProgress = !1)),
                        Math.abs(o.coords[0] - r.coords[0]) > e.event.special.swipe.scrollSupressionThreshold && t.preventDefault()
                    },
                    s.stop = function() {
                        l = !0,
                        e.event.special.swipe.eventInProgress = !1,
                        i.off(f, s.move),
                        s.move = null
                    },
                    i.on(f, s.move).one(a, s.stop)
                },
                r.on(u, s.start)
            },
            teardown: function() {
                var t,
                    n;
                t = e.data(this, "mobile-events"),
                t && (n = t.swipe, delete t.swipe, t.length--, t.length === 0 && e.removeData(this, "mobile-events")),
                n && (n.start && e(this).off(u, n.start), n.move && i.off(f, n.move), n.stop && i.off(a, n.stop))
            }
        },
        e.each({
            scrollstop: "scrollstart",
            taphold: "tap",
            swipeleft: "swipe.left",
            swiperight: "swipe.right"
        }, function(t, n) {
            e.event.special[t] = {
                setup: function() {
                    e(this).bind(n, e.noop)
                },
                teardown: function() {
                    e(this).unbind(n)
                }
            }
        })
    }(e, this)
});


jQuery(window).resize(function(){

       if ($(window).width() >= 1025) {

           var $sidebar   = $("#banner__artists");

           // Prevent jQuery error of 'top undefined' to check if element exist and then execute function
           if( $sidebar.length ) {
               var $window    = $(window),
                   offset     = $sidebar.offset(),
                   topPadding = 140;

                   $window.scroll(function() {
                       if ($window.scrollTop() > offset.top) {
                           $sidebar.stop().animate({
                               marginTop: $window.scrollTop() - offset.top + topPadding
                           }, 50, "linear" );
                       } else {
                           $sidebar.stop().animate({
                               marginTop: 0
                           });
                       }
                   });
           }

       }

});
