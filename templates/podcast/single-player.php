<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo get_option('iTunesPodcastTitle'); ?></title>
    <meta name="viewport" content="width=device-width" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|PT+Sans+Caption|Paytone+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo plugins_url( '/assets/style.css', dirname(__FILE__) );?>">
    <link rel="stylesheet" href="<?php echo plugins_url( '/assets/icos.css', dirname(__FILE__) );?>">
    <link rel="stylesheet" href="<?php echo plugins_url( '/assets/css/swiper.min.css', dirname(__FILE__) ); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url( '/assets/css/fade.css', dirname(__FILE__) ); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url( '/assets/css/coverflow.css', dirname(__FILE__) ); ?>">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/gfeedfetcher.js', dirname(__FILE__) );?>"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28070375-3', 'auto');
  ga('send', 'pageview');

</script>
</head>

<?php $afil = $_GET["autoplay"]; ?>
<body<?php if (isset($afil)) { ?> onLoad="playPause()"<?php } ?> class="bp-sm loading">
<div class="overlay"><div class="pulse">woah</div></div>
    <div id="header"><div class="container">
        <?php $logoImg = get_option('iTunesPodcastImage'); ?>
       <a href="#"><?php if (isset($logoImg)) { ?>
        <img height="11" src="<?php echo $logoImg; ?>">
        <?php } else { ?>
        BonoboRadio
        <?php }?>
        </a>
        <ul id="nav">

        <li><a href="#">Something Else <i class="ico-publish"></i> </a></li>
        <li><a href="#" onclick="myFunction('<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>')">Open Player <i class="ico-publish"></i> </a></li>
        <li style="width:100% !important; clear:both;"></li>
    </ul>
   </div></div>




<div id="content">
    <!--  end radio -->

    <div class="home">
        <div style="padding:30px 0;max-width:960px; margin:0 auto;">
            <h3>Need To Talk?</h3>
            <a href="tel:3105680066">Call Us (310) 568-0066</a><br>
        <ul class="actions">
            <li> <?php echo get_option('iTunesAuthorName'); ?>
            <div class="message"><?php echo get_option('iTunesPodcastTitle'); ?><?php echo get_option('iTunesPodcastSummary'); ?><br>
                <br><?php if( is_home() ) { echo get_bloginfo( 'title' ); }
  elseif (is_category() ) { echo single_cat_title(); }
  elseif (is_single() || is_page()) { the_title(); }
  elseif (is_search()) { echo $s; }
  elseif (is_404()) { echo "Sorry not found"; }
  else {echo the_title();} ?>
