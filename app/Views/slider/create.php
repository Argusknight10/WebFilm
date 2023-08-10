<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="back my-3">
        <a href="/slider" class="fas fa-angle-double-left"></a>
    </div>
    <div class="row">
        <h1 class="my-3">ADD SLIDERS</h1>
        <div class="col">
            <form class="form" action="/slider/save" method="post" enctype="multipart/form-data">
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
                    <label for="slider" class="col-sm-2 col-form-label">SLIDER</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('slider')) ? 'is-invalid' : ''; ?>" id="slider" name="slider" onchange="previewImgSlider()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('slider'); ?>
                            </div>
                            <label class="input-group-text" for="slider">UPLOAD</label>
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-start p-0 border">
                    <button class="submit" type="submit"><i class="fas fa-plus-circle"></i></button>
                    <button class="reset" type="reset"><i class="fas fa-times-circle"></i></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>