<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid text-center pt-5">
    <h1>Hasil Diagnosa</h1>
</div>
<div class="container-fluid ps-5 pe-5">
    <div class="banner4 container-fluid mt-5 mb-5" style="background: #f3f3f7;">
        <div class="row pb-3 pt-5">
            <div class="col-md-6 offset-md-3">
                <div class="profile-manage-all">
                    <div class="panel-body">
                        <div class="col-md-12 fs-5">
                            <?php foreach ($ambil as $index => $list) : ?>
                                <div class="form-group">
                                    <label class="fw-bold">Nama</label>
                                    <p><?php echo $list['nama_pasien']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Jenis Kelamin</label>
                                    <p><?php echo $list['jenis_kelamin']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Usia</label>
                                    <p><?php echo $list['usia']; ?>&nbsp;tahun</p>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Hasil Diagnosa</label>
                                    <p><?php echo $list['nama']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Informasi</label>
                                    <p class="text-sm"><?php echo $list['informasi']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <a class="nav-link" href="/">
                    <div class="d-grid gap-2 pt-4">
                        <button type="button" class="next btn ">Kembali</button>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>