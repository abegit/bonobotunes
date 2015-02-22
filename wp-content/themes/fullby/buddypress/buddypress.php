<?php get_header(); ?>			
		<div class="wrap buddyb row">
	<div class="col-md-9 single">
		<div class="col-md-9 single-in open">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				<?php if ( has_post_thumbnail() ) { ?>

                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>

                <?php } else { ?>
                
                
                 <?php }  ?>
				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit">
						
						<?php if(isset($_GET['members_search_submit'])) {
						 	$afil2 = $_GET["s"];
							echo $afil2;
						} else {
							the_title();
						} ?></h3>
				
				</div>

				<div class="sing-cont">
					
					<div class="sing-spacer">
					
						<?php the_content('Leggi...');?>

					</div>

				</div>	
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
	        
		</div>	
		 
		<div class="col-md-3 hidden">
			<div class="sec-sidebar sidebar well"> <?php get_sidebar( 'primary' ); ?>
		    </div>
		 </div>

	</div>			

	<div class="col-md-3">
	<ul class="nav nav-tabs nav-justified panel-header">
		<li><a id="dashboard" class="btn btn-default" href="#popular" data-uri="1"><i class="icon-dashboard"></i> Dash</a></li>
		<li><a class="btn btn-default" href="<?php echo bp_loggedin_user_domain(); ?>"><i class="icon-user2"></i> Profile</a></li>
		<li><a class="btn btn-default" href="<?php echo bp_loggedin_user_domain(); ?>friends/"><i class="icon-happy"></i> Friends</a></li>  
    </ul>
		<div class="sidebar well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>
<?php get_footer(); ?>