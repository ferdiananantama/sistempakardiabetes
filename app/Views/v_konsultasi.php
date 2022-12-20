<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid text-center pt-5">
    <h1>Diagnosa</h1>
</div>
<div class="container-fluid ps-5 pe-5">
    <div class="banner3 container-fluid mt-5 mb-5" style="background: #f3f3f7;">
        <h3 class="pt-5  text-center">Isi Data Berikut</h3>
        <div class="row pb-3 pt-5">
            <div class="col-md-6 offset-md-3">
                <form action="<?= base_url('konsultasi/diagnosa') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $last ?>" name="id_diagnosa" readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><b>Nama</b></label>
                        <input required type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" id="nama_pasien" name="nama_pasien">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"><b>Umur</b></label>
                        <input required type="number" class="form-control" id="formGroupExampleInput2" placeholder="Umur" id="usia" name="usia">
                    </div>
                    <div class="mb-2"><b>Jenis Kelamin</b></div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-Laki" checked>
                        <label class="form-check-label" for="lakilaki">
                            &nbsp;Laki-laki&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="form-check form-check-inline mb-4">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2" value="Perempuan">
                        <label class="form-check-label" for="perempuan">
                            &nbsp;Perempuan
                        </label>
                    </div>
                    <hr>
                    <div>
                        <h5 class="text-center"><b>Pilih Gejala Berikut Dengan Sesuai</b></h5>
                    </div>
                    <?php foreach ($data as $index => $list) : ?>
                        <div class="form-group">
                            <label class="pt-3"><b><?php echo $list['nama_gejala']; ?></b></label>
                            <br><input type="radio" name="<?php echo $list['id_gejala']; ?>" value="0" checked="">&nbsp;Tidak &nbsp;&nbsp;
                            <input type="radio" name="<?php echo $list['id_gejala']; ?>" value="1">&nbsp;Ya
                        </div>
                    <?php endforeach; ?>
                    <div class="d-grid gap-2 mx-auto pt-5">
                        <button type="submit" class="next btn">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>