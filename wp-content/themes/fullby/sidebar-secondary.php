
  <?php if (!is_user_logged_in()) { ?>
    <div style="background:#000; padding:10px; margin:10px;" class="widget">      
    <!-- Tab panes -->
    <div style="padding:10px; border:solid 1px #55571f; text-align:center;">
      
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-good.png" width="123">
        <?php $user_affil = bp_displayed_user_id(); ?>
        <div class="clear"></div>
       <input class="btn btn-primary" type="button" onclick="location.href='<?php echo bp_signup_page(); if($user_affil != '') { echo '?friend='.$user_affil; }; ?>'" value="Sign Up" style="margin-bottom: 10px; margin-top: 100px;" />

    <div class="clear"></div>
    <!-- end -->

    </div>
    </div>

  <div class="widget widget-tabs">
      
    <!-- Tab panes -->
    <div class="tab-content">
      
      <div class="tab-pane fade in active" id="signin">
        <h3 style=" font-size: 22px; font-weight: 300; margin-bottom: 20px; text-align: center;">Sign In to Explore!</h3>
  <form name="login-form" id="login-form" class="login-form" action=" <?php echo site_url( 'wp-login.php' ) ?>" method="post">


                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-user"> </i> </span>
                           <input type="text" class="form-control" name="log" id="user_login" value="" placeholder=" <?php _e( 'Username', 'firmasite' ) ?>" />
                       </div>
                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-lock"> </i> </span>
                           <input type="password" class="form-control" name="pwd" id="user_pass" value="" placeholder=" <?php _e( 'Password', 'firmasite' ) ?>" />
                       </div>

                       <!-- <label for="rememberme" class="checkbox"> <input name="rememberme" type="checkbox" id="rememberme" value="forever" />  <?php esc_attr_e('Remember Me', 'firmasite'); ?> </label> -->
                       <input class="btn btn-primary pull-left" type="submit" name="wp-submit" id="wp-submit" value=" <?php _e( 'Log In', 'firmasite' ) ?>"/>
                       <!-- <a href="http://dev.bonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook" class="bblogin-dv btn btn-default"></a>
                       <a href="http://dev.bonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Twitter" class="bblogin-rq btn btn-default"></a> -->
                        <a href="<?php echo site_url( 'my-account/lost-password' ) ?>">Forgot Password?</a>
                              <?php $user_affil = bp_displayed_user_id(); ?>
                       <input class="btn btn-primary pull-right" type="button" name="signup-submit" id="signup-submit" value=" <?php _e( 'Create an Account', 'firmasite' ) ?>" onclick="location.href='<?php echo bp_signup_page(); if($user_affil != '') { echo '?friend='.$user_affil; }; ?>'" />
                       
                       <input type="hidden" name="redirect_to" value="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
                       <input type="hidden" name="testcookie" value="1" />
                       <?php do_action( 'bp_login_bar_logged_out' ) ?>
  </form>
<!--  <script>
function yrFunction() {
    var myWindow = window.open("http://dev.bonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Twitter", "Twitter Auth for Bonoboville", "width=640, height=640");
}
function myFunction() {
    var myWindow = window.open("http://dev.bonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook", "Facebook Login for Bonoboville", "width=640, height=640");
}
</script>
-->  
    </div>
    <!-- end tab content -->

<div class="clear"></div>
  <!-- end -->

</div>
</div>
    <?php } ?>
<?php if (is_user_logged_in()) {
  $notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id());
