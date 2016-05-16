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

        if ( $('.testimonial-form-container').length ){
             injectLoader();
        }




    });

})(jQuery);

function sendPDF( data ){
    $('.js-loader').show();
    $.post(
        ajax_url,
        data,
        function( response ){
            $('.js-loader').hide();
            var status = $.parseJSON(response)
            if ( status.error == 1 ){

                if ( $('.js-form-success').length ){
                    $('.js-form-success').remove();
                }
                if ( $('.js-form-error').length ){
                    $('.js-form-error').remove();
                }
                $('.testimonial-form-container').after('<h5 class="[ text-center ][ color-primary ][ js-form-error ]">An error has occurred. <br /> Please try again later.</h5>');

            } else {
                if ( $('.js-form-success').length ){
                    $('.js-form-success').remove();
                }
                 if ( $('.js-form-error').length ){
                    $('.js-form-error').remove();
                 }
                $('.testimonial-form-container').after('<div class="[ text-center ][ color-primary ][ js-form-success ]"><h5>Thank you for your interest in our White Paper: Implementing ERP: Best Practices</h5><h5>You will receive our awesome content over email shortly.Get more business insights by following us at:</h5><div class="[ textwidget text-center ]"><p style="display: inline-block; margin-right: 10px; text-align: center;"><a href="http://www.linkedin.com/company/fusionworks?trk=fc_badge" id="kadbtn11" target="_blank" class="kad-btn btn-shortcode kad-btn-primary" style="border-radius: 50%;"><i class="kt-icon-linkedin2"></i></a></p><p style="display: inline-block; margin-right: 10px; text-align: center;"><a href="http://www.facebook.com/pages/San-Juan-Puerto-Rico/Fusionworks-Inc/167798349901765" id="kadbtn53" target="_blank" class="kad-btn btn-shortcode kad-btn-primary" style="border-radius: 50%;"><i class="kt-icon-facebook2"></i></a></p></div></div>');

            }
        }
    );
}


function injectLoader(){
    $('.testimonial-form-container').after('<div class="[ loader js-loader ]"><img src="http://fwprnew.fwpr.com/wp-content/themes/pinnacle_premium/assets/img/ajax-loader-fw.gif" alt="loading…"></div>');
}