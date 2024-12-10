<?php
$title = 'All Game||BTS Store';
?>
<div class="container-fluid" style="background-image:url('https://media.suara.com/pictures/1600x840/2024/06/27/99491-hero-hou-yi-honor-of-kings.jpg');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
background-attachment: fixed;
overflow: auto;
height: 100%;
">

    <div id="loadingScreen">
        <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Loading..." class="loadingGif">
    </div>

    <div id="mainContent" style="display: none;">
    </div>

    <div class="container mt-5 rounded" style="background-color: rgba(0, 0, 0, 0.4);">
        <h1 class="text-white">Welcome to BTS Store Indonesia</h1>
        <p class="text-white">Your one-stop shop for all your gaming needs!</p>
        <div class="category-buttons d-flex flex-wrap gap-2 justify-content-start mt-3">
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">Populer</button>
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">Beru Rilis</button>
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">Top Up Login</button>
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">Mobile Game</button>
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">PC Game</button>
            <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6">Voucher</button>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-6 col-md-3 mb-3">
                <a href="<?= base_url('Home/Checkout1'); ?>" class="text-decoration-none">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                        <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp"
                            class="card-img-top gameImage" alt="Game Image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Mobile Legends: Bang Bang</h5>
                            <p class="card-text text-white">Moonton</p>
                        </div>
                        <h3 class="text-white gameText" style="background-color: rgba(0, 0, 0, 0.5); border-radius:5px">
                            Mobile Legend
                        </h3>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <a href="<?= base_url('Home/Checkout1'); ?>" class="text-decoration-none">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                        <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp"
                            class="card-img-top gameImage" alt="Game Image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Mobile Legends: Bang Bang</h5>
                            <p class="card-text text-white">Moonton</p>
                        </div>
                        <h3 class="text-white gameText" style="background-color: rgba(0, 0, 0, 0.5); border-radius:5px">
                            Mobile Legend
                        </h3>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <a href="<?= base_url('Home/Checkout1'); ?>" class="text-decoration-none">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                        <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp"
                            class="card-img-top gameImage" alt="Game Image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Mobile Legends: Bang Bang</h5>
                            <p class="card-text text-white">Moonton</p>
                        </div>
                        <h3 class="text-white gameText" style="background-color: rgba(0, 0, 0, 0.5); border-radius:5px">
                            Mobile Legend
                        </h3>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="<?= base_url('Home/Checkout1'); ?>" class="text-decoration-none">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                        <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp"
                            class="card-img-top gameImage" alt="Game Image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Mobile Legends: Bang Bang</h5>
                            <p class="card-text text-white">Moonton</p>
                        </div>
                        <h3 class="text-white gameText" style="background-color: rgba(0, 0, 0, 0.5); border-radius:5px">
                            Mobile Legend
                        </h3>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="<?= base_url('Home/Checkout1'); ?>" class="text-decoration-none">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                        <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp"
                            class="card-img-top gameImage" alt="Game Image">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Mobile Legends: Bang Bang</h5>
                            <p class="card-text text-white">Moonton</p>
                        </div>
                        <h3 class="text-white gameText" style="background-color: rgba(0, 0, 0, 0.5); border-radius:5px">
                            Mobile Legend
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <hr>
    </div>
</div>

<script>
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
</script>