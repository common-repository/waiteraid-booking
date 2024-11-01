(function ($) {
    /* Admin menu icons */
    var $menuItem = $("#adminmenu li.menu-top.toplevel_page_waiteraid-booking");

    if(!$menuItem.hasClass("current")) {
        var $waiterAidIcon = $menuItem.find("a > .wp-menu-image");

        $menuItem.hover(
            function() {
                $waiterAidIcon.addClass("waiteraid-booking-menu-item-hover");
            },
            function() {
                $waiterAidIcon.removeClass("waiteraid-booking-menu-item-hover");
            }
        );
    }
})(jQuery);
