/*! share mode popup */
var q = jQuery.noConflict();
q(document).ready(function(){
    // q("#more").click(function(){
    //     var X=q(this).attr('data-uri');
    //       if(X==1){
    //         q(this).removeClass('unselectable');
    //         q(".playlist").show();
    //         q("#embedcode").hide();
    //         q(this).attr('data-uri', '0');
    //       } else{
    //         q(this).addClass('unselectable');
    //         q(".playlist").hide();
    //         q("#embedcode").show();
    //         q(this).attr('data-uri', '1');
    //       }
    // });


    q('.actions li span').each( function() {
         q(this).click(function(){
        var X=q(this).attr('data-uri');
          if(X==1){
            q(this).removeClass('selected');
            q(this).parent('.node').find('.message').removeClass('visible');
            q(this).attr('data-uri', '0');
          } else{
            q(this).addClass('selected');
            q(this).parent('.node').find('.message').addClass('visible');
            q(this).attr('data-uri', '1');
          }
           });
    });


 }); 
