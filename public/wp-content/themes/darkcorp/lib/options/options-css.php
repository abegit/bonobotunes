<?php
/* options css */
$header_image = get_header_image();
$bg_image = get_background_image();
$bg_color = get_background_color();
?>

<?php if( !$bg_image && !$bg_color ): ?>
body { background: #0C0D0F url('<?php echo get_template_directory_uri(); ?>/images/bg.jpg') no-repeat center top; }
<?php endif; ?>

<?php
if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') { ?>
body { font-family:'Roboto',arial,sans-serif; font-weight:400; }
<?php } else { ?>
body { font-family: <?php echo get_theme_option('body_font'); ?> !important; font-weight: <?php echo get_theme_option('body_font_weight'); ?> !important; }
<?php } ?>

<?php
if( get_theme_option('headline_font') == 'Choose a font' || get_theme_option('headline_font') == '') { ?>
h1,h2,h3,h4,h5,h6,#siteinfo h1, #siteinfo div,ul.tabbernav li a { font-family:'Oswald',arial,sans-serif; font-weight:300; }
<?php } else { ?>
h1,h2,h3,h4,h5,h6,#siteinfo h1, #siteinfo div,ul.tabbernav li a {
font-family:  <?php echo get_theme_option('headline_font'); ?> !important; font-weight: <?php echo get_theme_option('headline_font_weight'); ?> !important;}
<?php } ?>


<?php
if( get_theme_option('navigation_font') == 'Choose a font' || get_theme_option('navigation_font') == '') { ?>
#main-navigation, .sf-menu li a, .fbottom { font-family:'Oswald',arial,sans-serif; font-weight:400; }
<?php } else { ?>
#main-navigation, .sf-menu li a, .fbottom { font-family:  <?php echo get_theme_option('navigation_font'); ?> !important; font-weight: <?php echo get_theme_option('navigation_font_weight'); ?> !important;}
<?php } ?>


<?php
$nav_color = get_theme_option('nav_color');
if( $nav_color ) { ?>
#main-navigation,.sf-menu ul {background-color: <?php echo $nav_color; ?>;}
.sf-menu li li,.sf-menu li li li {border-bottom: 1px solid <?php echo dehex($nav_color,-10); ?>;}
.sf-menu ul li a:hover {background-color: <?php echo dehex($nav_color,-10); ?>;}
<?php } ?>