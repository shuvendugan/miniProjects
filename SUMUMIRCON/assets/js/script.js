document.addEventListener('DOMContentLoaded', function() {
    // for navbar open and close
    const mobileMenu = document.getElementById('mobile-menu');
    const navList = document.querySelector('.nav-list');

    if (mobileMenu && navList) { 
        mobileMenu.addEventListener('click', function() {
        navList.classList.toggle('active');
    });
    }

    // ===============================
    // Scroll funtion for the navbar color
    window.onscroll = function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
        header.classList.add('scroll');
        } else {
        header.classList.remove('scroll');
        }
    };
    
});
// ======================================
    function openModal(imgElement) {
    // Get the modal
    var modal = document.getElementById("imageModal");

    // Get the modal image and caption text
    var modalImg = document.getElementById("modalImage");
    var captionText = document.getElementById("caption");

    // Display the modal
    modal.style.display = "block";

    // Set the clicked image as the modal content
    modalImg.src = imgElement.src;

    // Set the alt text of the image as the caption
    captionText.innerHTML = imgElement.alt;
}
function closeModal() {
    // Close the modal
    document.getElementById("imageModal").style.display = "none";
}


// Scroll Button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

