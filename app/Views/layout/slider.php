<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="true">
    <div class="carousel-indicators">
        <?php
            foreach ($slider as $a => $value) {
                if ($a == 0) { ?>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?= $a ?>" class="active" aria-current="true"></button>
                <?php } else { ?>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?= $a ?>" aria-current="true"></button>
            <?php }
            }
        ?>
    </div>
    <div class="carousel-inner">
        <!-- <h3 class="populer">POPULER</h3> -->
        <?php
            foreach ($slider as $s => $value) {
                if ($s == 0) { ?>
                    <div class="carousel-item active">
                        <a href="/movies/<?= $value['slug']; ?>"><img src="/img/<?= $value['slider']; ?>" alt="..."></a>
                    </div>
                <?php } else { ?>
                    <div class="carousel-item">
                        <a href="/movies/<?= $value['slug']; ?>"><img src="/img/<?= $value['slider']; ?>" alt="..."></a>
                    </div>
            <?php }
            }
        ?>
    </div>
    <div class="slide">
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span aria-hidden="true" class="fas fa-angle-double-left"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span aria-hidden="true" class="fas fa-angle-double-right"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>