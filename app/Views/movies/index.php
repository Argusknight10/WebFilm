<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col p-0">
            <h1 class="my-3 text-center">DAFTAR FILM</h1>

            <?php if (session()->getFlashdata('message')) : ?>
            <div style="font-size:20px; font-weight:bold;" class="alert alert-success" role="alert">
                <i class="fas fa-check-square"></i>
                <?= session()->getFlashdata('message'); ?>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('notFound')) : ?>
                <div style="font-size:20px; font-weight:bold;" class="alert alert-danger" role="alert">
                    <i class="fas fa-times-circle"></i>
                    <?= session()->getFlashdata('notFound'); ?>
                </div>
            <?php endif; ?>

            <div class="tambah">
                <a href="/movies/create" class="btn my-3">( <i class="fas fa-plus"></i> ) ADD MOVIES!</a>
            </div>
            
            <div class="">
                <form action="" method="post">
                    <div class="input-group mb-3 search">
                        <input type="text" class="form-control " placeholder="Cari film yang anda inginkan..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th style="background:white; color:black;" scope="col" class="table-dark">NO</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">POSTER</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">JUDUL</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">GENRE</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">AKSI</th>
                    </tr>
                </thead>
                <tbody style="border:black;">
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($movie as $m) : ?>
                        <tr>
                            <th scope="row fs-1" style="background:#417D7A; color:white;"><?= $i++; ?></th>
                            <td><img class="poster" src="/img/<?= $m['poster']; ?>" alt=""></td>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['genre']; ?></td>
                            <td><a href="/movies/<?= $m['slug']; ?>" class="btn fs-5 p-2 text-light" style="background-color:#417D7A;">DETAILS</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('movie', 'movie_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>