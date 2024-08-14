document.addEventListener('DOMContentLoaded', (event) => {
    const swiper = new Swiper('.swiper-container', {
        effect: 'coverflow', // or any other effect you prefer
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 3000, // Adjust delay as needed
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
        },
    });
    swiper.el.addEventListener('mouseenter', () => {
        swiper.autoplay.stop();
    });

    swiper.el.addEventListener('mouseleave', () => {
        swiper.autoplay.start();
    });

    const waveText = $('.wave-text');
    const text = waveText.html(); // Use .html() to preserve <br> tags
    let wrappedText = '';

    // Split the text into words while preserving <br> tags
    const words = text.split(/(\s+|<br\s*\/?>)/);
    for (let i = 0; i < words.length; i++) {
        if (words[i].match(/<br\s*\/?>/)) {
            wrappedText += words[i]; // Preserve <br> tags as is
        } else if (words[i].trim()) {
            wrappedText += `<span style="white-space: nowrap;">${words[i]}</span>`;
        } else {
            wrappedText += words[i]; // Preserve spaces between words
        }
    }

    // Replace the text with the wrapped text
    waveText.html(wrappedText);

    // Apply the wave animation delay
    $('.wave-text span').each(function (index) {
        $(this).css('animation-delay', (index * 0.3) + 's');
    });
});