<?php 
wp_enqueue_style('thickbox'); // call to media files in wp
wp_enqueue_script('thickbox');
wp_enqueue_script( 'media-upload');
 ?><div class="wrap" style="padding:2% 4%;">

   <h2>bonoboTunes Podcast Creator <a href="http://unscene.us/" style="font-size:80%; font-weight:normal;">by Mr. Unscene</a></h2>
   <h3>Settings Page / <a href="http://unscene.us">FAQ</a></h3>
   <h4>With this page you'll be up and ready to submit your URL to bonobo and get listed!</h4>
 
   <form method="POST" action="options.php" id="bonobo">
				    <?php settings_fields( 'bonoboFeedStart' ); ?>
				    <!-- Wordpress documentation is wrong and suggests do_settings (which is for older versions below 2.7) -->
				    <?php do_settings_sections( 'bonoboFeedStart' ); ?>
      	<ul class="actions">
            <li class="node"><span>Podcast <i class="icon-arrowleft"></i></span>
            <div class="message">
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Activate bonobo Podcast Feed (?feed=listen)</th>
				        <td><input type="radio" name="bonoboFeedSync" value="1" <?php if ( get_option('bonoboFeedSync' ) == '1' ){ echo 'checked';}?> /> Yes <br />
				        	<input type="radio" name="bonoboFeedSync" value="2" <?php if ( get_option('bonoboFeedSync' ) == '2' ){ echo 'checked';}?> /> No <br />
				        </td>
				        </tr>
				        <tr valign="top">
				        	<th scope="row">Podcast Title</th>
							<td>Podcast Title: <input type="text" name="bonoboTitle" value="<?php echo get_option('bonoboTitle'); ?>" style="width:100%; height:auto;"/></td>
						</tr>
				        <tr valign="top">
				        <th scope="row">Podcast Details</th>
				        <td><div id="bonoboPodcastImage_thumb" class="wpss-file">
    <?php if(get_option('bonoboPodcastImage') !='' ){ ?>
       <img src="<?php echo get_option('bonoboPodcastImage'); ?>"  width="100%"/><?php } else {    echo $defaultImage; } ?>
</div> 
<input id="bonoboPodcastImage" type="text" size="36" style="direction:rtl; width:100%;" name="bonoboPodcastImage" value="<?php echo get_option('bonoboPodcastImage'); ?>" class="wpss_text wpss-file" />
				        <td><input id="bonoboPodcastImage_button" type="button" value="Upload Image" class="wpss-filebtn" /></td></td>
				        </tr>
				        <tr valign="top">
				        <th scope="row">Podcast Details</th>
				        <td>Name: <input type="text" name="bonoboAuthorName" value="<?php echo get_option('bonoboAuthorName'); ?>" /></td>
				        <td>Email: <input type="text" name="bonoboAuthorEmail" value="<?php echo get_option('bonoboAuthorEmail'); ?>" /></td>
				        </tr>
				        <tr valign="top">
				        	<th scope="row">Podcast Subtitle</th>
							<td>Podcast Subtitle: <input type="text" name="bonoboSubtitle" value="<?php echo get_option('bonoboSubtitle'); ?>" style="width:100%; height:auto;"/></td>
						</tr>
						<tr valign="top">
				        	<th scope="row">Explicit?</th>
							<td><input type="radio" name="bonoboExplicit" value="1" <?php if ( get_option('bonoboExplicit' ) == '1' ){ echo 'checked';}?> /> Yes<br />
								<input type="radio" name="bonoboExplicit" value="2" <?php if ( get_option('bonoboExplicit' ) == '2' ){ echo 'checked';}?> /> Clean <br /></td>
						</tr>
						<tr valign="top">
				        	<th scope="row">Category:</th>
							<td>
								<input type="checkbox" class="main" name="Arts" value="Arts" <?php if ( get_option('bonoboCategories' ) == 'Arts' ) : echo ' checked="checked"' ; endif ?> > Arts
