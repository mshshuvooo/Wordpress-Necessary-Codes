(function($) {
    var foodMenuFilter = function ($scope, $) {
        var $menuFilter = $scope.find('.food-menus-wrapper');
        var $menuDaynamicId = '#' + $menuFilter.attr('id');
        

            $($menuDaynamicId ).each( function() {
                $(".food-menu-filter li").on("click", function(){
                    
                    var selector = $(this).attr("data-filter");
                    $($menuDaynamicId ).isotope({
                        filter: selector
                    });
                });
                $($menuDaynamicId ).isotope();
            });
        
        
        
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/BlueLion_Food_Menus.default', foodMenuFilter);
    });



    
})(jQuery);