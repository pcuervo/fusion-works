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
            var status = $.parseJSON(response)
            console.log( status.error );
            if ( status.error == 1 ){

                if ( $('.js-form-success').length ){
                    $('.js-form-success').remove();
                 }
                $('.testimonial-form-container').after('<h4 class="[ text-center ][ color-primary ][ js-form-error ]">An error has occurred. <br /> Please try again later.</h4>');

            } else {

                 if ( $('.js-form-error').length ){
                    $('.js-form-error').remove();
                 }
                $('.testimonial-form-container').after('<h4 class="[ text-center ][ color-primary ][ js-form-success ]">Great, we have sent you an email with the white paper you requested.</h4>');

            }
        }
    );
}
