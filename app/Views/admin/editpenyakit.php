    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="text-center mb-4 mt-2">
                    <h1>Form Ubah Data Gejala</h1>
                </div>
                <form class="col-10" action="/admin/updatepenyakit/<?= $penyakit['id_penyakit']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nomor" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $penyakit['id_penyakit']; ?>" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penyakit" class="col-sm-2 col-form-label">Nama Penyakit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('penyakit')) ? 'is-invalid' : ''; ?>" id="penyakit" name="penyakit" autofocus value="<?= $penyakit['nama']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penyakit'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="informasi" class="col-sm-2 col-form-label">Informasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="informasi" name="informasi" value="<?= $penyakit['informasi']; ?>">
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