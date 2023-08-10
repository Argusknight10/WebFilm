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
                    <div class="col-md-9 border">
                        <div class="h-90 col-md-12  p-4">
                            <h1 class="card-title"><b><?= $movie['judul']; ?></b></h1>
                            <div class="card-text"><b>DIRECTOR : </b><?= $movie['sutradara']; ?></div>
                            <div class="card-text"><b>PRODUCTION : </b><?= $movie['produksi']; ?></div>
                            <div class="card-text"><b>CAST : </b><?= $movie['aktor']; ?></div>
                            <div class="card-text"><b>GENRE : </b><?= $movie['genre']; ?></div>
                            <p class="card-text text-muted"><small><b>RELEASE : </b> <?= $movie['tanggal_tayang']; ?></small></p>
                        </div>
                        <!-- <a href="/pages/movies" class="back-film fs-1 mx-2"><i class=" far fa-arrow-alt-circle-left"></i></a> -->
                    </div>
                    <div class="col-md-12 pb-3 px-4">
                        <form class="form" action="/pesan/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug">

                            <div class=" mb-3">
                                <div class="d-flex justify-content-center">
                                    <label for="judul" class="col-2 col-form-label  text-center fs-5">JUDUL</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" value="<?= (old('judul')) ? old('judul') : $movie['judul'] ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class=" my-3 p-0">
                                <select class="col-12 text-center form-select" name="tempat" id="tempat">
                                    <option selected disabled value="">Tempat...</option>
                                    <option value="XXI">XXI</option>
                                    <option value="CGV">CGV</option>
                                    <option value="CINEPOLIS">CINEPOLIS</option>
                                    <option value="IMAX">IMAX</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempat'); ?>
                                </div>
                            </div>

                            <div class=" my-3 p-0 d-flex">
                                <div class="form-group col-6">
                                    <input type="date" value="<?= old('tanggal'); ?>" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal">
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                                <select class="text-center form-select" name="jam" id="jam">
                                    <option selected disabled value="">Waktu...</option>
                                    <option value="10.00-13.00">10.00-13.00</option>
                                    <option value="12.30-15.30">12.30-15.30</option>
                                    <option value="15.00-18.00">15.00-18.00</option>
                                    <option value="17.30-20.30">17.30-20.30</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jam'); ?>
                                </div>
                            </div>

                            <div class=" my-3 d-flex">
                                <div class="my-3 d-flex">
                                    <div class="col-6 d-flex border">
                                        <button class="btn minus-btn" type="button" onclick="decrementJumlah()"><i class="far fa-minus-square"></i></button>
                                        <input class="form-control text-center <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" type="text" id="jumlah" value="1" name="jumlah">
                                        <button class="btn plus-btn" type="button" onclick="incrementJumlah()"><i class="far fa-plus-square"></i></button>
                                    </div>
                                    <div class="col-6 ">
                                        <input type="text" id="price" name="price" class="text-dark form-control" value="30000" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 bangku  p-2 ">
                                <div class="seats p-0">
                                    <?php foreach ($seats as $s) : ?>
                                        <input onclick="incrementJumlah()" class="bangku btn seat-btn <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" type="checkbox" name="seat[]" id="seat" value="<?= $s['nama_bangku']; ?>">
                                    <?php endforeach; ?>
                                </div>
                                <div class="screen text-center border mt-3 ">LAYAR</div>
                            </div>

                            <div class=" d-flex justify-content-start p-0">
                                <button class="submit  px-4" type="submit"><i class="fas fa-pencil-alt"></i> PESAN</button>
                                <button class="reset px-2" type="reset"><i class="fas fa-times-circle"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>