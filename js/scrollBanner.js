// jQuery(window).resize(function(){
//     if (jQuery(window).width() >= 1025) {
//         var $sidebar   = jQuery("#banner__artists");

//         // Prevent jQuery error of 'top undefined' to check if element exist and then execute function
//         if( $sidebar.length ) {
//             var $window    = jQuery(window),
//                 offset     = $sidebar.offset(),
//                 topPadding = 140;

//                 $window.scroll(function() {
//                     if ($window.scrollTop() > offset.top) {
//                         $sidebar.stop().animate({
//                             marginTop: $window.scrollTop() - offset.top + topPadding
//                         }, 50, "linear" );
//                     } else {
//                         $sidebar.stop().animate({
//                             marginTop: 0
//                         });
//                     }
//                 });
//        }
//    }
// });