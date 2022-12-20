    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="mb-3">Data Penyakit</h1>
            <div class="text-right pr-3">
                <a href="/admin/createpenyakit" class="text-right btn btn-primary mb-3">Tambah Data</a>
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
                                <?php $i = 1; ?>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col" class="text-center">Informasi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penyakit as $k) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td>P<?= $k['id_penyakit']; ?></td>
                                        <td><?= $k['nama']; ?></td>
                                        <td><?= $k['informasi']; ?></td>
                                        <td class="col-2 text-center align-middle">
                                            <a href="/admin/delete/<?= $k['id_penyakit']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Delete</a>
                                            <a href="/admin/editpenyakit/<?= $k['id_penyakit']; ?>" class="btn btn-warning btn-sm">Edit</a>
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