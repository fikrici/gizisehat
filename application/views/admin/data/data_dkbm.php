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
            <li class="breadcrumb-item active" aria-current="page">Data DKBM</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right">
                <a class="btn btn-primary" href="<?= base_url('admin/tambah_dkbm'); ?>" role="button"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Food Group</th>
                            <th>Food Name</th>
                            <th>Energy</th>
                            <th>Protein</th>
                            <th>Fats</th>
                            <th>Carbohidrat</th>
                            <th>Calcium</th>
                            <th>Phosphor</th>
                            <th>iron</th>
                            <th>Vit A</th>
                            <th>Vit B1</th>
                            <th>Vit C</th>
                            <th>F-Edible</th>
                            <th>F-Weight</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dkbm as $a) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['foodgroup']; ?></td>
                                <td><?= $a['foodname']; ?></td>
                                <td><?= $a['energy']; ?></td>
                                <td><?= $a['protein']; ?></td>
                                <td><?= $a['fats']; ?></td>
                                <td><?= $a['carbhdrt']; ?></td>
                                <td><?= $a['calcium']; ?></td>
                                <td><?= $a['phosphor']; ?></td>
                                <td><?= $a['iron']; ?></td>
                                <td><?= $a['vit_a']; ?></td>
                                <td><?= $a['vit_b1']; ?></td>
                                <td><?= $a['vit_c']; ?></td>
                                <td><?= $a['f_edible']; ?></td>
                                <td><?= $a['f_weight']; ?></td>
                                <td class="text-center">
                                    <a class="text-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('admin/edit_dkbm/') . $a['id'] ?>"><i class="far fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url('admin/hapus_dkbm/') . $a['id'] ?>"><i class="fas fa-trash"></i></a>
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