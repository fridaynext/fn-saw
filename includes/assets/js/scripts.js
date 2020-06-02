jQuery(document).ready(function () {
    // Change the nav bar to fixed position after a certain amount of scroll
    let navBar = jQuery(".vendor-sticky-nav");
    jQuery("body").scroll( function () {
       let fromTop = window.scrollY;
       // 54px - once the nav bar is 54px from the top, make it fixed
       if (navBar.offsetTop <= 54) {
           navBar.css("position", "fixed");
           navBar.css("top", "54px");
           navBar.css("left", "0");
           navBar.css("z-index", "99");
       }
    });



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