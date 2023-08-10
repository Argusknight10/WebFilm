<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row ">
        <div class="col-movie p-0 col-12 ">
            <div class="col-kategori kategori-movie d-flex ">
                <button class="kategori active" data-kategori="all">SEMUA</button>
                <button class="kategori" data-kategori="AKSI">AKSI</button>
                <button class="kategori" data-kategori="PETUALANGAN">PETUALANGAN</button>
                <button class="kategori" data-kategori="KOMEDI">KOMEDI</button>
                <button class="kategori" data-kategori="DRAMA">DRAMA</button>
                <button class="kategori" data-kategori="HORROR">HORROR</button>
                <button class="kategori" data-kategori="FANTASI">FANTASI</button>
                <button class="kategori" data-kategori="ROMANTIS">ROMANTIS</button>
                <button class="kategori" data-kategori="ANIMASI">ANIMASI</button>
                <button class="kategori" data-kategori="KELUARGA">KELUARGA</button>
            </div>
            <div class="row-movie pt-3" id="movie">
                <?php foreach ($pesan as $p) : ?>
                    <div class="col-movie p-0 d-flex " data-kategori="<?= $p['genre']; ?>">
                        <div class="card-movie">
                            <a href="/pesan/pesan/<?= $p['slug']; ?>"><img src="/img/<?= $p['poster']; ?>" class="posterMovie" alt="..."></a>
                            <!-- <h5 class="card-title"><?= $p['judul']; ?></h5> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>