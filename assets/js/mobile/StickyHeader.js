/**
 * Add css classes, so model switching navbar is fixed
 * only for page with sunglasses (only that page have 
 * this script included).
 */
$(document).ready(function() {
    var $modelSwitchingNavbar = $('.model-switching-navbar');
    $modelSwitchingNavbar.addClass('fixed');
    var $navbarContainer = $('#navbar');
    $navbarContainer.addClass('fixed-inner-model-switching-navbar');
});



/**
 * Tried to do sticky header via JS, but then realized that
 * I can do it via css... :D
 */
 
//var navbarContainerNewPaddingTop  = parseInt($navbarContainer.css('padding-top'), 10) + $modelSwitchingNavbar.height();
//console.debug('navbarContainerNewPaddingTop: ', navbarContainerNewPaddingTop);
//$navbarContainer.css('padding-top', navbarContainerNewPaddingTop + 'px');

//var $modelSwitchingNavbar = $('.model-switching-navbar');
//var $window = $(window);
//var navbarOffsetTop = $modelSwitchingNavbar.offset().top;
//var updateTimeout;
//var SCROLL_DELAY_MS = 300;
//
//$(window).on('scroll', function(event) {
//    window.clearTimeout(updateTimeout);
//    updateTimeout = window.setTimeout(updateNavbarPosition, SCROLL_DELAY_MS);
//});
//
//function updateNavbarPosition() {
//    console.debug('updateNavbarPosition()');
//    if ($window.scrollTop() > navbarOffsetTop) {
//        $modelSwitchingNavbar.addClass('fixed');
//    } else {
//        $modelSwitchingNavbar.removeClass('fixed');
//    }
//}
