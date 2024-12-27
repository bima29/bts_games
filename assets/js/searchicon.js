const searchIcon = document.getElementById('searchIcon');
const searchForm = document.getElementById('searchForm');

searchIcon.addEventListener('click', () => {
    searchForm.classList.toggle('active');
});

document.addEventListener('click', (event) => {
    if (!searchForm.contains(event.target) && !searchIcon.contains(event.target)) {
        searchForm.classList.remove('active');
    }
});