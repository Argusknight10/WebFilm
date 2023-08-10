<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/slider'); ?>
<?= $this->include('layout/owlCarousel'); ?>
<div class="container-fluid wadah-film d-flex justify-content-center ">
    <div class="container-film my-4 text-center">
        <div class="row m-0">
            <div class="col  p-3">
                <div class="unggulan my-4">
                    <h2 class="fw-bolder text-center">FILM UNGGULAN</h2>

                    <ul class="filters_unggulan">
                        <li class="active" data-filter=".terbaru">TERBARU</li>
                        <li data-filter=".sedang_hangat">SEDANG HANGAT</li>
                        <li data-filter=".banyak_disukai">BANYAK DISUKAI</li>
                    </ul>
                </div>

                <div class="row-movie ">
                    <?php $i = 1 + (14 * ($currentPage - 1)); ?>
                    <?php foreach ($movie as $m) : ?>
                    <div class="col-movie p-1 d-inline-block ">
                        <div class="card-movie">
                            <a href="/pesan/pesan/<?= $m['slug']; ?>"><img src="/img/<?= $m['poster']; ?>" class="posterMovie" alt="..."></a>
                            <!-- <h5 class=" card-title "><?= $m['judul']; ?></h5> -->
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>

            <div class="paging mb-4">
                <?= $pager->links('movie', 'movie_pagination'); ?>
            </div>
        </div>
        
    </div>
</div>
<div class="owl-slider py-3">
    <div class="container container-owl-slider">
        <h1 class="border py-3">Random Trailers</h1>
        <div id="owl-demo" class="owl-carousel owl-theme">
            <?php foreach ($movie as $m => $value) : ?>
                <div class="item">
                    <iframe src="<?= $value['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>