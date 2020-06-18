jQuery(document).ready(function ( $ ) {
    // Change the nav bar to fixed position after a certain amount of scroll
    let navBar = jQuery(".vendor-sticky-nav");
    $("body").scroll(function () {
        let fromTop = window.scrollY;
        // 54px - once the nav bar is 54px from the top, make it fixed
        if (navBar.offsetTop <= 54) {
            navBar.css("position", "fixed");
            navBar.css("top", "54px");
            navBar.css("left", "0");
            navBar.css("z-index", "99");
        }
    });
    navBar.stickybits();

    $(".vendor-login a").click(function () {
        console.log("just clicked vendor login");
        $("div.vendor-login-form").toggleClass("visible");
    });
    $(".header-search a").click(function () {
        console.log("just clicked search button");
        $("div.header-search-dropdown").toggleClass("visible");
    });
    // class to give display: block; --> header-search-dropdown
    $("#sidebar").stickybits();

    // Format callable phone number
    // jQuery('.vendor-phone-call-text').text(function(i, text) {
    //     $phone_formatted = text.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    //     return '<a href="tel:' + $phone_formatted + '">' + $phone_formatted + '</a>';
    // });
    // var swiper = new Swiper('.swiper-container', {
    //     slidesPerView: 'auto',
    //     centeredSlides: true,
    //     spaceBetween: 5,
    //     pagination: {
    //         el: '.swiper-pagination',
    //         clickable: true,
    //     },
    //     navigation: {
    //         nextEl: '.swiper-button-next',
    //         prevEl: '.swiper-button-prev'
    //     }
    // });
});