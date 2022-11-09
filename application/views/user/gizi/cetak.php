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
                <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $title; ?></h5>
                <br>
            </div>
            <br>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>umur</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th>Angka Kecukupan Energi</th>
                                <th>Angka Kecukupan Protein</th>
                                <th>Angka Kecukupan Lemak</th>
                                <th>Angka Kecukupan Karbohidrat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php

                            ?>
                            <?php foreach ($cetak as $a) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $a['tgl']; ?></td>
                                    <td><?= $a['umur']; ?></td>
                                    <td><?= $a['tinggibadan']; ?></td>
                                    <td><?= $a['beratbadan']; ?></td>
                                    <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 80  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-success">Terpenuhi</span> </h5>
                                        </td>
                                    <?php } ?>

                                    <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-success">Terpenuhi</span> </h5>
                                        </td>
                                    <?php } ?>


                                    <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-success">Terpenuhi</span> </h5>
                                        </td>
                                    <?php } ?>


                                    <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-danger">Tidak Terpenuhi</span> </h5>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center">
                                            <h5><span class="badge badge-success">Terpenuhi</span> </h5>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</body>
<!-- <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-ui.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/jquery-3.3.1.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->


</html>