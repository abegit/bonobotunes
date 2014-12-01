	<?php if (!is_user_logged_in()) { ?>
	<div class="social">
		<a href=""><i class="fa fa-facebook fa-2x"></i></a>
		<a href=""><i class="fa fa-twitter fa-2x"></i></a>
		<a href=""><i class="fa fa-pinterest fa-2x"></i></a>
		<a href=""><i class="fa fa-instagram fa-2x"></i></a>
		<a href=""><i class="fa fa-linkedin fa-2x"></i></a>
		<a href=""><i class="fa fa-youtube fa-2x"></i></a>
	</div>
	<?php } ?>

	<?php if (!bp_is_user()) { ?>
	<div class="tab-spacer">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab">
		
			<li class="active"><a href="#home" data-toggle="tab"> <i class="fa fa-bolt"></i> Popular</a></li>
			<li><a href="#profile" data-toggle="tab"> <i class="fa fa-clock-o"></i> Latest</a></li>
			
		</ul>
			
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div class="tab-pane fade in active" id="home">
	
				<?php // POPULAR POST
				$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
				while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
		
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
			
			<div class="tab-pane fade" id="profile">
			  	
		  		<?php 
				$popularpost = new WP_Query( array( 'posts_per_page' => 4) );
				while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
		
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
					 
		</div>
	
	</div>
	<?php } ?>
	
	<?php 
	$user_ID = get_current_user_id();
	if ( bp_has_profile() ) : ?>
  <?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>
 
    <ul id="profile-groups">
    <?php if ( bp_profile_group_has_fields() ) : ?>
 
      <li>
        <?php bp_the_profile_group_name() ?>
 
        <ul id="profile-group-fields">
        <?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
 
          <?php if ( bp_field_has_data() ) : ?>
          <li>
            <?php bp_the_profile_field_name() ?>
            <?php bp_the_profile_field_value() ?>
          </li>
          <?php endif; ?>
 
        <?php endwhile; ?>
        </ul>
      <li>
 
    <?php endif; ?>
    </ul>
 
  <?php endwhile; ?>
 
<?php else: ?>
 
  <div id="message" class="info">
    <p>This user does not have a profile.</p>
  </div>
 
<?php endif;?>

	


	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar') ) : ?>
	
	<?php endif; ?>