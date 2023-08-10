<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col p-0">
            <h1 class="mt-3 text-center ">DAFTAR PESANAN</h1>

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

            <!-- <div class="tambah">
                <a href="/movies/create" class="btn my-3">( <i class="fas fa-plus"></i> ) ADD MOVIES!</a>
            </div> -->
            
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
                        <th style="background:white; color:black;" scope="col" class="table-dark">USERNAME</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">JUDUL</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">TEMPAT</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">TANGGAL</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">JAM</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">JUMLAH</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">SEAT</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">BIAYA</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">AKSI</th>
                    </tr>
                </thead>
               

                <tbody style="border:black;">
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($pesan as $p) : ?>
                        <tr class="p-4">
                            <th scope="row" style="background:#417D7A; color:white;"><?= $i++; ?></th>
                            <td><?= $p['username']; ?></td>
                            <td><?= $p['judul']; ?></td>
                            <!-- <td><?= $p['slug']; ?></td> -->
                            <td><?= $p['tempat']; ?></td>
                            <td><?= $p['tanggal']; ?></td>
                            <td><?= $p['jam']; ?></td>
                            <td><?= $p['jumlah']; ?></td>
                            <td class="col-2"><?= $p['seat']; ?></td>
                            <td><?= $p['price']; ?></td>
                            <td class="aksi col-2 text-center">
                                <div class=" d-flex align-items-center ">
                                    <a class="edt px-3 fs-4 mx-3" href="/pesan/edit/<?= $p['slug']; ?>">EDIT</a>

                                    <form action="/pesan/<?= $p['id']; ?>" method="post" class="">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('YAKIN INGIN MEMBATALKAN PESANAN?')" type="submit" class="del px-1 fs-4 mx-3">DELETE</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('pesan', 'pesan_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>
