<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container  border my-5">
    <div class="back my-3">
        <a href="/movies" class="fas fa-angle-double-left"></a>
    </div>
    <div class="row">
        <h1 class="my-3">ADD MOVIES</h1>
        <div class="col">

            <form class="form" action="/movies/save" method="post" enctype="multipart/form-data">
                <!-- csrf_field(); digunakan untuk menjaga agar formnya hanya bisa diinput melalui halaman ini saja -->
                <?= csrf_field(); ?> 
                <input type="hidden" name="slug">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">JUDUL</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('judul'); ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sutradara" class="col-sm-2 col-form-label">SUTRADARA</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('sutradara'); ?>" class="form-control <?= ($validation->hasError('sutradara')) ? 'is-invalid' : ''; ?>" id="sutradara" name="sutradara">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sutradara'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="aktor" class="col-sm-2 col-form-label">CAST</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('aktor'); ?>" class="form-control <?= ($validation->hasError('aktor')) ? 'is-invalid' : ''; ?>" id="aktor" name="aktor">
                        <div class="invalid-feedback">
                            <?= $validation->getError('aktor'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="produksi" class="col-sm-2 col-form-label">PRODUKSI</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('produksi'); ?>" class="form-control <?= ($validation->hasError('produksi')) ? 'is-invalid' : ''; ?>" id="produksi" name="produksi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('produksi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genre" class="col-sm-2 col-form-label">GENRE</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('genre'); ?>" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : ''; ?>" id="genre" name="genre">
                        <div class="invalid-feedback">
                            <?= $validation->getError('genre'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_tayang" class="col-sm-2 col-form-label">TAYANG</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('tanggal_tayang'); ?>" class="form-control <?= ($validation->hasError('tanggal_tayang')) ? 'is-invalid' : ''; ?>" id="tanggal_tayang" name="tanggal_tayang">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal_tayang'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="video" class="col-sm-2 col-form-label">VIDEO</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= old('video'); ?>" class="form-control <?= ($validation->hasError('video')) ? 'is-invalid' : ''; ?>" id="video" name="video">
                        <div class="invalid-feedback">
                            <?= $validation->getError('video'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="poster" class="col-sm-2 col-form-label">POSTER</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('poster')) ? 'is-invalid' : ''; ?>" id="poster" name="poster" onchange="previewImgPoster()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('poster'); ?>
                            </div>
                            <label class="input-group-text" for="poster">UPLOAD</label>
                        </div>
                    </div>
                </div>
                <div class="button_form">
                    <button class="submit" type="submit"><i class="fas fa-plus-circle"></i></button>
                    <button class="reset" type="reset"><i class="fas fa-times-circle"></i></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>