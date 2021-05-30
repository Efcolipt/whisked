jQuery(document).ready(function($) {
    $('.burger_icon_mobile_menu').click(function() {
        $('.header_menu_desktop').toggleClass('show_header_menu_desktop').parents(".inner_header").find(".burger_icon_mobile_menu").toggleClass('burger_icon_mobile_menu_open')
    })

    $('.header_account_avatar').click(function(e) {
        $('.header_account_info').stop().slideToggle();
    })

    let scrollTop = 0,
    header = $('header')
    if (header.offset().top > 0) {
        header.addClass('showHeader');
        $('.burger_icon_mobile_menu').removeClass('burger_icon_mobile_menu_open')
        $('.header_menu_desktop').removeClass('show_header_menu_desktop')
    }

    $(window).scroll(function(event) {
        let currentScrollTop = $(this).scrollTop()
        if (window.pageYOffset <= 0) {
            header.removeClass('hideHeader showHeader')
        } else {
            if (currentScrollTop > scrollTop) {
                $('.header_menu_desktop').removeClass('show_header_menu_desktop')
                $('.burger_icon_mobile_menu').removeClass('burger_icon_mobile_menu_open')

                $('.header_account_info').stop().slideUp(100)
                header.addClass('hideHeader').removeClass('showHeader')
            } else {
                header.addClass('showHeader').removeClass('hideHeader')
                $('.header_account_info').stop().slideUp(100)
            }
        }

        scrollTop = currentScrollTop
    })
    NProgress.start()
    window.onload = function() {
        NProgress.done()
        $('.fade').removeClass('out')
    }

})
