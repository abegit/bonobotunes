<?php 
/*
Template Name: Studio
*/
get_header(); ?>			
		<div class="row">
<div class="buddyb">		
	<div class="col-md-12 single">

		<?php $video = get_post_meta($post->ID, 'fullby_video', true );
				  
				if($video != '') {?>
	
					<div class="videoWrapper">
					 	<div class='video-container'><iframe title='YouTube video player' width='400' height='275' src='http://www.youtube.com/embed/<?php echo $video; ?>' frameborder='0' allowfullscreen></iframe></div>
					</div>
             	<?php } else if ( has_post_thumbnail() ) { ?>
	                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>
                <?php } else { ?>
                <?php }  ?>

		<div class="single-in col-md-12">
			
				<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
					<?php if ( has_post_thumbnail() ) { ?>
	                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>
	                <?php } else { ?>
	                	<!-- <div class="row spacer-sing"></div>	 -->
	                 <?php }  ?>
					<div class="sing-tit-cont">
						<h3 class="sing-tit"><?php the_title(); ?></h3>
					</div>
					<div class="sing-cont">
						<div class="sing-spacer">
							 <div class="col-md-7 col-sm-12">
							 	<?php the_content('Leggi...');?>
							 	<?php endwhile; ?>
		        <?php else : ?>
		                <p>Sorry, no posts matched your criteria.</p>
		        <?php endif; ?> 
								
							</div> <!-- end colum 1 -->
							<div class="col-md-5 col-sm-12">
								
								<h3 class="text-center">Lounge <a class="btn-tip alignright" href="/membership" title="Live Chatroom" data-url="/membership" data-text="Talk with your fellow bonobos and share a laugh."><i class="icon-info"></i></a></h3>

								<?php echo do_shortcode('[quick-chat]'); ?>
							</div> <!-- end column 2 -->
						</div>
					</div>	
				
		       
	 
	 </div>

	</div>			
		
<?php get_footer(); ?>