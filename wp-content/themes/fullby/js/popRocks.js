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