<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<title>SoundManager 2: Bar UI Player (prototype)</title>
<meta name="viewport" content="width=500, initial-scale=1">
<script type="text/javascript" src="<?php echo plugins_url( '/assets/soundmanager/script/soundmanager2.js', dirname(__FILE__) );?>"></script>
<script src="<?php echo plugins_url( '/assets/soundmanager/script/bar-ui.js', dirname(__FILE__) );?>"></script>
<link rel="stylesheet" href="<?php echo plugins_url( '/assets/soundmanager/css/bar-ui.css', dirname(__FILE__) );?>" />

<!-- demo for this page only, you don't need this stuff -->
<script src="<?php echo plugins_url( '/assets/soundmanager/script/demo.js', dirname(__FILE__) );?>"></script>
<link rel="stylesheet" href="<?php echo plugins_url( '/assets/soundmanager/css/demo.css', dirname(__FILE__) );?>" />
<style>.sm2-bar-ui {
 font-size: 16px;
}
.sm2-bar-ui .sm2-main-controls,
.sm2-bar-ui .sm2-playlist-drawer {
 background-color: #4d51c0;
}
.sm2-bar-ui .sm2-inline-texture {
 background: transparent;
}
</style>
</head>

<body>
<div class="sm2-bar-ui playlist-open">

 <div class="bd sm2-main-controls">

  <div class="sm2-inline-texture"></div>
  <div class="sm2-inline-gradient"></div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#play" class="sm2-inline-button play-pause">Play / pause</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-inline-status">

   <div class="sm2-playlist">
    <div class="sm2-playlist-target">
     <!-- playlist <ul> + <li> markup will be injected here -->
     <!-- if you want default / non-JS content, you can put that here. -->
     <noscript><p>JavaScript is required.</p></noscript>
    </div>
   </div>

   <div class="sm2-progress">
    <div class="sm2-row">
    <div class="sm2-inline-time">0:00</div>
     <div class="sm2-progress-bd">
      <div class="sm2-progress-track">
       <div class="sm2-progress-bar"></div>
       <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
      </div>
     </div>
     <div class="sm2-inline-duration">0:00</div>
    </div>
   </div>

  </div>

  <div class="sm2-inline-element sm2-button-element sm2-volume">
   <div class="sm2-button-bd">
    <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
    <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element sm2-menu">
   <div class="sm2-button-bd">
    <a href="#menu" class="sm2-inline-button menu">menu</a>
   </div>
  </div>

 </div>

 <div class="bd sm2-playlist-drawer sm2-element">

  <div class="sm2-inline-texture">
   <div class="sm2-box-shadow"></div>
  </div>

  <!-- playlist content is mirrored here -->

  <div class="sm2-playlist-wrapper">
    
    <ul class="sm2-playlist-bd">
     
     <?php global $post;
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                            
                            if (get_post_type( $post->ID ) == "radio") {
                                $medias =& get_children( array (
                                    'post_parent' => $post->ID,
                                    'post_type' => 'attachment',
                                    'post_mime_type' => array('audio/mpeg', 'audio/x-mpeg', 'audio/mp3', 'audio/x-mp3', 'audio/mpeg3', 'audio/x-mpeg3', 'audio/mpg', 'audio/x-mpg', 'audio/x-mpegaudio')
                                ));
                                if ( empty($medias) ) {
                                    $hasTrack = "";
                                } else {
                                    foreach ( $medias as $attachment_id => $attachment ) {
                                        $hasTrack = wp_get_attachment_url( $attachment_id ); ?>
                                        <script>console.log('<?php echo $hasTrack.get_post_type( $post->ID ); ?>');</script>
                                    <?php }
                                }
                            } else {
                                ob_start();
                                Cus_enc();
                                $hasTrack = ob_get_clean();
                            }
                            
                            
                            $do_not_duplicate[] = $post->ID;
                            if ($hasTrack != "") { ?>
                                <?php
                                      $artistName = get_the_author();
                                      $songTitle = get_the_title(); ?>
                                      <li><a href="<?php echo $hasTrack; ?>"><b><?php echo $artistName; ?></b> - <?php echo $songTitle; ?><span class="label">Explicit</span></a></li>
                                    <?php if (!is_single()) { $i++; }
                            } ?>
                            <!-- Do stuff... -->
                        <?php endwhile;
                                endif;?>
                                                
                            <?php wp_reset_query();

                            $related_args = array(
                                'post_type'      => array('post','radio'),
                                'post__not_in'   => $do_not_duplicate,
                                'numberposts' => 99,
                                'post_status'    => 'publish',
                                'orderby'        => 'rand',
                            );
                            $related = new WP_Query( $related_args );
                            if( $related->have_posts() ):
                            while( $related->have_posts() ): $related->the_post(); ?>
                            <?php if (get_post_type( $post->ID ) == "radio") {
                                $medias =& get_children( array (
                                    'post_parent' => $post->ID,
                                    'post_type' => 'attachment',
                                    'post_mime_type' => array('audio/mpeg', 'audio/x-mpeg', 'audio/mp3', 'audio/x-mp3', 'audio/mpeg3', 'audio/x-mpeg3', 'audio/mpg', 'audio/x-mpg', 'audio/x-mpegaudio')
                                ));
                                if ( empty($medias) ) {
                                    $hasTrack = "";
                                } else {
                                    foreach ( $medias as $attachment_id => $attachment ) {
                                        $hasTrack = wp_get_attachment_url( $attachment_id ); ?>
                                        <script>console.log('<?php echo $hasTrack.get_post_type( $post->ID ); ?>');</script>
                                    <?php }
                                }
                            } else {
                                ob_start();
                                Cus_enc();
                                $hasTrack = ob_get_clean();
                            }
                            if ($hasTrack != "") { ?>
                            <?php $artistName = get_the_author();
                              $songTitle = get_the_title(); ?>
                                <li><a href="<?php echo $hasTrack; ?>"><b><?php echo $artistName; ?></b> - <?php echo $songTitle; ?><span class="label">Explicit</span></a></li>
                            <?php $i++;
                             } else {}
                            endwhile;
                            endif;
                            wp_reset_query(); ?>
    
    
    </ul>
  
  </div>

  <div class="sm2-extra-controls">

   <div class="bd">

    <div class="sm2-inline-element sm2-button-element">
     <a href="#prev" title="Previous" class="sm2-inline-button previous">&lt; previous</a>
    </div>

    <div class="sm2-inline-element sm2-button-element">
     <a href="#next" title="Next" class="sm2-inline-button next">&gt; next</a>
    </div>

    <!-- not implemented -->
    <!--
    <div class="sm2-inline-element sm2-button-element disabled">
     <div class="sm2-button-bd">
      <a href="#repeat" title="Repeat playlist" class="sm2-inline-button repeat">&infin; repeat</a>
     </div>
    </div>
    -->

    <!-- not implemented -->
    <!--
    <div class="sm2-inline-element sm2-button-element disabled">
     <a href="#shuffle" title="Shuffle" class="sm2-inline-button shuffle">shuffle</a>
    </div>
    -->

   </div>

  </div>

 </div>

</div>
</body>
</html>
