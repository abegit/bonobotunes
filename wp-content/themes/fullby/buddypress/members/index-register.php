<?php get_header('register'); ?>			
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
	$url = strtok($actual_link, '?');

	// The value of the variable name is found
	$afil = $_GET["friend"];


	?>


	<div class="col-md-12 single">
		<div class="col-md-6 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
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
<script>
var stateObj = { foo: "bar" };
window.history.pushState(stateObj, "Register", "<?php echo $url; ?>");
</script>

<script>
var abeRegister = jQuery.noConflict(); 
	abeRegister(function () {
  abeRegister(".field_20 input[type=text]").val("<?php echo $afil; ?>");
});
</script>

<?php get_footer('minimal'); ?>