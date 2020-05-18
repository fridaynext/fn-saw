jQuery(document).ready(function () {
    // Format callable phone number
    // jQuery('.vendor-phone-call-text').text(function(i, text) {
    //     $phone_formatted = text.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    //     return '<a href="tel:' + $phone_formatted + '">' + $phone_formatted + '</a>';
    // });
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
});