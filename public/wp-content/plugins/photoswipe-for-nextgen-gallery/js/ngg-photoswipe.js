//Ready for photoSwipe!
var jsnoBody = jQuery.noConflict();
jsnoBody(function(){
	if (jsnoBody(".ngg-gallery-thumbnail a").length > 0) {
		jsnoBody(".ngg-gallery-thumbnail a").photoSwipe({
			captionAndToolbarAutoHideDelay: 0,
			getImageCaption: function(el){
				psTitle = jsnoBody(el).find("img").first().attr("alt");
				psDescription = jsnoBody(el).attr("title");
				psCaptionString = "<strong>" + psTitle + "</strong>";
				if (psDescription.length > 1) {
					psCaptionString = psCaptionString + '<div class="ps-long-description"><small>' + psDescription + '</small></div>';
				}
				psImgCaption = jsnoBody(psCaptionString);
				return psImgCaption;
			}
		});
	}
});

jsnoBody(function(){
	if (jsnoBody(".bpfb_images a").length > 0) {
		jsnoBody(".bpfb_images a").photoSwipe({
			captionAndToolbarAutoHideDelay: 0,
			getImageCaption: function(el){
				psTitle = jsnoBody(el).find("img").first().attr("alt");
				psCaptionString = "<strong>" + psTitle + "</strong>";
				psImgCaption = jsnoBody(psCaptionString);
				return psImgCaption;
			}
		});
	}
});

jsnoBody(document).ready(function(){
	//Remove thickbox effect:
	jsnoBody('a.thickbox').removeClass ("thickbox");
	//Remove lightbox effect:
	jsnoBody('a[rel^="lightbox"]').attr("rel","");
	//Remove highslide effect:
	jsnoBody('a.highslide').removeClass("highslide").attr("onclick","");
	//Remove shutter effect:
	jsnoBody('a[class^=shutterset]').removeClass (function (index, css) { return (css.match (/\bshutterset\S+/g) || []).join(' '); });	
});
