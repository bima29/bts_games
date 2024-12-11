document.addEventListener("DOMContentLoaded", () => {
    const loadingScreen = document.getElementById('loadingScreen');
    const mainContent = document.getElementById('mainContent');

    const hasVisited = sessionStorage.getItem('hasVisited');

    if (!hasVisited) {
        setTimeout(() => {
            loadingScreen.style.display = 'none';
            mainContent.style.display = 'block';

            sessionStorage.setItem('hasVisited', 'true');
        }, 2000);
    } else {
        loadingScreen.style.display = 'none';
        mainContent.style.display = 'block';
    }
});