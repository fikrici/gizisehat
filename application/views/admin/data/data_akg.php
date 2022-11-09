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
            <li class="breadcrumb-item active" aria-current="page">Data AKG</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right">
                <a class="btn btn-primary" href="<?= base_url('admin/tambah_akg'); ?>" role="button"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelompok</th>
                            <th>umur</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>energi</th>
                            <th>Protein</th>
                            <th>lemak</th>
                            <th>Karbohidrat</th>
                            <th>serat</th>
                            <th>air</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($akg as $a) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['kelompok']; ?></td>
                                <td><?= $a['umur']; ?></td>
                                <td><?= $a['bb']; ?></td>
                                <td><?= $a['tb']; ?></td>
                                <td><?= $a['energi']; ?></td>
                                <td><?= $a['protein']; ?></td>
                                <td><?= $a['lemak']; ?></td>
                                <td><?= $a['karbohidrat']; ?></td>
                                <td><?= $a['serat']; ?></td>
                                <td><?= $a['air']; ?></td>
                                <td class="text-center">
                                    <a class="text-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('admin/edit_akg/') . $a['id'] ?>"><i class="far fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url('admin/hapus_akg/') . $a['id'] ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->