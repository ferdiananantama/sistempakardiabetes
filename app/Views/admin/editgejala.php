    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="text-center mb-4 mt-2">
                    <h1>Form Ubah Data Gejala</h1>
                </div>
                <form class="col-10" action="/admin/updategejala/<?= $gejala['id_gejala']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nomor" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $gejala['id_gejala']; ?>" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('gejala')) ? 'is-invalid' : ''; ?>" id="gejala" name="gejala" value="<?= $gejala['nama_gejala']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gejala'); ?>
                            </div>
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