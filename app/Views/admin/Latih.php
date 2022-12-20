    <?php echo view('layout/header_adm') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="mb-3">Data Latih</h1>
            <div class="text-right pr-3">
                <a href="/admin/createlatih" class="text-right btn btn-primary mb-3">Tambah Data</a>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Hasil Diagnosa</th>
                                    <th scope="col" class="text-right pr-5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $index => $list) : ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $list['nama_pasien']; ?></td>
                                        <td><?php echo $list['jenis_kelamin']; ?></td>
                                        <td><?php echo $list['usia']; ?></td>
                                        <td><?php echo $list['nama']; ?></td>
                                        <td class="text-right">
                                            <a href="/admin/busak/<?= $list['id_diagnosa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Delete</a>
                                            <a href="/admin/editlatih/<?= $list['id_diagnosa']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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