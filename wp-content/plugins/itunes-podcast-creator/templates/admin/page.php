<?php 
wp_enqueue_style('thickbox'); // call to media files in wp
wp_enqueue_script('thickbox');
wp_enqueue_script( 'media-upload');
 ?><div class="wrap" style="padding:2% 4%;">

   <h2>iTunes Podcast Creator <a href="http://unscene.us/" style="font-size:80%; font-weight:normal;">by Mr. Unscene</a></h2>
   <h3>Settings Page / <a href="http://unscene.us">FAQ</a></h3>
   <h4>With this page you'll be up and ready to submit your URL to iTunes and get listed!</h4>
 
   <form method="POST" action="options.php" id="iTunes">
				    <?php settings_fields( 'iTunesFeedStart' ); ?>
				    <!-- Wordpress documentation is wrong and suggests do_settings (which is for older versions below 2.7) -->
				    <?php do_settings_sections( 'iTunesFeedStart' ); ?>
      	<ul class="actions">
            <li class="node"><span>Podcast <i class="icon-arrowleft"></i></span>
            <div class="message">
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Activate iTunes Feed Sync</th>
				        <td><input type="radio" name="iTunesFeedSync" value="1" <?php if ( get_option('iTunesFeedSync' ) == '1' ){ echo 'checked';}?> /> Yes <br />
				        	<input type="radio" name="iTunesFeedSync" value="2" <?php if ( get_option('iTunesFeedSync' ) == '2' ){ echo 'checked';}?> /> No <br />
				        </td>
				        </tr>
				        <tr valign="top">
				        <th scope="row">Podcast Details</th>
				        <td><div id="iTunesPodcastImage_thumb" class="wpss-file">
    <?php if(get_option('iTunesPodcastImage') !='' ){ ?>
       <img src="<?php echo get_option('iTunesPodcastImage'); ?>"  width="100%"/><?php } else {    echo $defaultImage; } ?>
</div> 
<input id="iTunesPodcastImage" type="text" size="36" style="direction:rtl; width:100%;" name="iTunesPodcastImage" value="<?php echo get_option('iTunesPodcastImage'); ?>" class="wpss_text wpss-file" />
				        <td><input id="iTunesPodcastImage_button" type="button" value="Upload Image" class="wpss-filebtn" /></td></td>
				        </tr>
				        <tr valign="top">
				        <th scope="row">Podcast Details</th>
				        <td>Name: <input type="text" name="iTunesAuthorName" value="<?php echo get_option('iTunesAuthorName'); ?>" /></td>
				        <td>Email: <input type="text" name="iTunesAuthorEmail" value="<?php echo get_option('iTunesAuthorEmail'); ?>" /></td>
				        </tr>
				        <tr valign="top">
				        	<th scope="row">Podcast Summary</th>
							<td>Podcast Summary: <input type="text" name="iTunesPodcastSummary" value="<?php echo get_option('iTunesPodcastSummary'); ?>" style="width:100%; height:auto;"/></td>
						</tr>
						<tr valign="top">
				        	<th scope="row">Explicit?</th>
							<td><input type="radio" name="iTunesExplicit" value="1" <?php if ( get_option('iTunesExplicit' ) == '1' ){ echo 'checked';}?> /> Yes<br />
								<input type="radio" name="iTunesExplicit" value="2" <?php if ( get_option('iTunesExplicit' ) == '2' ){ echo 'checked';}?> /> Clean <br /></td>
						</tr>
						<tr valign="top">
				        	<th scope="row">Category:</th>
							<td><input type="radio" class="main" name="Arts" value="Arts" <?php if ( get_option('iTunesCategories' ) == 'Arts' ) : echo ' checked="checked"' ; endif ?> > Arts
