    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="text-center mb-4 mt-2">
                    <h1>Form Ubah Data Latih</h1>
                </div>
                <form class="col-10" action="/admin/updatelatih/<?= $latih['id_diagnosa']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nomor" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $latih['id_diagnosa']; ?>" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $latih['nama_pasien']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $latih['jenis_kelamin']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="umur" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur" value="<?= $latih['usia']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penyakit" class="col-sm-2 col-form-label">Hasil Diagnosa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="penyakit" name="penyakit" value="<?= $latih['id_penyakit']; ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <?= $this->renderSection('section') ?>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php echo view('layout/footer_adm') ?>