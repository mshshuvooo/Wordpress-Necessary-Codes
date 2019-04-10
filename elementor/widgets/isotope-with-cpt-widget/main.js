(function($) {
    var foodMenuFilter = function ($scope, $) {

        $('.food-filter-btns').each( function( i, filterDaynamicId ) {
            var $filterDaynamicId = $( filterDaynamicId );

            var grid = $filterDaynamicId.data('target');
                $(grid).isotope({
                    itemSelector: '.single-food-item',
                })
                
          // filter items on button click
            $filterDaynamicId.on( 'click', 'button', function() {
                var $this = $( this );
                // filter isotope
                var filterValue = $this.attr('data-filter');
                $(grid).isotope({ filter: filterValue })
                // change selected
                $filterDaynamicId.find('.active').removeClass('active');
                $this.addClass('active');
            });




        });

    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/BlueLion_Food_Menus.default', foodMenuFilter);
    });



    
})(jQuery);
