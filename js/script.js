/*! share mode popup */
var iTunes = jQuery.noConflict();
iTunes(document).ready(function(){
  iTunes('.actions li span').each( function() {
   iTunes(this).click(function(){
    var X=iTunes(this).attr('data-uri');
    if(X==null | X=='0'){
      iTunes(this).removeClass('selected');
      iTunes(this).parent('.node').find('.message').removeClass('visible');
      iTunes(this).attr('data-uri', '1');
    } else {
      iTunes(this).addClass('selected');
      iTunes(this).parent('.node').find('.message').addClass('visible');
      iTunes(this).attr('data-uri', '0');
    }
  });
 });
}); 


iTunes(document).ready(function ($) {
  iTunes('#bvtPodcastImage_button').click(function() {
    iTunes(this).attr('data-open','1');
    formfield = iTunes('#bvtPodcastImage').attr('name');
    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
    return false;
  });
  iTunes('#bvtMusicLogo_button').click(function() {
    iTunes(this).attr('data-open','1');
    formfield = iTunes('#bvtMusicLogo').attr('name');
    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
    return false;
  });
  window.send_to_editor = function(html) {
    imgurl = iTunes('img',html).attr('src');

    if (iTunes('#bvtMusicLogo_button').attr('data-open') == "1") {
        iTunes('#bvtMusicLogo').attr('data-open','0');
        iTunes('#bvtMusicLogo').val(imgurl);
        iTunes('#bvtMusicLogo_thumb').html("<img width='100%' src='"+imgurl+"'/>");
    } else if (iTunes('#bvtPodcastImage_button').attr('data-open') == "1") {
        iTunes('#bvtPodcastImage').attr('data-open','0');
        iTunes('#bvtPodcastImage').val(imgurl);
        iTunes('#bvtPodcastImage_thumb').html("<img width='100%' src='"+imgurl+"'/>");
    }
        tb_remove();
  }
  
}); 