</div></li>
            <li>Tracklisting
            <div class="message"><?php echo get_option('iTunesPodcastImage'); ?></div></li>
            <li>Attend a Show
            <div class="message">this is the info i want you to read.</div></li>
            <li>Sponsors
            <div class="message">this is the info i want you to read.</div></li>
        </ul>
        </div>
    </div>

    <div class="radio">
    <div class="container">
        <div id="info">
            <div id="nowplay">
                "<span id="track">Nothing Playing</span>" by
                <strong id="artist">One Mic</strong> 
            </div>
            <form id="searchform" style="position:absolute; top:100px; right:0;z-index: 999;">
                <input type="text" value="" id="s">
                <input type="submit" value="Submit">
            </form>
                 <div id="embedcode"  style="display:none;">
                    <h1>Embed Code</h1>
                    <textarea readonly style="background: #000; color: #444; border-radius: 10px; font-size: 18px; max-width: 100%; min-width: 50%;"><iframe width="640px" height="240px" style="-webkit-border-radius: 4px; -webkit-box-shadow: 0 4px 0 #707070; -moz-border-radius: 4px; -moz-box-shadow: 0 4px 0 #707070; -o-border-radius: 4px; -o-box-shadow: 0 4px 0 #707070; border-radius: 4px; box-shadow: 0 4px 0 #707070; display: block;" frameborder="0" src="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"></iframe></textarea></div>
        <div class='nav'>        
            <div class='next'><i class="ico-next"></i></div>
            <div class='prev unselectable'><i class="ico-previous"></i></div>
            <div id='more'><div id="thumb"><img src=""></div></div>
        </div>
        <div id="artwork" style="position:relative; display:inline-block;">
                <a href="#" onclick="playPause()" id="play"><i class="ico-play"></i></a>
                <div id="img"><img src="" id="megaAlbum"></div>
                <div id="advertisement" style="background:url('') repeat scroll center center / contain  rgba(0, 0, 0, 0);height:100%;width:100%;"></div>
                <div id="warningGradientOuterBarG">
                    <div id="warningGradientFrontBarG" class="warningGradientAnimationG">
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                    </div>
                </div>
                <div style="clear:both"></div>
        </div>
        <div class="on" id="tracklist"><div class="swiper-container playlist">
            <div class="swiper-wrapper" id="tracks">
                
            </div>
            <div class="swiper-pagination2" style="display: none;"></div>
        </div></div> <!-- end panel -->
        <div id="brief">
            <div id="back" onClick="goBack()" style="line-height:35px; font-family:Arial, sans serif; display:block; background:#fff;"><- Go Back to Tracklist</div>
            <div class="swiper-container coverflow" dir="rtl">
                <div class="swiper-wrapper" id="albumstack"></div>
            </div>

                <div class="swiper-container fade" dir="rtl">
                    <div class="swiper-wrapper">
                            <!-- Do other stuff... -->
                         <?php // The Loop
                            $i = 0; ?>
                            <?php global $post;
                            $numTracks = $_GET["tracks"];
                                if (!isset($numTracks)) {
                                    $numTracks = 999;
                                }
                            $args = array( 'numberposts' => $numTracks);
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) :
                              setup_postdata($post);
                          $do_not_duplicate = $post->ID; ?>

                        <?php $albumFull = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                              $albumThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                              $artistName = get_the_author(); ?>
                    <div class="swiper-slide swiper-slide-<?php echo $i; ?>" data-author="<?php echo $artistName; ?>" data-title="<?php the_title(); ?>" data-mp3="<?php Cus_enc(); ?>" data-image="<?php echo $albumFull[0]; ?>" data-thumb="<?php echo $albumThumb[0]; ?>">
                        <?php $textInfo = get_the_content(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php $author_id = $post->post_author;
                        echo $artistName;
                        echo get_avatar( $author_id, 32 ); ?>
                        <h2 id='dc' onClick="pickSong(<?php echo $i; ?>);ga('send', 'event', 'mobile', 'Order Items', '<?php the_title(); ?>');" >Play song</h2>
                        <?php echo get_option('iTunesPodcastTitle'); ?>
                        <p><?php echo $textInfo; ?></p>

                    </div>
                    <?php if (!is_single()) { $i++; } ?>
                            <!-- Do stuff... -->
                        <?php endforeach; 
                            wp_reset_postdata(); ?>
<?php query_posts( array( 'post__not_in' => $do_not_duplicate) );
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

                        <?php $albumFull = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                              $albumThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                              $artistName = get_the_author(); ?>
                    <div class="swiper-slide swiper-slide-<?php echo $i; ?>" data-author="<?php echo $artistName; ?>" data-title="<?php the_title(); ?>" data-mp3="<?php Cus_enc(); ?>" data-image="<?php echo $albumFull[0]; ?>" data-thumb="<?php echo $albumThumb[0]; ?>">
                        <?php $textInfo = get_the_content(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php $author_id = $post->post_author;
                        echo $artistName;
                        echo get_avatar( $author_id, 32 ); ?>
                        <h2 id='dc' onClick="pickSong(<?php echo $i; ?>);ga('send', 'event', 'mobile', 'Order Items', '<?php the_title(); ?>');" >Play song</h2>
                        <?php echo get_option('iTunesPodcastTitle'); ?>
                        <p><?php echo $textInfo; ?></p>

                    </div>
                    <?php $i++;?>
                <!-- Do stuff... -->

    <!-- Do stuff... -->
<?php endwhile; ?>

<?php endif; ?>



                    </div> 
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
            </div> <!-- end fade swiper -->
        </div> <!-- end panel -->
        


        </div>
    </div>

</div>
</div>
<!--  end content -->







<div id="footer"><div class="container">
    <ul>
        <li id="player"></li>
        <li> <!-- <ul id="sites">
            <li data-uri="1"><img src="<?php echo plugins_url( '/assets/images/ico-bloggamy.png', dirname(__FILE__) );?>" alt=""></li>
            <li data-uri="2"><img src="<?php echo plugins_url( '/assets/images/ico-tv.png', dirname(__FILE__) );?>" alt=""></li>
            <li data-uri="3"><img src="<?php echo plugins_url( '/assets/images/ico-institute.png', dirname(__FILE__) );?>" alt=""></li>
            <li data-uri="4"><img src="<?php echo plugins_url( '/assets/images/ico-marketplace.png', dirname(__FILE__) );?>" alt=""></li>
            <li style="width:100% !important; clear:both;"></li>
            </ul> -->
        </li>
    </ul>

</div>
</div> <!-- end of footer -->
<div id="playerAd" style="display:none;"></div>


</body>



<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/jquery-1.9.1.min.js', dirname(__FILE__) );?>"></script>
<script>
var urls = new Array();
var trackImgs = new Array();
var trackThumb = new Array();
var trackTitles = new Array();
var trackAuthor = new Array();
$(".fade .swiper-slide").each(function(){
   if($.inArray($(this).data('mp3')) == -1) // check if not in array
       urls.push($(this).data('mp3'));
       $(this).removeAttr('data-mp3');
   if($.inArray($(this).data('image')) == -1) // check if not in array
       trackImgs.push($(this).data('image'));
       $(this).removeAttr('data-image');
   if($.inArray($(this).data('thumb')) == -1) // check if not in array
       trackThumb.push($(this).data('thumb'));
       $(this).removeAttr('data-thumb');
   if($.inArray($(this).data('title')) == -1) // check if not in array
       trackTitles.push($(this).data('title'));
       $(this).removeAttr('data-title');
   if($.inArray($(this).data('author')) == -1) // check if not in array
       trackAuthor.push($(this).data('author'));
       $(this).removeAttr('data-author');
});


var ixt;
document.write('<style>');
for (ixt = 0; ixt < trackImgs.length; ++ixt) {
    var currentIndex = ixt;
    // console.log(trackImgs[ixt]);
    document.write('.swiper-slide.swiper-slide-'+ currentIndex +' .album {background: url("'+trackImgs[ixt]+'") no-repeat 0 0; }')
    document.write('.swiper-slide.swiper-slide-'+ currentIndex +' .thumb {background: url("'+trackThumb[ixt]+'") no-repeat 0 0; }')
}
document.write('</style>');


var ixx;
for (ixx = 0; ixx < trackTitles.length; ++ixx) {
    var currentIndex = ixx;
    var currentIndexPlus = ixx + 1;
    // console.log(trackTitles[ixx]);
    document.getElementById('albumstack').innerHTML += '<div class="swiper-slide swiper-slide-'+ currentIndex +'"><strong>'+trackTitles[currentIndex]+'</strong><div class="album"></div></div>';
    document.getElementById('tracks').innerHTML += '<div class="swiper-slide swiper-slide-'+ currentIndex +'"><div class="thumb"></div><strong class="view" data-view="'+currentIndex+'">'+trackTitles[currentIndex]+'</strong><div class="view" data-view="'+currentIndex+'" onClick="pickSong('+currentIndex+');">play</div></div>';
}


var sticknav = function (){
    var h = $(window).height();
    var w = $(window).width();

    if(w>480) {
        if(h>141) {
            $("body").addClass('bp-lg').removeClass('bp-sm bp-md phone');
        } if(h<141) {
            $("body").addClass('bp-md').removeClass('bp-sm bp-lg phone');
        } if(h<91) {
            $("body").addClass('bp-sm').removeClass('bp-lg bp-md phone');
        } 
    } else {
        $("body").addClass('bp-lg phone').removeClass('bp-sm bp-md');
    }
}



$(window).load(function() {
    // run our function on load
    sticknav();

    // and run it again every time you scroll
    $(window).resize(function() {
        sticknav();
    });
});
</script>

<script>
    // playlist for ads
    var adUrls = new Array();
        adUrls[0] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[1] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[2] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[3] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[4] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[5] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[6] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[7] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[8] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[9] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[10] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[11] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[12] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[13] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[14] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[15] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[16] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[17] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[18] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[19] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[20] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[21] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[22] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[23] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[24] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[25] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[26] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[27] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[28] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[29] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[30] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[31] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[32] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[33] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[34] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[35] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[36] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[37] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[38] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[39] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';
        adUrls[40] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) )?>';    
