jQuery(document).ready(function ($) {
    function ctaBoxHeight() {
        var height = 0,
            widgetElm = $('.home-widget-cta .widget');
        widgetElm.each(function (e) {
            height = Math.max(height, $(this).height());
            console.log(height);
        });
        widgetElm.css('height', height);
    }

    $(window).resize(function () {
        ctaBoxHeight();
    });

    ctaBoxHeight();
});
