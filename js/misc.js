// Prevent automatic browser scroll on refresh
jQuery(window).on('unload', function () {
    jQuery(window).scrollTop(0);
});