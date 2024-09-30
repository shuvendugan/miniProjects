$(document).ready(function () {
    // Removing notification using javascript

    // const notification = document.getElementById('notification');

    // if (notification.classList.contains('success') || notification.classList.contains('failure')) {
    //     setTimeout(() => {
    //         notification.className = 'notification';
    //     }, 5000); // 1000 milliseconds = 1 seconds
    // }

    // Removing notification using jQuery
    var notification = $('#notification');

    if (notification.hasClass('success') || notification.hasClass('failure')) {
        setTimeout(function () {
            notification.fadeOut('slow', function () {
                notification.removeClass('success failure').css('display', 'none');
            });
            // notification.removeClass('success failure');
        }, 5000); // 1000 milliseconds = 1 seconds
    }
});