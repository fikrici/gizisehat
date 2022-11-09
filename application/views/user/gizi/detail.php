<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Gizi</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('User/informasi'); ?>">Informasi Gizi</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Detail Informasi Gizi</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="float-right">
                <a class="btn btn-info ml-2" href="<?= base_url('user/cetakdetail/' . $tgl); ?>" role="button" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="float-right">
                <a type="button" class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#staticBackdrop">Rekomendasi</a>
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
                            <th>Qty</th>
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
                                <td class="text-center"><a href="<?= base_url('User/hapus_mkn/' . $a['id'] . '/' . $a['tgl']); ?>" class="text-danger" data-toggle="tooltip" data-placement="left" title="Hapus" onclick="return confirm('Yakin ingin hapus?')"><i class="fas fa-trash"></i></a></td>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Daftar Rekomendasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 12px;">No</th>
                                            <th>Bahan Makanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($rekomendasi as $a) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $a['foodname']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->