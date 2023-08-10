<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container-12">
        <div class="row">
            <h1 class="my-3" >CONTACT ME :</h1>
            <div class="col-contact">
                <?php foreach($medsos as $a) :?>
                <ul>
                    <li><?= $a['nama'];?></li>
                    <li><?= $a['kontak'];?></li>
                </ul>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<?= $this->endsection(); ?>