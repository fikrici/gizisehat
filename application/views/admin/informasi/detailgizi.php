<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- breadcrumb -->
    <?php
    foreach ($detail as $a) {
        $id = $a['id_user'];
    }
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/data_user'); ?>">Data User</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/informasi/' . $id); ?>">Informasi Gizi</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Detail Informasi Gizi</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $getuser['nama']; ?></h5>
            <br>
            <div class="float-right">
                <a class="btn btn-primary" href="<?= base_url('admin/cetakdetail/' . $getuser['id'] . '/' . $tgl); ?>" role="button" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <h6 class="py-2 font-weight-bold text-uppercase"><?= $tgl; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bahan Makanan</th>
                            <th>URT</th>
                            <th>Berat (gram)</th>
                            <th>Energi</th>
                            <th>Protein</th>
                            <th>Lemak</th>
                            <th>Karbohidrat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail as $a) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['bahanmakanan']; ?></td>
                                <td><?= $a['urt']; ?></td>
                                <td><?= $a['berat']; ?></td>
                                <td><?= round($a['energi'], 2); ?></td>
                                <td><?= round($a['protein'], 2); ?></td>
                                <td><?= round($a['lemak'], 2); ?></td>
                                <td><?= round($a['karbohidrat'], 2); ?></td>
                                <td><a href="<?= base_url('Admin/hapus_detail/' . $a['id'] . '/' . $a['id_user'] . '/' . $a['tgl']); ?>" data-toggle="tooltip" title="Hapus" class="text-danger" onclick="return confirm('Yakin ingin hapus?')"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfooter>
                        <tr>
                            <?php
                            $e = 0;
                            $p = 0;
                            $l = 0;
                            $k = 0;
                            foreach ($detail as $total) {
                                $e += $total['energi'];
                                $p += $total['protein'];
                                $l += $total['lemak'];
                                $k += $total['karbohidrat'];
                            }
                            ?>
                            <th colspan="4">Total</th>
                            <th><?= round($e, 2); ?></th>
                            <th><?= round($p, 2); ?></th>
                            <th><?= round($l, 2); ?></th>
                            <th><?= round($k, 2); ?></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4">Total Kebutuhan Gizi</th>
                            <th><?= round($perbandingan['total_energi'], 2);  ?></th>
                            <th><?= round($perbandingan['total_protein'], 2); ?></th>
                            <th><?= round($perbandingan['total_lemak'], 2); ?></th>
                            <th><?= round($perbandingan['total_karbohidrat'], 2); ?></th>
                            <th></th>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->