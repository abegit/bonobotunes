<?php get_header('register'); ?>			


	<div class="col-md-12 single">
		<div class="col-md-6 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
	
				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit">SIgn In:</h3>

				<?php echo do_shortcode('[wordpress_social_login]'); ?>
				<form name="login-form" id="login-form" class="login-form" action=" <?php echo site_url( 'wp-login.php' ) ?>" method="post">
                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-user"> </i> </span>
                           <input type="text" class="form-control" name="log" id="user_login" value="" placeholder=" <?php _e( 'Username', 'firmasite' ) ?>" />
                       </div>
                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-lock"> </i> </span>
                           <input type="password" class="form-control" name="pwd" id="user_pass" value="" placeholder=" <?php _e( 'Password', 'firmasite' ) ?>" />
                       </div>

                       <input class="btn btn-primary pull-left" type="submit" name="wp-submit" id="wp-submit" value=" <?php _e( 'Log In', 'firmasite' ) ?>"/>
                        <a href="<?php echo site_url( 'my-account/lost-password' ) ?>">Forgot Password?</a>
                       <input type="hidden" name="redirect_to" value="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
                       <input type="hidden" name="testcookie" value="1" />  </form>
				</div>
				<div class="sing-tit-cont">
					<h3 class="sing-tit">or Sign Up!</h3>
				</div>
				<div>
					
					<div class="sing-spacer">
						
						<?php the_content('Leggi...');?>

					</div>

				</div>	
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
		</div>	
	</div>			

	
<!-- <video autoplay loop muted id="bgvid" style="position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -100;
  background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;">
<source src="<?php bloginfo('stylesheet_directory'); ?>/img/20121117_patreus_vicky_vixen.webm" type="video/webm">
</video> -->


<?php get_footer('minimal'); ?>