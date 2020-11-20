/*

// Header , show and fade 
 */

jQuery(document).ready(function($) {

	$('.waitingSpin').stop().fadeOut(2000);
	$('.header_account_avatar').click(function (e) {
		$('.header_account_info').stop().slideToggle();
	});

	$(".collection .poster_collection img").each(function(key, item) {
		$(item).on("error", function() {
			showDefaultImage(this);
		}).attr('src', $(item).attr('src'));
	});

	$(".collection_top_side_view_img img").each(function(key, item) {
		$(item).on("error", function() {
			showDefaultImage(this);
		}).attr('src', $(item).attr('src'));
	});

	function showDefaultImage(img) {
		$(img).attr('src', window.location.protocol + "//" + window.location.hostname + ":" + window.location.port + '/public/images/no-img/no-img.jpg');
		$(img).off("error");
	}


	let scrollTop = 0;
	let header = $('header');
	if (header.offset().top > 0 ) {
		header.addClass('showHeader');
	}

	$(window).scroll(function(event){
		let currentScrollTop = $(this).scrollTop();
		if (window.pageYOffset <= 0) {
			header.removeClass('hideHeader').removeClass('showHeader');
	}else{
		if (currentScrollTop > scrollTop){
			$('.header_account_info').stop().slideUp(100);
			header.addClass('hideHeader').removeClass('showHeader');
		} else{
			header.addClass('showHeader').removeClass('hideHeader');
		}
	}

		scrollTop = currentScrollTop;
	});
});