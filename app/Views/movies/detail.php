<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3 ">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="player ">
                            <iframe src="<?= $movie['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <img class="poster2 h-100" src="/img/<?= $movie['poster']; ?>" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="h-90 col-md-12  p-4">
                            <h1 class="card-title"><b><?= $movie['judul']; ?></b></h1>
                            <div class="card-text"><b>DIRECTOR : </b><?= $movie['sutradara']; ?></div>
                            <div class="card-text"><b>PRODUCTION : </b><?= $movie['produksi']; ?></div>
                            <div class="card-text"><b>CAST : </b><?= $movie['aktor']; ?></div>
                            <div class="card-text"><b>GENRE : </b><?= $movie['genre']; ?></div>
                            <p class="card-text"><small class="text-muted"><b>RELEASE : </b> <?= $movie['tanggal_tayang']; ?></small></p>
                        </div>
                        <div class="tombol" style="padding: 30px;">
                            <a href="/movies" style="font-size:20px; padding:5px 15px; background:#FBB454;" class="btn"><i class="fas fa-angle-double-left"></i></a>

                            <a href="/movies/edit/<?= $movie['slug']; ?>" class="btn" style="background-color:#5C7AEA; color:white; padding:5px 20px; font-size:20px;">EDIT</a>

                            <form action="/movies/<?= $movie['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button onclick="return confirm('YAKIN INGIN MENGHAPUS?')" type="submit" class="btn" style=" color:white; padding:5px 20px; font-size:20px;">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>