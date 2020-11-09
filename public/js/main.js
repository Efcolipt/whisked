/*

// Header , show and fade 
let scrollTop = 0;
let header = $('header');
$(window).scroll(function(event){
	let currentScrollTop = $(this).scrollTop();
	if (window.pageYOffset <= 0) {
		
	}else{
		if (scrollTop > currentScrollTop) {

		}else{

		}
		
	}

	scrollTop = currentScrollTop;
}); */

jQuery(document).ready(function($) {
	$('.waitingSpin').stop().fadeOut(1000);
	let showBlockAuth = true;
	$('.header_account_avatar').click(function (e) {
		if (showBlockAuth) {
			$('.header_account_info').stop().slideDown('slow');
			showBlockAuth = false;
		}else{
			$('.header_account_info').stop().slideUp('slow');
			showBlockAuth = true;
		}
	});

	$(".collection .poster_collection img").each(function(key, item) {
		$(item).on("error", function() {
			showDefaultImage(this);
		}).attr('src', $(item).attr('src'));
	});

	function showDefaultImage(img) {
		$(img).attr('src', window.location.protocol + "//" + window.location.hostname + ":" + window.location.port + '/public/images/no-img/no-img.jpg');
		$(img).off("error");
	}
});