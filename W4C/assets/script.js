document.addEventListener('DOMContentLoaded', (event) => {
    const gallery = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        autoplay: {
            delay: 5000, // Time in milliseconds between transitions
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        loop: true,
    });
    const marqueeSwiper = new Swiper('.marquee-swiper', {
        spaceBetween: 10,
        loop: true,
        speed: 5000,
        autoplay: {
            delay: 0, // No delay between transitions
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        allowTouchMove: false, // Disable user interaction
        breakpoints: {

            1025:{
                slidesPerView: 3,
            },
            // when window width is >= 481px
            481: {
                slidesPerView: 2, // Show 3 slides on larger screens
            },
            // when window width is < 481px
            480: {
                slidesPerView: 1, // Show 1 slide on smaller screens
            },
        }
    });
});