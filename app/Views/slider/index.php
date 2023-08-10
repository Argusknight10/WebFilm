<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="my-3 text-center">DAFTAR SLIDER</h1>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <div class="tambah">
                <a href="/slider/create" class="btn my-3">( <i class="fas fa-plus"></i> ) ADD SLIDERS!</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th style="background:white; color:black;" scope="col" class="table-dark">NO</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark col-10">SLIDER</th>
                        <th style="background:white; color:black;" scope="col" class="table-dark">AKSI</th>
                    </tr>
                </thead>
                <tbody style="border:black;">
                    <?php $i = 1; ?>
                    <?php foreach ($slider as $s) : ?>
                        <tr class="p-4">
                            <th scope="row" style="background:#417D7A; color:white;"><?= $i++; ?></th>
                            <td><img class="poster" src="/img/<?= $s['slider']; ?>" alt=""></td>
                            <td class="aksi text-center">
                                <div class=" d-flex align-items-center ">
                                    <a class="edt px-3 fs-4 mx-3" href="/slider/edit/<?= $s['slug']; ?>">EDIT</a>

                                    <form action="/slider/<?= $s['id']; ?>" method="post" class="">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('YAKIN INGIN MENGHAPUS?')" type="submit" class="del px-1 fs-4 mx-3">DELETE</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>