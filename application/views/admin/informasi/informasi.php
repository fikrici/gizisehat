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
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/data_user'); ?>">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Informasi Gizi User</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $getuser['nama']; ?></h5>
            <br>
            <form class="form-inline" method="POST" action="<?= base_url('admin/cetak'); ?>">
                <div class="form-group mx-1 mb-2">
                    <input type="date" class="form-control" id="starttgl" name="starttgl">
                </div>
                <p style="float: left;">-</p> &nbsp;
                <div class="form-group mx-2 mb-2">
                    <input type="date" class="form-control" id="endtgl" name="endtgl">
                </div>
                <div class="form-group mx-2 mb-2" hidden>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $getuser['id']; ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2" formtarget="_blank" style="float: right"> <i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php

                        ?>
                        <?php foreach ($data_gizi as $a) { ?>
                            <?php
                            $e = floor($a['energi']);
                            $p = floor($a['protein']);
                            $l = floor($a['lemak']);
                            $k = floor($a['karbohidrat']);
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a['tgl']; ?></td>
                                <td><?= $a['umur']; ?></td>
                                <td><?= $a['tinggibadan']; ?></td>
                                <td><?= $a['beratbadan']; ?></td>
                                <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 80  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi </span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['energi'] < $perbandingan['total_energi'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-success">Mencukupi</span> </h5>
                                    </td>
                                <?php } ?>

                                <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['protein'] < $perbandingan['total_protein'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-success">Mencukupi</span> </h5>
                                    </td>
                                <?php } ?>


                                <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['lemak'] < $perbandingan['total_lemak'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-success">Mencukupi</span> </h5>
                                    </td>
                                <?php } ?>


                                <?php if ($a['id_kelompok'] == 1 and $a['umur'] < 7 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 1 and $a['umur'] < 12  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "Bayi") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 4 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 7  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 2 and $a['umur'] < 10 and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "anak") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] > 89  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "laki-laki") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 13  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 16  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 19  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 30  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 50  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 65  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else if ($a['id_kelompok'] == 3 and $a['umur'] < 81  and $a['karbohidrat'] < $perbandingan['total_karbohidrat'] and $perbandingan['kelompok'] == "perempuan") { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-danger">Tidak Mencukupi</span> </h5>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <h5><span class="badge badge-success">Mencukupi</span> </h5>
                                    </td>
                                <?php } ?>

                                <td class="text-center">
                                    <a href="<?= base_url('Admin/detailgizi/' . $a['id_user'] . '/' . $a['tgl']); ?>" data-toggle="tooltip" title="Lihat" class="text-info"><i class="far fa-eye"></i></a>
                                    <a href="<?= base_url('Admin/hapus_info/' . $a['id_user'] . '/' . $a['tgl']); ?>" data-toggle="tooltip" title="Hapus" class="text-danger" onclick="return confirm('Yakin ingin hapus?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->