if ( $notifications ) {
        $counter = 0;
        for ( $not3 = 0, $count = count( $notifications ); $not3  < $count; ++$not3 ) {
          $alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>

          <li <?php echo $alt ?>> <?php echo $notifications[$not3] ?> </li>

          <?php $counter++;
        } 
        echo '<li class="view"><a href="'.bp_loggedin_user_domain().'notifications"><i class="icon-ellipsis"></i></a></li>';
      } else { ?>

      <li> <a href=" <?php echo bp_loggedin_user_domain() ?>notifications"> <?php _e( 'No new notifications.', 'buddypress' ); ?> </a> </li>

    <?php }
  } ?>
    <?php if (!bp_is_user_activity()) { ?>
<div class="widget widget-tabs">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified panel-header">
    
      <li class="active"><a href="#latest" data-toggle="tab"> Latest</a></li>
      <li><a href="#featured" data-toggle="tab"> Featured</a></li>
      <li><a href="#popular" data-toggle="tab">  Popular</a></li>
      
    </ul>
      
    <!-- Tab panes -->
    <div class="tab-content panel">
      
      
      <div class="tab-pane fade  in active" id="latest">
          
          <?php 
        $latestpost = new WP_Query( array( 'posts_per_page' => 4) );
        while ( $latestpost->have_posts() ) : $latestpost->the_post();?>
    
          <a href="<?php the_permalink(); ?>">
          
            <?php $video = get_post_meta($post->ID, 'fullby_video', true );
        
            if($video != '') {?>
  
              <img src="http://img.youtube.com/vi/<?php echo $video ?>/1.jpg" class="grid-cop"/>
  
            <?php                          
                 
                  } else if ( has_post_thumbnail() ) { ?>
  
                          <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail')); ?>
     
                      <?php } ?>
    
              <h2 class="title"><?php the_title(); ?></h2>
              
              <div class="date"><i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> &nbsp;
              
              <?php 
              $video = get_post_meta($post->ID, 'fullby_video', true );
              
              if($video != '') { ?>
                        
                      <i class="fa fa-video-camera"></i> Video
                        
                    <?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
                        
                      <i class="fa fa-th"></i> Gallery
    
                    <?php } else {?>
    
                    <?php } ?>
    
              </div>
              
            </a>
    
        <?php endwhile; ?>
          
      </div>
      

      
      <div class="tab-pane fade" id="featured">
  
        <?php // POPULAR POST
        $featpost = new WP_Query( array( 'posts_per_page' => 4, 'category_name' => 'featured' ) );
        while ( $featpost->have_posts() ) : $featpost->the_post();?>
    
        <?php $video = get_post_meta($post->ID, 'fullby_video', true );
            $category = get_the_category(); ?>


        <a href="<?php the_permalink(); ?>">
        
          <?php if($video != '') {?>
    
            <img src="http://img.youtube.com/vi/<?php echo $video ?>/1.jpg" class="grid-cop"/>
  
          <?php                          
             
                } else if ( has_post_thumbnail() ) { ?>
  
                      <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail')); ?>
  
                  <?php } ?>
  
            <h2 class="title"><?php the_title(); ?></h2>
            
            <div class="trends"><?php if ($category[0]->cat_name == 'The Show') {
             echo '<i class="icon-clubs"></i>'.$category[0]->cat_name;
            } else {
             echo '<i class="icon-tag"></i>'.$category[0]->cat_name;
            } ?> 



            &nbsp;
            
            <?php 
            $video = get_post_meta($post->ID, 'fullby_video', true );
            
            if($video != '') { ?>
                      
                    <i class="fa fa-video-camera"></i> Video
                      
                  <?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
                      
                    <i class="fa fa-th"></i> Gallery
  
                  <?php } else {?>
  
                  <?php } ?>
  
            </div>
  
          </a>
    
        <?php endwhile; ?>
      
      </div>

<div class="tab-pane fade" id="popular">
          
          <?php 
        $popularpost = new WP_Query( array( 'posts_per_page' => 4) );
        while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
    
          <a href="<?php the_permalink(); ?>">
          
            <?php $video = get_post_meta($post->ID, 'fullby_video', true );
                    $views = get_post_meta($post->ID, 'wpb_post_views_count', true );
            if($video != '') {?>
  
              <img src="http://img.youtube.com/vi/<?php echo $video ?>/1.jpg" class="grid-cop"/>
  
            <?php                          
                 
                  } else if ( has_post_thumbnail() ) { ?>
  
                          <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail')); ?>
     
                      <?php } ?>
    
              <h2 class="title"><?php the_title(); ?></h2>
              
              <div class="date"> <?php echo $views ?> views &nbsp;
              
              <?php 
              $video = get_post_meta($post->ID, 'fullby_video', true );
              
              if($video != '') { ?>
                        
                      <i class="fa fa-video-camera"></i> Video
                        
                    <?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
                        
                      <i class="fa fa-th"></i> Gallery
    
                    <?php } else {?>
    
                    <?php } ?>
    
              </div>
              
            </a>
    
        <?php endwhile; ?>
          
      </div>

      
           
    </div>
  <div class="clear"></div>
  </div>
  <?php } ?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar') ) : ?>
	<?php endif; ?>
  <?php if (bp_is_user_activity()) { ?>
    
    
  <?php }; ?>