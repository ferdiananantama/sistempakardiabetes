    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="mb-3">Data Gejala</h1>
            <div class="text-right pr-3">
                <a href="/admin/creategejala" class="text-right btn btn-primary mb-3">Tambah Data</a>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Gejala Penyakit</th>
                                    <th scope="col" class="text-right pr-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($gejala as $k) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td>G<?= $k['id_gejala']; ?></td>
                                        <td><?= $k['nama_gejala']; ?></td>
                                        <td class="text-right">
                                            <a href="/admin/hapus/ <?= $k['id_gejala']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Delete</a>
                                            <a href="/admin/editgejala/<?= $k['id_gejala']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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