<div class="owl-card p-3 border">
    <div class="container">
        <div class="row">
            <div class="col my-2">
                <h1 class="border py-3 fw-bold"></h1>
                <div id="owl-card-slide" class="owl-carousel owl-theme ">
                    <?php foreach ($pesan as $p) : ?>
                        <div class="item">
                            <a href="/pesan/pesan/<?= $p['slug']; ?>">
                                <img src="/img/<?= $p['poster']; ?>" class="posterOwl" alt="...">
                            </a>
                            <!-- <h5 class=" card-title "><?= $p['judul']; ?></h5> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>