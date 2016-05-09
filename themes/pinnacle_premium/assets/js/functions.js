var $=jQuery.noConflict();

(function($){

    "use strict";

    $(function(){
    	
        new WOW().init();

        $('.js-white-paper-form').submit( function(e){
            e.preventDefault();
            var data = $(this).serialize();
            sendPDF( data );
        });
        
    });

})(jQuery);

function sendPDF( data ){
    $.post(
        ajax_url,
        data,
        function( response ){
            console.log( response );
        }
    );
}
