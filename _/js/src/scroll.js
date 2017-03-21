//--- Scroll ---//
$(document).scroll(function(event) {
	// Header Scroll
	headerScroll();
	//out check
	outCheck();

	if($('.episodes').length){
		if($(window).scrollTop() + ($(window).height()) > $('footer').offset().top){
			getMoreVids(10);
		}
	}
});
//--- Scroll ---//


$(window).resize(function(event) {
	instaResize();
});