//   var $smartNav = jQuery.noConflict();
//    $smartNav(window).load(function() {
//      // ---------------------nav sticktop---------------------------
//    var lock_nav = $smartNav('#header nav'); // the div that is going to be stuck on the top
//    var lock_backtop = $smartNav('.back-top a'); // the div that is going to be stuck on the top
//    var sticktop = $smartNav('#header nav').offset().top - 30; // grab the initial top offset of the navigation
//    var new_stick = sticktop + 70; // grab the initial top offset of the navigation
//    //  // our function that decides weather the navigation bar should have "fixed" css position or not.
//     var sticknav = function () {
//        		var scroll_top = $smartNav(window).scrollTop(); // our current vertical position from the top
// 		// if we've scrolled more than the navigation, change its position to fixed to stick to top,
//             // otherwise change it back to relative
//             if (scroll_top > sticktop) {
//                 lock_nav.addClass('sticktop');
//             } else {
//                 lock_nav.removeClass('sticktop');
//             }

//             if (scroll_top - 100 > sticktop) {
//             	lock_backtop.addClass('show');  
//             } else {
//                 lock_backtop.removeClass('show');  
//             }
//         }
//         // run our function on load
//     sticknav();

//    // and run it again every time you scroll
//    $smartNav(window).scroll(function () {
//     	sticknav();
//    });

// });



var $popRocks = jQuery.noConflict();
$popRocks(window).load(function(){
	// custom popup action by unscene.us
	$popRocks('body').prepend('<div id="btn-tip-main"><div id="btn-tip-box"><i class="btn-tip-close icon-cross"></i><div id="btn-info"></div></div></div>');
	var popbtn = $popRocks('.btn-tip');
	var popClose = $popRocks('.btn-tip-close');
	var popContainr = $popRocks('#btn-tip-main');
	var popBox = $popRocks('#btn-tip-box');
	var popInfo = $popRocks('#btn-info');
	var addURL = popbtn.attr('href');
	popbtn.attr('data-url',addURL);

	// start popup
	popbtn.click(function(e){
		e.preventDefault();
		var infoTXT=$popRocks(this).attr('data-text');
		var infoURL=$popRocks(this).attr('data-url');
		var infoTitle=$popRocks(this).attr('title');
		if(infoTXT!==""){
			popContainr.addClass('open');
			popInfo.html(function() {
				return "<h4>" + infoTitle + "</h4><p>" + infoTXT + "</p>" + "<a class='btn btn-primary' href='" + infoURL + "'>Continue</a><a class='btn btn-default btn-tip-close' href='#'>Go Back</a>";
				// return "<h4>" + infoTitle + "</h4><p>" + infoTXT + "</p>";
				});
		} else{
			popContainr.addClass('open');
		    popInfo.html(fixThisShit);
		}
	});
	// end popup
	popClose.click(function(e){
		e.preventDefault();
		popContainr.removeClass('open');
	});

});