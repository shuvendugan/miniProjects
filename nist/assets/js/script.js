$(function () {
    //image scrolls on home page
    const swiper = new Swiper('.swiper-container', {
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
            delay: 1000, 
            disableOnInteraction: false,
        },
        loop: true,
    });
    // swiper.el.addEventListener('mouseenter', () => {
    //     swiper.autoplay.stop();
    // });
    // swiper.el.addEventListener('mouseleave', () => {
    //     swiper.autoplay.start();
    // });

    //Dorpdown in the faculty navbar 
    $('#faculty').hover(
        function () {
            if ($('#faculty-dropdown').is(':empty')) {
                $.ajax({
                    url: 'fetch_branches.php', 
                    method: 'POST',
                    success: function (data) {
                        $('#faculty-dropdown').html(data);
                    },
                    error: function () {
                        $('#faculty-dropdown').html('<p class="dropdown-item">Error loading data</p>');
                    }
                });
            }
            $('#faculty-dropdown').show(); 
        },
        function () {
            $('#faculty-dropdown').hide(); 
        }
    );

    //Content to show inside the POPUP modal
    $('.fellow-details').on('click', function () {
        var id = $(this).data('id');
        $.ajax({
            url: 'fetch_fellow_details.php',
            type: 'POST',
            data: { id: id },
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data);
                var modalContent = `
                        <div class='hod cus' style='width: 90%;'>
                            <div class='hod-img'>
                                <img src="${data.image}" alt="${data.name}">
                            </div>
                            <div class='bar cus'></div>
                            <div class='hod-details'>
                                <p><span>Name</span><span>:</span><span>${data.name}</span></p>
                                <p><span>Email</span><span>:</span><span>${data.email}</span></p>
                                <p><span>Phone</span><span>:</span><span>${data.phone}</span></p>
                            </div>
                        </div>`;

                $('#Modal .modal-body').html(modalContent);
                $('#Modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    });

   //For colored background and border

    function getRandomBackground() {
        let val1 = Math.ceil(200 + Math.random() * 55);
        let val2 = Math.ceil(200 + Math.random() * 55);
        let val3 = Math.ceil(200 + Math.random() * 55);
        return `rgb(${val1},${val2},${val3})`;
    }
    function getRandomBorder(rgb) {
        let [r, g, b] = rgb.match(/\d+/g).map(Number);
        r = Math.max(0, r - 150);
        g = Math.max(0, g - 150);
        b = Math.max(0, b - 150);
        return `rgb(${r},${g},${b})`;
    }
    function updateColors() {
        let background = getRandomBackground();
        let border = getRandomBorder(background);

        $('.cus').css({
            'background-color': background,
            'border-color': border
        });
        $('.bar').css({
            'background-color': border,
            'border-color': border
        });
        $('#down').css('background-color', border);
    }
    updateColors();
    setInterval(updateColors, 3000);
});

