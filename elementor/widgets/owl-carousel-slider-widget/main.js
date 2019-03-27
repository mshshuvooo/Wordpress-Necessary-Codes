(function($) {
    var OwlCarousel = function ($scope, $) {
        var $carousel = $scope.find('.pnw-slider-wrapper');
        var $sliderDynamicId = '#' + $carousel.attr('id');
        var $countSlide = $carousel.data('countslide');

        if( $countSlide > 1 ){
            $($sliderDynamicId).each( function() {
                $carousel.owlCarousel({
                    dots : $carousel.data("dots"),
                    nav : $carousel.data("nav"),
                    loop : $carousel.data("loop"),
                    autoplay : $carousel.data("autoplay"),
                    autoplayTimeout : $carousel.data("autoplay-timeout"),
                    mouseDrag : $carousel.data("mouse-drag"),
                    touchDrag : $carousel.data("touch-drag"),
                    items: 1,
                    autoplayHoverPause: true,
                    navText : ["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],
                });
            });
        }
        
        
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/pnw-slider.default', OwlCarousel);
    });



    
})(jQuery);