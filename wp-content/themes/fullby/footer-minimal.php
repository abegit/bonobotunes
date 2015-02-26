
<div class="col-md-12 footer">

	<div>	<?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'footer',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav text-center',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?></div>

</div>



<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<span id="insertHere"></span>


<script>
function setCookie(c_name,value,expiredays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays == 0) ? "" : ";expires="+exdate.toGMTString())+
	";path=/";
}
function getCookie(c_name){
	if (document.cookie.length>0) {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1) {
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}


var jqAfill = jQuery.noConflict();
jqAfill(document).ready(function() {

	/** Splash page stuff **/
	jqAfill(window).load(function() {

		// If there's a warning cookie in place, fade out the mask.
		// var warn=getCookie("warn");
		// if (warn!=null && warn!="") {
			// document.getElementById('insertHere').innerHTML = "old " + warn;
		// } else {			
			// <?php if (isset($afil)) { ?>
				// var php_code = "<?php echo $afil; ?>"
					// setCookie("warn",php_code,30);
					// document.getElementById('insertHere').innerHTML = warn;
			// <?php } else { ?>
					// document.getElementById('insertHere').innerHTML = "not set";
			// <?php } ?>
		// }
		// 
		// //Fade in the Popup
		// if (jqAfill('body').attr('closed') != "1")
		// {
		// 	// jqAfill('body').fadeIn(300);

		// }
		// return false;
	});		

});
</script>


<?php wp_footer();?>
</body>
</html>

