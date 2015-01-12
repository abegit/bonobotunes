<div class="wrap" style="padding:2% 4%;">

   <h3>iTunes Podcast Creator <a href="http://unscene.us/" style="font-size:80%; font-weight:normal;">by Mr. Unscene</a></h3>
   <h4>A lot of new features for awesome site with easy customization..</h4>
 
   <form method="post" action="options.php">
				    <?php settings_fields( 'iTunes-feed-quickstart' ); ?>
				    <!-- Wordpress documentation is wrong and suggests do_settings (which is for older versions below 2.7) -->
				    <?php do_settings_sections( 'iTunes-feed-quickstart' ); ?>
      	<ul class="actions">
            <li class="node"><span>Podcast <i class="icon-arrowleft"></i></span>
            <div class="message">
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Activate iTunes Feed Sync</th>
				        <td><input type="radio" name="iTunesFeedSync" value="1" <?php if ( get_option('iTunesFeedSync') == '1') { echo 'checked';}?> /> Yes <br />
				        	<input type="radio" name="iTunesFeedSync" value="2" <?php if ( get_option('iTunesFeedSync') == '2') { echo 'checked';}?> /> No <br />
				        </td>
				        </tr>
				        <tr valign="top">
				        <th scope="row">Podcast Details</th>
				        <td>Name: <input type="text" name="iTunesAuthorName" value="<?php echo get_option('iTunesAuthorName'); ?>" /></td>
				        <td>Email: <input type="text" name="iTunesAuthorEmail" value="<?php echo get_option('iTunesAuthorEmail'); ?>" /></td>
				        </tr>
				    </table>
            </div></li>
        </ul>
		<?php submit_button(); ?>
</form>
<!-- 
   <a href="http://unscene.us" target="_blank" style="display:inline-block; padding: 15px 40px; margin:0 10px; border-radius: 4px;color:#fff; background:#333; font-weight:700; text-decoration:none">Hire a Developer</a>
   <a href="http://unscene.us" target="_blank" style="display:inline-block; padding: 15px 40px; margin:0 10px; border-radius: 4px;color:#000; background:#00ecbd; font-weight:700; text-decoration:none">Donate with PayPal<i class="icon-paypal" style="margin-left:10px;"></i></a>
   <div><form action="http://groups.google.com/group/drsuzybonoboville/boxsubscribe">
      Email:
      <input type="text" name="email">
      <input type="submit" name="sub" value="Subscript">
</form></div> -->
</div>