</script>
<script>
function myFunction(which) {
    var myWindow = window.open(which, "BonoboRadio", "width=800, height=600");
}
function artistLink(which) {
    var myWindow = window.open(which, "Confirmation for Purchase", "width=300, height=600");
}
</script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/script.js', dirname(__FILE__) );?>"></script>
<script src="<?php echo plugins_url( 'assets/js/swiper.min.js', dirname(__FILE__) ); ?>"></script>
<script> 
var swiper = new Swiper('.swiper-container.playlist', {
        pagination: '.swiper-pagination2',
        paginationClickable: true,
        direction: 'vertical',
        slidesPerView: 'auto',
        slideToClickedSlide: true,
    });

var swiper2 = new Swiper('.fade', {
    centeredSlides: true,
    grabCursor: true,
    effect: 'slide',
    nextButton: '.swiper-button-next',
    pagination: '.swiper-pagination',
    paginationClickable: true,
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    spaceBetween: 5,
    // paginationBulletRender: function (index, className) {
    //     return '<span class="' + className + '">' + (index + 1) + '</span>';
    // }
});
var swiper3 = new Swiper('.coverflow', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    touchRatio: 1,
    slideToClickedSlide: true,
    coverflow: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true
    }
});
swiper.update();
swiper2.update();
swiper3.update();

