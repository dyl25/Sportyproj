(function($) {
    $(document).ready(function() {
        $linkNav = $('nav#mainNavbar div.navbar-right ul.nav > li > a');
        $linkNav.hover(function() {
            $(this).addClass('hvr-underline-from-center');
        });
    });
})(jQuery);
