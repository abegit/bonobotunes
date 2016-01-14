<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo get_option('bvrPodcastTitle'); ?></title>
    <meta name="viewport" content="width=device-width" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|PT+Sans+Caption|Paytone+One" rel="stylesheet" type="text/css">
﻿<link rel="stylesheet" href="<?php echo plugins_url( '/assets/jpl/skin/circle.skin/circle.player.css', dirname(__FILE__) );?>"/>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/jquery-1.9.1.min.js', dirname(__FILE__) );?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/jpl/js/jquery.jplayer.min.js', dirname(__FILE__) );?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/jpl/js/jquery.transform2d.js', dirname(__FILE__) );?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/jpl/js/jquery.grab.js', dirname(__FILE__) );?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/jpl/js/mod.csstransforms.min.js', dirname(__FILE__) );?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/jpl/js/circle.player.js', dirname(__FILE__) );?>"></script>

<style>
    .radio {
  background:#0f0f0f; /* Old browsers */ box-sizing:border-box;
  font-family: lato; color:#fff; line-height: 1rem; padding:10px;
}
body {margin:0; padding: 0; line-height: 0;}
h3 {font-size: 0.8rem;
    margin-top: 0;
    padding-top: 10px;
    text-transform: uppercase;}
#cp_container_1 {float: left;}
.clear {clear:both;}

#excerpt {
    background: #cfcfcf none repeat scroll 0 0;
    box-sizing: border-box;
    color: #000000;
    height: 130px;
    overflow: scroll;
    padding: 6px;
}
#excerpt .titlefield {
    display: block;
    font-size: 1rem;
    height: 1rem;
    line-height: 1rem;
    overflow: hidden;
}
#excerpt p {font-size:0.8rem;}


</style>


<script>
    // starting the script on page load
    var bLue = jQuery.noConflict();
    bLue(document).ready(function(){


       ﻿var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1", {
        mp3: "http://drsusanblock.com:8000/stream",}, {
            cssSelectorAncestor: "#cp_container_1",
            swfPath: "jpl/js",
            wmode: "window",
            supplied: "mp3",
            keyEnabled: true
        });
     bLue(window).load(function(){
       <?php if ( $_GET["live"] == 1 ) { echo "//"; } ?> bLue("#jquery_jplayer_1").jPlayer("play");
     });
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28070375-3', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/gfeedfetcher.js', dirname(__FILE__) );?>"></script>
</head>
<body>
<div class="radio" style="display: block;width: 100%;">
                    <!-- The jPlayer div must not be hidden. Keep it at the root of the body element to avoid any such problems. -->
            <div id="jquery_jplayer_1" class="cp-jplayer"></div>

            <!-- The container for the interface can go where you want to display it. Show and hide it as you need. -->

            <div id="cp_container_1" class="cp-container">
                <div class="cp-buffer-holder"> <!-- .cp-gt50 only needed when buffer is > than 50% -->
                    <div class="cp-buffer-1"></div>
                    <div class="cp-buffer-2"></div>
                </div>
                <div class="cp-progress-holder"> <!-- .cp-gt50 only needed when progress is > than 50% -->
                    <div class="cp-progress-1"></div>
                    <div class="cp-progress-2"></div>
                </div>
                <div class="cp-circle-control"></div>
                <ul class="cp-controls">
                    <li><a class="cp-play" tabindex="1">play</a></li>
                    <li><a class="cp-pause" style="display:none;" tabindex="1">pause</a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                </ul>
            </div>
                  

<div class="blogside">
    <div style="width:100%"><h3>Now Playing on RadioSuzy1</h3>
<script type="text/javascript">
            var newcss=new gfeedfetcher("excerpt", "", "");
            newcss.addFeed("Bloggamy", "http://drsusanblock.com/category/shows/feed") //Specify "label" plus URL to RSS feed
            newcss.displayoptions("description") //show the specified additional fields
            newcss.addregexp(/(\[CDATA\[)|(\]\])/g, '', 'descriptionfield')
            newcss.definetemplate("{title}<p>{description}</p>")
            newcss.setentrycontainer("div", "item") //Display each entry as a DIV (div element)
            newcss.filterfeed(1, "date") //Show 5 entries, sort by date
            newcss.onfeedload=function(){
            //     alert("RSS Displayer has loaded!");
                  var linkList = document.getElementById('excerpt').getElementsByTagName('a');
                  // New browsers (IE8+)
                  var linkList = document.querySelectorAll('#excerpt a');

                  for(var i in linkList){
                    linkList[i].setAttribute('target', '_blank');
                  }
            }
            newcss.init() //Always call this last 
            </script>
    </div>
<h3>Need to Talk? <a href="tel:3105680066">Call Us</a></h3>
</div>

<div class="clear"></div>
</div>

</body>
</html>