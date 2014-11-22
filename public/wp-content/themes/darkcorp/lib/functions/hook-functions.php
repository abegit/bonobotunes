<?php
/*--------------------------------------------
Description: add searchform in header
---------------------------------------------*/
function add_header_searchform() { get_search_form(); }
add_action('bp_inside_nav','add_header_searchform');


/*--------------------------------------------
Description: add featured article
---------------------------------------------*/
function add_article_slider_header() {
global $page, $paged;
$paged = get_query_var( 'paged' );
if( ( is_home() || is_front_page() || is_page_template('page-templates/template-blog.php')) && get_theme_option('slider_on') == 'Enable') {
if ( !$paged ) {
get_template_part( 'lib/sliders/article-slider' );
}
}
}
add_action('bp_after_header','add_article_slider_header');


/*--------------------------------------------
Description: add breadcrumbs
---------------------------------------------*/
function add_header_breadcrumbs() {  get_template_part( 'lib/templates/breadcrumbs' ); }
//add_action('bp_before_blog_entry','add_header_breadcrumbs');


/*--------------------------------------------
Description: add left sidebar
---------------------------------------------*/
function add_mp_sidebar_left() {
global $in_bbpress, $bp_active;
if( ($bp_active == 'true' && function_exists('bp_is_blog_page') && !bp_is_blog_page() ) || (function_exists('is_in_woocommerce_page') && is_in_woocommerce_page() )  || ($in_bbpress == 'true') ) {
} else {
get_sidebar( 'left' );
}
}
add_action('bp_after_blog_home','add_mp_sidebar_left');


/*--------------------------------------------
Description: add mobile nav
---------------------------------------------*/
function mp_add_mobile_nav() {
echo '<div id="mobile-nav">';
get_mobile_navigation( $type='top', $nav_name="primary" );
echo '</div>';
}
add_action('bp_inside_nav','mp_add_mobile_nav');


/*--------------------------------------------
Description: add ads in post loop
---------------------------------------------*/
function mp_add_ads_post_loop() {
global $postcount;
$get_ads_code_one = get_theme_option('ads_loop_one');
$get_ads_code_two = get_theme_option('ads_loop_two');
if( !is_singular() ) {
if( $get_ads_code_one == '' && $get_ads_code_two == '') {
} else {
if( 1 == $postcount ){
echo '<div class="ad-loop-post">';
echo stripcslashes(do_shortcode($get_ads_code_one));
echo '</div>';
} elseif( 2 == $postcount ){
echo '<div class="ad-loop-post">';
echo stripcslashes(do_shortcode($get_ads_code_two));
echo '</div>';
}
}
}
}
add_action('bp_after_blog_post','mp_add_ads_post_loop');


/*--------------------------------------------
Description: disable index for paginate comments
---------------------------------------------*/
function mp_seo_for_comments() {
 global $cpage, $post;
 if ( $cpage > 1 ) {
  echo "\n";
  echo "<meta name='robots' content='noindex,follow' />";
  echo "\n";
}
}
add_action( 'wp_head', 'mp_seo_for_comments' );

?>