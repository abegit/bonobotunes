/*! share mode popup */
var iTunes = jQuery.noConflict();
iTunes(document).ready(function(){
    iTunes('.toggle-all').click(function(){
      var Y=iTunes(this).attr('data-uri');
      if(Y==null | Y=='0'){
          iTunes(this).text('Close All').attr('data-uri', '1');
          iTunes('.node').addClass('ui-open');
          iTunes('.message').addClass('visible');
          iTunes('.actions li span').attr('data-uri', '1');
       } else {
          iTunes(this).text('Expand All').attr('data-uri', '0');
          iTunes('.node').removeClass('ui-open');
          iTunes('.message').removeClass('visible');
          iTunes('.actions li span').attr('data-uri', '0');
      }
    });
  iTunes('.actions li span').each( function() {
   iTunes(this).click(function(){
    var X=iTunes(this).attr('data-uri');
    if(X==null | X=='0'){
      iTunes(this).parent('.node').addClass('ui-open');
      iTunes(this).parent('.node').find('.message').addClass('visible');
      iTunes(this).attr('data-uri', '1');
    } else {
      iTunes(this).parent('.node').removeClass('ui-open');
      iTunes(this).parent('.node').find('.message').removeClass('visible');
      iTunes(this).attr('data-uri', '0');
    }
  });
 });
}); 


iTunes(document).ready(function ($) {
  iTunes('.wpss-filebtn').click(function() {
    iTunes(this).attr('data-open','1');
    titlevar = iTunes(this).attr('id').split('_button');
    // formfield = iTunes('#'+titlevar).attr('name');
    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
    return false;
  });

  window.send_to_editor = function(html) {
    imgurl = iTunes('img',html).attr('src');

    if (iTunes('#bvtMusicLogo_button').attr('data-open') == "1") {
        iTunes('#bvtMusicLogo_button').attr('data-open','0');
        iTunes('#bvtMusicLogo').val(imgurl);
        iTunes('#bvtMusicLogo_thumb').html("<img width='100%' src='"+imgurl+"'/>");
    } else if (iTunes('#bvtMusicSponsor_button').attr('data-open') == "1") {
        iTunes('#bvtMusicSponsor_button').attr('data-open','0');
        iTunes('#bvtMusicSponsor').val(imgurl);
        iTunes('#bvtMusicSponsor_thumb').html("<img width='100%' src='"+imgurl+"'/>");
    } else if (iTunes('#bvtPodcastImage_button').attr('data-open') == "1") {
        iTunes('#bvtPodcastImage_button').attr('data-open','0');
        iTunes('#bvtPodcastImage').val(imgurl);
        iTunes('#bvtPodcastImage_thumb').html("<img width='100%' src='"+imgurl+"'/>");
    }
        tb_remove();
  }
  
}); 