document.addEventListener('DOMContentLoaded', function () {
    const packages = document.querySelectorAll('.packages-list');

    packages.forEach(package => {
        package.querySelector('.open').addEventListener('click', function () {
            package.classList.toggle('expanded');
            const img = package.querySelector('.open');
            if (package.classList.contains('expanded')) {
                img.src = "images/close.png";
            } else {
                img.src = "images/plus.png"; 
            }
        });
    });

});