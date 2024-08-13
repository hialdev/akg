$(document).ready(function() {
    $('.btn-menu-dropdown').click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        // Toggle the visibility of the corresponding mega menu
        $(this).next('.mega-menu-mobile').slideToggle();
    });
    $('.btn-menu-mobile').click(function() {
        // Slide the menu into view by sliding down
        $('.menu-mobile-nav').show();
    });

    $('.btn-close-menu-mobile').click(function() {
        // Slide the menu out of view by sliding up
        $(this).closest('.menu-mobile-nav').hide();
    });
});