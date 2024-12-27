
document.addEventListener('DOMContentLoaded', () => {
    const dataCovers = document.querySelectorAll('.dataCover');

    dataCovers.forEach(dataCover => {
            dataCover.addEventListener('mouseenter', () => {
                dataCover.classList.add('blurred');
            });

            dataCover.addEventListener('mouseleave', () => {
                dataCover.classList.remove('blurred');
            });
    });
});
