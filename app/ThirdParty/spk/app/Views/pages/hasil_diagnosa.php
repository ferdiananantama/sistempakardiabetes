<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">Konsultasi</h1>
        </div>
    </div>

    <div class="table-manage-all">
        <div class="row">
            <div class="col-md-12">
                <div class="back-operator-page-up">
                    <h3 style="text-align: center;">Hasil Diagnosa</h3>
                </div>
            </div>
        </div>

        <div class="profile-manage-all">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12">
                        <?php foreach ($ambil as $index => $list) : ?>
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <p><?php echo $list['nama_pasien']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <p><?php echo $list['jenis_kelamin']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <p><?php echo $list['usia']; ?>&nbsp;tahun</p>
                            </div>
                            <div class="form-group">
                                <label>Hasil Diagnosa</label>
                                <p><?php echo $list['nm_penyakit']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Informasi</label>
                                <p><?php echo $list['informasi']; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <p><?php echo $list['solusi']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href=" ">
                        <h5><em class="fa fa-reply">&nbsp;</em> &nbsp;Kembali diagnosa</h5>
                    </a>
                </div>
            </div>

            <div class="row">
                &nbsp;
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>