swiper3.params.control = swiper2;
swiper2.params.control = swiper3;
// swiper.params.control = swiper1;


</script>
<script>
    jQSwipe = jQuery.noConflict();
      jQSwipe(document).ready(function() {
        jQSwipe(window).load(function() {
            swiper.update();
            swiper2.update();
            swiper3.update();
            jQSwipe('body').removeClass('loading');
            jQSwipe('.overlay').fadeOut().hide();
            jQSwipe("#tracks .swiper-slide .view").click(function(){
                var index=jQSwipe(this).data('view');
                swiper2.slideTo(index);
                swiper3.slideTo(index);
                jQSwipe("#tracklist").delay( 300 ).removeClass('on');
                jQSwipe("#brief").delay( 300 ).addClass('on');                    
            });
        });
         jQSwipe(window).resize(function() {
            swiper.update();
            swiper2.update();
            swiper3.update();
        });
        

    });
</script>
<script>
    // Bind the submit event for your form
$('#searchform').submit(function( e ){ 

    // Stop the form from submitting
    e.preventDefault();

    // Get the search term
    var term = $('#s').val();
    var person = {s: term, embed: 1}; 

    // Make sure the user searched for something
    if ( term ){

        $.get( '/', person, function( data ){
            // Place the fetched results inside the #content element
            $('.fade').html( $(data).find('#feed') );

        });
        swiper2.update();
        swiper3.update();
    }
});
</script>
</html>