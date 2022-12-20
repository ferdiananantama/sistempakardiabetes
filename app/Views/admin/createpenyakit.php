    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="text-center mb-4 mt-2">
                    <h1>Form Tambah Data Penyakit</h1>
                </div>
                <form class="col-10" action="/admin/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="penyakit" class="col-sm-2 col-form-label">Nama Penyakit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('penyakit')) ? 'is-invalid' : ''; ?>" id="penyakit" name="penyakit" autofocus value="<?= old('penyakit'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penyakit'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="informasi" class="col-sm-2 col-form-label">Informasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('informasi')) ? 'is-invalid' : ''; ?>" id="informasi" name="informasi" value="<?= old('informasi'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penyakit'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
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