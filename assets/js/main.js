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
