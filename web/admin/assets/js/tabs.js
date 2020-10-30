(function($){
    'use strict';
    $(document).ready(function () {
        $('[data-st-tab]').each(function () {
            var id = $(this).attr('href')
            var tabId = $(this).attr('data-st-tab')
            $(this).click(function () {
                $('[data-role=' + tabId + '] .active').removeClass('active')
                $('[data-role=' + tabId + '] ' + id).addClass('active')
                $('[data-role="st-tabnav"] .active').removeClass('active')
                $(this).addClass('active');

            });
        });
    });
})(jQuery);