</div>
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
<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url = strtok($actual_link, '?');

    // The value of the variable name is found    ?>

	
	<!-- feature -->

<script>
var stateObj = { foo: "bar" };
window.history.pushState(stateObj, "Register", "<?php echo $url; ?>");
</script>

<?php $afil = $_GET["friend"]; ?>
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


// start plugin
var jQone = jQuery.noConflict();
jQone(document).ready(function() {

	/** Splash page stuff **/
	jQone(window).load(function() {
		
		// If there's a warning cookie in place, fade out the mask.
		var helpa=getCookie("helper");
		<?php if (isset($afil)) { ?>
 				if (helpa!=null && helpa!="") {
				  	jQone(".field_185 input[type=text]").val(helpa);
				}		
				if (helpa=="") {
					var php_code = "<?php echo $ail; ?>";
					setCookie("helper",php_code,30);
				}
				if (helpa=="0") {
					var php_code = "<?php echo $afil; ?>";
					setCookie("helper",php_code,30);
				}
		<?php } else { ?>
 				if (helpa!=null && helpa!="") {
					jQone(".field_185 input[type=text]").val(helpa);
				}		
				if (helpa=="") {
					var php_code = "<?php echo bp_displayed_user_id(); ?>";
					setCookie("helper",php_code,30);
				}
				if (helpa=="0") {
					var php_code = "<?php echo bp_displayed_user_id(); ?>";
					setCookie("helper",php_code,30);
				}
		<?php }; ?>
	});		
});
</script>
<script>
	var $navDropz = jQuery.noConflict();
$navDropz(document).ready(function(){
	var $butan =  $navDropz('.btn-drop');
	$butan.attr('href','#');
	$butan.click(function(){
		var X=$navDropz(this).attr('data-uri');
		if(X==1){
			$navDropz(this).removeClass('open');
			$navDropz(this).attr('data-uri', '0');
		} else{
			$navDropz(this).addClass('open');
			$navDropz(this).attr('data-uri', '1');
		}
	});
});

</script>


<?php wp_footer();?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61576092-1', 'auto');
  ga('send', 'pageview');

</script>
 <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=8171400; 
var sc_invisible=1; 
var sc_security="f4667f58"; 
var sc_https=1; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hit counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/8171400/0/f4667f58/1/"
alt="hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->  

</body>
</html>

