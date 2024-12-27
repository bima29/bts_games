const carousel = document.querySelector('#bannerCarousel');
const carouselInstance = new bootstrap.Carousel(carousel, {
    interval: 3000, 
    ride: 'carousel'
});

const gameImages = document.querySelectorAll('.gameImage');

document.addEventListener('DOMContentLoaded', () => {
    const gameImages = document.querySelectorAll('.gameImage');

    gameImages.forEach(gameImage => {
        const gameText = gameImage.closest('.card').querySelector('.gameText');

        gameImage.addEventListener('mouseenter', () => {
            gameImage.classList.add('blurred');
            gameText.style.display = 'block'; 
        });

        gameImage.addEventListener('mouseleave', () => {
            gameImage.classList.remove('blurred');
            gameText.style.display = 'none'; 
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const navbarCollapse = document.getElementById("navbarNav");
    const navbarToggler = document.querySelector(".navbar-toggler");

    navbarToggler.addEventListener("click", function () {
        const isExpanded = navbarCollapse.classList.contains("show");

        if (isExpanded) {
            navbarCollapse.classList.remove("mt-3");
        } else {
            navbarCollapse.classList.add("mt-3");
        }
    });

    navbarCollapse.addEventListener("hidden.bs.collapse", function () {
        navbarCollapse.classList.remove("mt-3");
    });
});

