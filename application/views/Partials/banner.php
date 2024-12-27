<div class="container-bg-img-home">
    <div class="container bg-color-blur-black-7 d-flex justify-content-center align-items-center mt-5" style="border-radius:30px; overflow: hidden;">
        <div id="bannerCarousel" class="carousel slide w-100" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <?php $active = true; ?>
                <?php foreach ($banners as $banner): ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center" style=" overflow: hidden;">
                            <img src="<?= base_url('assets/img/' . $banner->image); ?>" class="d-block w-100" style="height:auto; max-height:500px;" alt="<?= $banner->title ?>">
                        </div>
                    </div>
                    <?php $active = false; ?>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
