/*

// Header , show and fade
 */

jQuery(document).ready(function($) {
	$('.burger_icon_mobile_menu').click(function () {
			$('.header_menu_desktop').toggleClass('show_header_menu_desktop');
			$(this).toggleClass('burger_icon_mobile_menu_open');
	});

	$('.waitingSpin').stop().fadeOut(1000);
	$('.header_account_avatar').click(function (e) {
		$('.header_account_info').stop().slideToggle();
	});

	$(".poster_collection img").each(function(key, item) {
		if (typeof $(item).attr('data-src') !== typeof undefined && $(item).attr('data-src') !== false && $(item).attr('data-src') !== "") $(item).attr('src', $(item).attr('data-src'));
			$(item).on("error", function() {
				showDefaultImage(this);
			}).attr('src', $(item).attr('src'));
	});


	$(".collection_top_side_view_img img").each(function(key, item) {
		if (typeof $(item).attr('data-src') !== typeof undefined && $(item).attr('data-src') !== false && $(item).attr('data-src') !== "") $(item).attr('src', $(item).attr('data-src'));
		$(item).on("error", function() {
			showDefaultImage(this);
		}).attr('src', $(item).attr('src'));
	});

	$(".poster_collection_slider img").each(function(key, item) {
		if (typeof $(item).attr('data-src') !== typeof undefined && $(item).attr('data-src') !== false && $(item).attr('data-src') !== "") $(item).attr('src', $(item).attr('data-src'));
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
		$('.burger_icon_mobile_menu').remove('burger_icon_mobile_menu_open');
		$('.header_menu_desktop').removeClass('show_header_menu_desktop');
	}

	$(window).scroll(function(event){
		let currentScrollTop = $(this).scrollTop();
		if (window.pageYOffset <= 0) {
			header.removeClass('hideHeader showHeader');
	}else{
		if (currentScrollTop > scrollTop){
			$('.header_menu_desktop').removeClass('show_header_menu_desktop');
			$('.burger_icon_mobile_menu').removeClass('burger_icon_mobile_menu_open');

			$('.header_account_info').stop().slideUp(100);
			header.addClass('hideHeader').removeClass('showHeader');
		} else{
			header.addClass('showHeader').removeClass('hideHeader');
			$('.header_account_info').stop().slideUp(100);
		}
	}

		scrollTop = currentScrollTop;
	});
	$(".wrapper_list_slider_collection").each(function(index) {
		$('.list_collection_slider', $(this)).slick({
			slidesToShow: 7,
			slidesToScroll: 1,
			prevArrow:$(this).find('.arrow_navigation_slider_collection_left'),
			nextArrow:$(this).find('.arrow_navigation_slider_collection_right'),
		});
	});
	NProgress.start();
	window.onload = function() {
		 NProgress.done(); $('.fade').removeClass('out');
	};
});
