/**
 * Name file:   Solid-navbar
 * Description: Make navigation solid to scroll
 *
 * Version: 1.0
 * Author: Enza Lombardo
 */

(function($) {

    $(document).ready(function() {
        // Transition effect for navbar
        $(window).scroll(function() {
            // checks if window is scrolled more than 500px, adds/removes solid class
            if($(this).scrollTop() > 100) {
                $('.navbar').addClass('solid');
            } else {
                $('.navbar').removeClass('solid');
            }
        });
    });

})(jQuery);