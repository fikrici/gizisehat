<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/dataTables/buttons-1.5.6/css/buttons.bootstrap4.min.css">

    <script>
        window.print()
    </script>
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $getuser['nama']; ?></h5>
                <br>
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
                                <th><?= ($e); ?></th>
                                <th><?= ($p); ?></th>
                                <th><?= ($l); ?></th>
                                <th><?= ($k); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">Total Kebutuhan Gizi</th>
                                <th><?= round($perbandingan['total_energi'], 2);  ?></th>
                                <th><?= round($perbandingan['total_protein'], 2); ?></th>
                                <th><?= round($perbandingan['total_lemak'], 2); ?></th>
                                <th><?= round($perbandingan['total_karbohidrat'], 2); ?></th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</body>

</html>