<input type="checkbox" name="Design" value="Design" <?php if ( get_option('bonoboCategories' ) == 'Design' ) : echo ' checked="checked"' ; endif ?> > Design
<input type="checkbox" name="FashionBeauty" value="FashionBeauty" <?php if ( get_option('bonoboCategories' ) == 'FashionBeauty' ) : echo ' checked="checked"' ; endif ?> > Fashion &amp; Beauty
<input type="checkbox" name="Food" value="Food" <?php if ( get_option('bonoboCategories' ) == 'Food' ) : echo ' checked="checked"' ; endif ?> > Food
<input type="checkbox" name="Literature" value="Literature" <?php if ( get_option('bonoboCategories' ) == 'Literature' ) : echo ' checked="checked"' ; endif ?> > Literature
<input type="checkbox" name="Performing Arts" value="Performing Arts" <?php if ( get_option('bonoboCategories' ) == 'Performing Arts' ) : echo ' checked="checked"' ; endif ?> > Performing Arts
<input type="checkbox" name="Visual Arts" value="Visual Arts" <?php if ( get_option('bonoboCategories' ) == 'Visual Arts' ) : echo ' checked="checked"' ; endif ?> > Visual Arts
<input type="checkbox" class="main" name="Business" value="Business" <?php if ( get_option('bonoboCategories' ) == 'Business' ) : echo ' checked="checked"' ; endif ?> > Business
<input type="checkbox" name="Business News" value="Business News" <?php if ( get_option('bonoboCategories' ) == 'Business News' ) : echo ' checked="checked"' ; endif ?> > Business News
<input type="checkbox" name="Careers" value="Careers" <?php if ( get_option('bonoboCategories' ) == 'Careers' ) : echo ' checked="checked"' ; endif ?> > Careers
<input type="checkbox" name="Investing" value="Investing" <?php if ( get_option('bonoboCategories' ) == 'Investing' ) : echo ' checked="checked"' ; endif ?> > Investing
<input type="checkbox" name="ManagementMarketing" value="ManagementMarketing" <?php if ( get_option('bonoboCategories' ) == 'ManagementMarketing' ) : echo ' checked="checked"' ; endif ?> > Management &amp; Marketing
<input type="checkbox" name="Shopping" value="Shopping" <?php if ( get_option('bonoboCategories' ) == 'Shopping' ) : echo ' checked="checked"' ; endif ?> > Shopping
<input type="checkbox" class="main" name="Comedy" value="Comedy" <?php if ( get_option('bonoboCategories' ) == 'Comedy' ) : echo ' checked="checked"' ; endif ?> > Comedy
<input type="checkbox" class="main" name="Education" value="Education" <?php if ( get_option('bonoboCategories' ) == 'Education' ) : echo ' checked="checked"' ; endif ?> > Education
<input type="checkbox" name="Education" value="Education" <?php if ( get_option('bonoboCategories' ) == 'Education' ) : echo ' checked="checked"' ; endif ?> > Education
<input type="checkbox" name="Education Technology" value="Education Technology" <?php if ( get_option('bonoboCategories' ) == 'Education Technology' ) : echo ' checked="checked"' ; endif ?> > Education Technology
<input type="checkbox" name="Higher Education" value="Higher Education" <?php if ( get_option('bonoboCategories' ) == 'Higher Education' ) : echo ' checked="checked"' ; endif ?> > Higher Education
<input type="checkbox" name="K-12" value="K-12" <?php if ( get_option('bonoboCategories' ) == 'K-12' ) : echo ' checked="checked"' ; endif ?> > K-12
<input type="checkbox" name="Language Courses" value="Language Courses" <?php if ( get_option('bonoboCategories' ) == 'Language Courses' ) : echo ' checked="checked"' ; endif ?> > Language Courses
<input type="checkbox" name="Training" value="Training" <?php if ( get_option('bonoboCategories' ) == 'Training' ) : echo ' checked="checked"' ; endif ?> > Training
<input type="checkbox" class="main" name="GamesHobbies" value="GamesHobbies" <?php if ( get_option('bonoboCategories' ) == 'GamesHobbies' ) : echo ' checked="checked"' ; endif ?> > Games &amp; Hobbies
<input type="checkbox" name="Automotive" value="Automotive" <?php if ( get_option('bonoboCategories' ) == 'Automotive' ) : echo ' checked="checked"' ; endif ?> > Automotive
<input type="checkbox" name="Aviation" value="Aviation" <?php if ( get_option('bonoboCategories' ) == 'Aviation' ) : echo ' checked="checked"' ; endif ?> > Aviation
<input type="checkbox" name="Hobbies" value="Hobbies" <?php if ( get_option('bonoboCategories' ) == 'Hobbies' ) : echo ' checked="checked"' ; endif ?> > Hobbies
<input type="checkbox" name="Other Games" value="Other Games" <?php if ( get_option('bonoboCategories' ) == 'Other Games' ) : echo ' checked="checked"' ; endif ?> > Other Games
<input type="checkbox" name="Video Games" value="Video Games" <?php if ( get_option('bonoboCategories' ) == 'Video Games' ) : echo ' checked="checked"' ; endif ?> > Video Games
<input type="checkbox" class="main" name="GovernmentOrganizations" value="GovernmentOrganizations" <?php if ( get_option('bonoboCategories' ) == 'GovernmentOrganizations' ) : echo ' checked="checked"' ; endif ?> > Government &amp; Organizations
<input type="checkbox" name="Local" value="Local" <?php if ( get_option('bonoboCategories' ) == 'Local' ) : echo ' checked="checked"' ; endif ?> > Local
<input type="checkbox" name="National" value="National" <?php if ( get_option('bonoboCategories' ) == 'National' ) : echo ' checked="checked"' ; endif ?> > National
<input type="checkbox" name="Non-Profit" value="Non-Profit" <?php if ( get_option('bonoboCategories' ) == 'Non-Profit' ) : echo ' checked="checked"' ; endif ?> > Non-Profit
<input type="checkbox" name="Regional" value="Regional" <?php if ( get_option('bonoboCategories' ) == 'Regional' ) : echo ' checked="checked"' ; endif ?> > Regional
<input type="checkbox" class="main" name="Health" value="Health" <?php if ( get_option('bonoboCategories' ) == 'Health' ) : echo ' checked="checked"' ; endif ?> > Health
<input type="checkbox" name="Alternative Health" value="Alternative Health" <?php if ( get_option('bonoboCategories' ) == 'Alternative Health' ) : echo ' checked="checked"' ; endif ?> > Alternative Health
<input type="checkbox" name="FitnessNutrition" value="FitnessNutrition" <?php if ( get_option('bonoboCategories' ) == 'FitnessNutrition' ) : echo ' checked="checked"' ; endif ?> > Fitness &amp; Nutrition
<input type="checkbox" name="Self-Help" value="Self-Help" <?php if ( get_option('bonoboCategories' ) == 'Self-Help' ) : echo ' checked="checked"' ; endif ?> > Self-Help
<input type="checkbox" name="Sexuality" value="Sexuality" <?php if ( get_option('bonoboCategories' ) == 'Sexuality' ) : echo ' checked="checked"' ; endif ?> > Sexuality
<input type="checkbox" class="main" name="KidsFamily" value="KidsFamily" <?php if ( get_option('bonoboCategories' ) == 'KidsFamily' ) : echo ' checked="checked"' ; endif ?> > Kids &amp; Family
<input type="checkbox" class="main" name="Music" value="Music" <?php if ( get_option('bonoboCategories' ) == 'Music' ) : echo ' checked="checked"' ; endif ?> > Music
<input type="checkbox" class="main" name="NewsPolitics" value="NewsPolitics" <?php if ( get_option('bonoboCategories' ) == 'NewsPolitics' ) : echo ' checked="checked"' ; endif ?> > News &amp; Politics
<input type="checkbox" class="main" name="ReligionSpirituality" value="ReligionSpirituality" <?php if ( get_option('bonoboCategories' ) == 'ReligionSpirituality' ) : echo ' checked="checked"' ; endif ?> > Religion &amp; Spirituality
<input type="checkbox" name="Buddhism" value="Buddhism" <?php if ( get_option('bonoboCategories' ) == 'Buddhism' ) : echo ' checked="checked"' ; endif ?> > Buddhism
<input type="checkbox" name="Christianity" value="Christianity" <?php if ( get_option('bonoboCategories' ) == 'Christianity' ) : echo ' checked="checked"' ; endif ?> > Christianity
<input type="checkbox" name="Hinduism" value="Hinduism" <?php if ( get_option('bonoboCategories' ) == 'Hinduism' ) : echo ' checked="checked"' ; endif ?> > Hinduism
<input type="checkbox" name="Islam" value="Islam" <?php if ( get_option('bonoboCategories' ) == 'Islam' ) : echo ' checked="checked"' ; endif ?> > Islam
<input type="checkbox" name="Judaism" value="Judaism" <?php if ( get_option('bonoboCategories' ) == 'Judaism' ) : echo ' checked="checked"' ; endif ?> > Judaism
<input type="checkbox" name="Other" value="Other" <?php if ( get_option('bonoboCategories' ) == 'Other' ) : echo ' checked="checked"' ; endif ?> > Other
<input type="checkbox" name="Spirituality" value="Spirituality" <?php if ( get_option('bonoboCategories' ) == 'Spirituality' ) : echo ' checked="checked"' ; endif ?> > Spirituality
<input type="checkbox" class="main" name="ScienceMedicine" value="ScienceMedicine" <?php if ( get_option('bonoboCategories' ) == 'ScienceMedicine' ) : echo ' checked="checked"' ; endif ?> > Science &amp; Medicine
<input type="checkbox" name="Medicine" value="Medicine" <?php if ( get_option('bonoboCategories' ) == 'Medicine' ) : echo ' checked="checked"' ; endif ?> > Medicine
<input type="checkbox" name="Natural Sciences" value="Natural Sciences" <?php if ( get_option('bonoboCategories' ) == 'Natural Sciences' ) : echo ' checked="checked"' ; endif ?> > Natural Sciences
<input type="checkbox" name="Social Sciences" value="Social Sciences" <?php if ( get_option('bonoboCategories' ) == 'Social Sciences' ) : echo ' checked="checked"' ; endif ?> > Social Sciences
<input type="checkbox" class="main" name="SocietyCulture" value="SocietyCulture" <?php if ( get_option('bonoboCategories' ) == 'SocietyCulture' ) : echo ' checked="checked"' ; endif ?> > Society &amp; Culture
<input type="checkbox" name="History" value="History" <?php if ( get_option('bonoboCategories' ) == 'History' ) : echo ' checked="checked"' ; endif ?> > History
<input type="checkbox" name="Personal Journals" value="Personal Journals" <?php if ( get_option('bonoboCategories' ) == 'Personal Journals' ) : echo ' checked="checked"' ; endif ?> > Personal Journals
<input type="checkbox" name="Philosophy" value="Philosophy" <?php if ( get_option('bonoboCategories' ) == 'Philosophy' ) : echo ' checked="checked"' ; endif ?> > Philosophy
<input type="checkbox" name="PlacesTravel" value="PlacesTravel" <?php if ( get_option('bonoboCategories' ) == 'PlacesTravel' ) : echo ' checked="checked"' ; endif ?> > Places &amp; Travel
<input type="checkbox" class="main" name="SportsRecreation" value="SportsRecreation" <?php if ( get_option('bonoboCategories' ) == 'SportsRecreation' ) : echo ' checked="checked"' ; endif ?> > Sports &amp; Recreation
<input type="checkbox" name="Amateur" value="Amateur" <?php if ( get_option('bonoboCategories' ) == 'Amateur' ) : echo ' checked="checked"' ; endif ?> > Amateur
<input type="checkbox" name="CollegeHigh School" value="CollegeHigh School" <?php if ( get_option('bonoboCategories' ) == 'CollegeHigh School' ) : echo ' checked="checked"' ; endif ?> > College &amp; High School
<input type="checkbox" name="Outdoor" value="Outdoor" <?php if ( get_option('bonoboCategories' ) == 'Outdoor' ) : echo ' checked="checked"' ; endif ?> > Outdoor
<input type="checkbox" name="Professional" value="Professional" <?php if ( get_option('bonoboCategories' ) == 'Professional' ) : echo ' checked="checked"' ; endif ?> > Professional
<input type="checkbox" class="main" name="Technology" value="Technology" <?php if ( get_option('bonoboCategories' ) == 'Technology' ) : echo ' checked="checked"' ; endif ?> > Technology
<input type="checkbox" name="Gadgets" value="Gadgets" <?php if ( get_option('bonoboCategories' ) == 'Gadgets' ) : echo ' checked="checked"' ; endif ?> > Gadgets
<input type="checkbox" name="Tech News" value="Tech News" <?php if ( get_option('bonoboCategories' ) == 'Tech News' ) : echo ' checked="checked"' ; endif ?> > Tech News
<input type="checkbox" name="Podcasting" value="Podcasting" <?php if ( get_option('bonoboCategories' ) == 'Podcasting' ) : echo ' checked="checked"' ; endif ?> > Podcasting
<input type="checkbox" class="main" name="oftware How-To" value="Software How-To" <?php if ( get_option('bonoboCategories' ) == 'Software How-To' ) : echo ' checked="checked"' ; endif ?> > Software How-To
<input type="checkbox" name="TVFilm" value="TVFilm" <?php if ( get_option('bonoboCategories' ) == 'TVFilm' ) : echo ' checked="checked"' ; endif ?> > TV &amp; Film</td>
						</tr>
				       </table>
            </div></li>
            <li class="node"><span>Podcast <i class="icon-arrowleft"></i></span>
            <div class="message">
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Activate Unscene Music Player (?embed) (in beta)</th>
				        <td><input type="radio" name="UnsceneMusicPlayer" value="1" <?php if ( get_option('UnsceneMusicPlayer' ) == '1' ){ echo 'checked';}?> /> Yes <br />
				        	<input type="radio" name="UnsceneMusicPlayer" value="2" <?php if ( get_option('UnsceneMusicPlayer' ) == '2' ){ echo 'checked';}?> /> No <br />
				        </td>
				        </tr>
				        <tr valign="top">
				        <th scope="row">Player Thumbnail</th>
				        <td><div id="UnsceneMusicLogo_thumb" class="wpss-file">
    <?php if(get_option('UnsceneMusicLogo') !='' ){ ?>
       <img src="<?php echo get_option('UnsceneMusicLogo'); ?>"  width="100%"/><?php } else {    echo $defaultImage; } ?>
