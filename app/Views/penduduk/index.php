<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h1 class="my-3">DAFTAR PENDUDUK</h1>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background:white; color:black;" scope="col" class="table-dark">NO</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">NAMA</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">ALAMAT</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">AKSI</th>
                    </tr>
                </thead>
                <tbody style="border:white;">
                    <?//php $i = 1 + (10 * ($currentPage - 1)); //?>
                    <?php $i = 1; ?>
                    <?php foreach ($penduduk as $p) : ?>
                        <tr>
                            <th scope="row" style="background:#417D7A; color:white;"><?= $i++; ?></th>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td><a href="" class="btn" style="background-color:#8EC3B0; padding:10px; font-size:15px; font-weight:bold;">DETAILS</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?//= $pager->links('penduduk','penduduk_pagination'); //?>
    </div>
</div>
<?= $this->endsection(); ?>