<input type="radio" name="Design" value="Design" <?php if ( get_option('iTunesCategories' ) == 'Design' ) : echo ' checked="checked"' ; endif ?> > Design
<input type="radio" name="FashionBeauty" value="FashionBeauty" <?php if ( get_option('iTunesCategories' ) == 'FashionBeauty' ) : echo ' checked="checked"' ; endif ?> > Fashion &amp; Beauty
<input type="radio" name="Food" value="Food" <?php if ( get_option('iTunesCategories' ) == 'Food' ) : echo ' checked="checked"' ; endif ?> > Food
<input type="radio" name="Literature" value="Literature" <?php if ( get_option('iTunesCategories' ) == 'Literature' ) : echo ' checked="checked"' ; endif ?> > Literature
<input type="radio" name="Performing Arts" value="Performing Arts" <?php if ( get_option('iTunesCategories' ) == 'Performing Arts' ) : echo ' checked="checked"' ; endif ?> > Performing Arts
<input type="radio" name="Visual Arts" value="Visual Arts" <?php if ( get_option('iTunesCategories' ) == 'Visual Arts' ) : echo ' checked="checked"' ; endif ?> > Visual Arts
<input type="radio" class="main" name="Business" value="Business" <?php if ( get_option('iTunesCategories' ) == 'Business' ) : echo ' checked="checked"' ; endif ?> > Business
<input type="radio" name="Business News" value="Business News" <?php if ( get_option('iTunesCategories' ) == 'Business News' ) : echo ' checked="checked"' ; endif ?> > Business News
<input type="radio" name="Careers" value="Careers" <?php if ( get_option('iTunesCategories' ) == 'Careers' ) : echo ' checked="checked"' ; endif ?> > Careers
<input type="radio" name="Investing" value="Investing" <?php if ( get_option('iTunesCategories' ) == 'Investing' ) : echo ' checked="checked"' ; endif ?> > Investing
<input type="radio" name="ManagementMarketing" value="ManagementMarketing" <?php if ( get_option('iTunesCategories' ) == 'ManagementMarketing' ) : echo ' checked="checked"' ; endif ?> > Management &amp; Marketing
<input type="radio" name="Shopping" value="Shopping" <?php if ( get_option('iTunesCategories' ) == 'Shopping' ) : echo ' checked="checked"' ; endif ?> > Shopping
<input type="radio" class="main" name="Comedy" value="Comedy" <?php if ( get_option('iTunesCategories' ) == 'Comedy' ) : echo ' checked="checked"' ; endif ?> > Comedy
<input type="radio" class="main" name="Education" value="Education" <?php if ( get_option('iTunesCategories' ) == 'Education' ) : echo ' checked="checked"' ; endif ?> > Education
<input type="radio" name="Education" value="Education" <?php if ( get_option('iTunesCategories' ) == 'Education' ) : echo ' checked="checked"' ; endif ?> > Education
<input type="radio" name="Education Technology" value="Education Technology" <?php if ( get_option('iTunesCategories' ) == 'Education Technology' ) : echo ' checked="checked"' ; endif ?> > Education Technology
<input type="radio" name="Higher Education" value="Higher Education" <?php if ( get_option('iTunesCategories' ) == 'Higher Education' ) : echo ' checked="checked"' ; endif ?> > Higher Education
<input type="radio" name="K-12" value="K-12" <?php if ( get_option('iTunesCategories' ) == 'K-12' ) : echo ' checked="checked"' ; endif ?> > K-12
<input type="radio" name="Language Courses" value="Language Courses" <?php if ( get_option('iTunesCategories' ) == 'Language Courses' ) : echo ' checked="checked"' ; endif ?> > Language Courses
<input type="radio" name="Training" value="Training" <?php if ( get_option('iTunesCategories' ) == 'Training' ) : echo ' checked="checked"' ; endif ?> > Training
<input type="radio" class="main" name="GamesHobbies" value="GamesHobbies" <?php if ( get_option('iTunesCategories' ) == 'GamesHobbies' ) : echo ' checked="checked"' ; endif ?> > Games &amp; Hobbies
<input type="radio" name="Automotive" value="Automotive" <?php if ( get_option('iTunesCategories' ) == 'Automotive' ) : echo ' checked="checked"' ; endif ?> > Automotive
<input type="radio" name="Aviation" value="Aviation" <?php if ( get_option('iTunesCategories' ) == 'Aviation' ) : echo ' checked="checked"' ; endif ?> > Aviation
<input type="radio" name="Hobbies" value="Hobbies" <?php if ( get_option('iTunesCategories' ) == 'Hobbies' ) : echo ' checked="checked"' ; endif ?> > Hobbies
<input type="radio" name="Other Games" value="Other Games" <?php if ( get_option('iTunesCategories' ) == 'Other Games' ) : echo ' checked="checked"' ; endif ?> > Other Games
<input type="radio" name="Video Games" value="Video Games" <?php if ( get_option('iTunesCategories' ) == 'Video Games' ) : echo ' checked="checked"' ; endif ?> > Video Games
<input type="radio" class="main" name="GovernmentOrganizations" value="GovernmentOrganizations" <?php if ( get_option('iTunesCategories' ) == 'GovernmentOrganizations' ) : echo ' checked="checked"' ; endif ?> > Government &amp; Organizations
<input type="radio" name="Local" value="Local" <?php if ( get_option('iTunesCategories' ) == 'Local' ) : echo ' checked="checked"' ; endif ?> > Local
<input type="radio" name="National" value="National" <?php if ( get_option('iTunesCategories' ) == 'National' ) : echo ' checked="checked"' ; endif ?> > National
<input type="radio" name="Non-Profit" value="Non-Profit" <?php if ( get_option('iTunesCategories' ) == 'Non-Profit' ) : echo ' checked="checked"' ; endif ?> > Non-Profit
<input type="radio" name="Regional" value="Regional" <?php if ( get_option('iTunesCategories' ) == 'Regional' ) : echo ' checked="checked"' ; endif ?> > Regional
<input type="radio" class="main" name="Health" value="Health" <?php if ( get_option('iTunesCategories' ) == 'Health' ) : echo ' checked="checked"' ; endif ?> > Health
<input type="radio" name="Alternative Health" value="Alternative Health" <?php if ( get_option('iTunesCategories' ) == 'Alternative Health' ) : echo ' checked="checked"' ; endif ?> > Alternative Health
<input type="radio" name="FitnessNutrition" value="FitnessNutrition" <?php if ( get_option('iTunesCategories' ) == 'FitnessNutrition' ) : echo ' checked="checked"' ; endif ?> > Fitness &amp; Nutrition
<input type="radio" name="Self-Help" value="Self-Help" <?php if ( get_option('iTunesCategories' ) == 'Self-Help' ) : echo ' checked="checked"' ; endif ?> > Self-Help
<input type="radio" name="Sexuality" value="Sexuality" <?php if ( get_option('iTunesCategories' ) == 'Sexuality' ) : echo ' checked="checked"' ; endif ?> > Sexuality
<input type="radio" class="main" name="KidsFamily" value="KidsFamily" <?php if ( get_option('iTunesCategories' ) == 'KidsFamily' ) : echo ' checked="checked"' ; endif ?> > Kids &amp; Family
<input type="radio" class="main" name="Music" value="Music" <?php if ( get_option('iTunesCategories' ) == 'Music' ) : echo ' checked="checked"' ; endif ?> > Music
<input type="radio" class="main" name="NewsPolitics" value="NewsPolitics" <?php if ( get_option('iTunesCategories' ) == 'NewsPolitics' ) : echo ' checked="checked"' ; endif ?> > News &amp; Politics
<input type="radio" class="main" name="ReligionSpirituality" value="ReligionSpirituality" <?php if ( get_option('iTunesCategories' ) == 'ReligionSpirituality' ) : echo ' checked="checked"' ; endif ?> > Religion &amp; Spirituality
<input type="radio" name="Buddhism" value="Buddhism" <?php if ( get_option('iTunesCategories' ) == 'Buddhism' ) : echo ' checked="checked"' ; endif ?> > Buddhism
<input type="radio" name="Christianity" value="Christianity" <?php if ( get_option('iTunesCategories' ) == 'Christianity' ) : echo ' checked="checked"' ; endif ?> > Christianity
<input type="radio" name="Hinduism" value="Hinduism" <?php if ( get_option('iTunesCategories' ) == 'Hinduism' ) : echo ' checked="checked"' ; endif ?> > Hinduism
<input type="radio" name="Islam" value="Islam" <?php if ( get_option('iTunesCategories' ) == 'Islam' ) : echo ' checked="checked"' ; endif ?> > Islam
<input type="radio" name="Judaism" value="Judaism" <?php if ( get_option('iTunesCategories' ) == 'Judaism' ) : echo ' checked="checked"' ; endif ?> > Judaism
<input type="radio" name="Other" value="Other" <?php if ( get_option('iTunesCategories' ) == 'Other' ) : echo ' checked="checked"' ; endif ?> > Other
<input type="radio" name="Spirituality" value="Spirituality" <?php if ( get_option('iTunesCategories' ) == 'Spirituality' ) : echo ' checked="checked"' ; endif ?> > Spirituality
<input type="radio" class="main" name="ScienceMedicine" value="ScienceMedicine" <?php if ( get_option('iTunesCategories' ) == 'ScienceMedicine' ) : echo ' checked="checked"' ; endif ?> > Science &amp; Medicine
<input type="radio" name="Medicine" value="Medicine" <?php if ( get_option('iTunesCategories' ) == 'Medicine' ) : echo ' checked="checked"' ; endif ?> > Medicine
<input type="radio" name="Natural Sciences" value="Natural Sciences" <?php if ( get_option('iTunesCategories' ) == 'Natural Sciences' ) : echo ' checked="checked"' ; endif ?> > Natural Sciences
<input type="radio" name="Social Sciences" value="Social Sciences" <?php if ( get_option('iTunesCategories' ) == 'Social Sciences' ) : echo ' checked="checked"' ; endif ?> > Social Sciences
<input type="radio" class="main" name="SocietyCulture" value="SocietyCulture" <?php if ( get_option('iTunesCategories' ) == 'SocietyCulture' ) : echo ' checked="checked"' ; endif ?> > Society &amp; Culture
<input type="radio" name="History" value="History" <?php if ( get_option('iTunesCategories' ) == 'History' ) : echo ' checked="checked"' ; endif ?> > History
<input type="radio" name="Personal Journals" value="Personal Journals" <?php if ( get_option('iTunesCategories' ) == 'Personal Journals' ) : echo ' checked="checked"' ; endif ?> > Personal Journals
<input type="radio" name="Philosophy" value="Philosophy" <?php if ( get_option('iTunesCategories' ) == 'Philosophy' ) : echo ' checked="checked"' ; endif ?> > Philosophy
<input type="radio" name="PlacesTravel" value="PlacesTravel" <?php if ( get_option('iTunesCategories' ) == 'PlacesTravel' ) : echo ' checked="checked"' ; endif ?> > Places &amp; Travel
<input type="radio" class="main" name="SportsRecreation" value="SportsRecreation" <?php if ( get_option('iTunesCategories' ) == 'SportsRecreation' ) : echo ' checked="checked"' ; endif ?> > Sports &amp; Recreation
<input type="radio" name="Amateur" value="Amateur" <?php if ( get_option('iTunesCategories' ) == 'Amateur' ) : echo ' checked="checked"' ; endif ?> > Amateur
<input type="radio" name="CollegeHigh School" value="CollegeHigh School" <?php if ( get_option('iTunesCategories' ) == 'CollegeHigh School' ) : echo ' checked="checked"' ; endif ?> > College &amp; High School
<input type="radio" name="Outdoor" value="Outdoor" <?php if ( get_option('iTunesCategories' ) == 'Outdoor' ) : echo ' checked="checked"' ; endif ?> > Outdoor
<input type="radio" name="Professional" value="Professional" <?php if ( get_option('iTunesCategories' ) == 'Professional' ) : echo ' checked="checked"' ; endif ?> > Professional
<input type="radio" class="main" name="Technology" value="Technology" <?php if ( get_option('iTunesCategories' ) == 'Technology' ) : echo ' checked="checked"' ; endif ?> > Technology
<input type="radio" name="Gadgets" value="Gadgets" <?php if ( get_option('iTunesCategories' ) == 'Gadgets' ) : echo ' checked="checked"' ; endif ?> > Gadgets
<input type="radio" name="Tech News" value="Tech News" <?php if ( get_option('iTunesCategories' ) == 'Tech News' ) : echo ' checked="checked"' ; endif ?> > Tech News
<input type="radio" name="Podcasting" value="Podcasting" <?php if ( get_option('iTunesCategories' ) == 'Podcasting' ) : echo ' checked="checked"' ; endif ?> > Podcasting
<input type="radio" class="main" name="oftware How-To" value="Software How-To" <?php if ( get_option('iTunesCategories' ) == 'Software How-To' ) : echo ' checked="checked"' ; endif ?> > Software How-To
<input type="radio" name="TVFilm" value="TVFilm" <?php if ( get_option('iTunesCategories' ) == 'TVFilm' ) : echo ' checked="checked"' ; endif ?> > TV &amp; Film
</td>
						</tr>
				       </table>
            </div></li>
            <li class="node"><span>Podcast <i class="icon-arrowleft"></i></span>
            <div class="message">
				    <table class="form-table">
				        <tr valign="top">
				        <th scope="row">Activate Unscene Music Player (?feed=listen)</th>
				        <td><input type="radio" name="UnsceneMusicPlayer" value="1" <?php if ( get_option('UnsceneMusicPlayer' ) == '1' ){ echo 'checked';}?> /> Yes <br />
				        	<input type="radio" name="UnsceneMusicPlayer" value="2" <?php if ( get_option('UnsceneMusicPlayer' ) == '2' ){ echo 'checked';}?> /> No <br />
				        </td>
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