</div> 
<input id="UnsceneMusicLogo" type="text" size="36" style="direction:rtl; width:100%;" name="UnsceneMusicLogo" value="<?php echo get_option('UnsceneMusicLogo'); ?>" class="wpss_text wpss-file" />
				        <td><input id="UnsceneMusicLogo_button" type="button" value="Upload Image" class="wpss-filebtn" /></td></td>
				        </tr>
				    </table>
            </div></li>
        </ul>
		<?php submit_button(); ?>
</form>
<a href="http://www.apple.com/bonobo/podcasts/specs.html">Guide to Making a Podcast - Apple bonobo</a>
<!-- 
   <a href="http://unscene.us" target="_blank" style="display:inline-block; padding: 15px 40px; margin:0 10px; border-radius: 4px;color:#fff; background:#333; font-weight:700; text-decoration:none">Hire a Developer</a>
   <a href="http://unscene.us" target="_blank" style="display:inline-block; padding: 15px 40px; margin:0 10px; border-radius: 4px;color:#000; background:#00ecbd; font-weight:700; text-decoration:none">Donate with PayPal<i class="icon-paypal" style="margin-left:10px;"></i></a>
   <div><form action="http://groups.google.com/group/drsuzybonoboville/boxsubscribe">
      Email:
      <input type="text" name="email">
      <input type="submit" name="sub" value="Subscript">
</form></div> -->
</div>
<script src="/wp-content/plugins/bonobo-podcast-creator/js/script.js"></script>