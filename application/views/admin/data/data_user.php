<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Gizi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right">
                <a class="btn btn-primary" href="<?= base_url('admin/tambah_user'); ?>" role="button"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($getuser as $a) : ?>
                            <?php
                            if ($a['role_id'] == 1) {
                                $role = 'Admin';
                            } else {
                                $role = 'User';
                            }
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['alamat']; ?></td>
                                <td><?= $a['jeniskelamin']; ?></td>
                                <td><?= $a['tanggallahir']; ?></td>
                                <td><?= $a['bb']; ?></td>
                                <td><?= $a['tb']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td><?= $role; ?></td>
                                <?php if ($a['role_id'] == 1) { ?>
                                    <td></td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('Admin/informasi/' . $a['id']); ?>" data-toggle="tooltip" title="Lihat" class="text-info"><i class="far fa-eye"></i></a>
                                        <a href="<?= base_url('Admin/edit_user/' . $a['id']); ?>" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus ?')" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url('admin/hapus_user/') . $a['id'] ?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->