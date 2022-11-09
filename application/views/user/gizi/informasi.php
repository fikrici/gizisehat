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
            <li class="breadcrumb-item active" aria-current="page">Informasi Gizi</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <br>
            <form class="form-inline" method="POST" action="<?= base_url('user/cetak'); ?>">
                <div class="form-group mx-1 mb-2">
                    <input type="date" class="form-control" id="starttgl" name="starttgl">
                </div>
                <p style="float: left;">-</p> &nbsp;
                <div class="form-group mx-2 mb-2">
                    <input type="date" class="form-control" id="endtgl" name="endtgl">
                </div>
                <button type="submit" class="btn btn-primary mb-2" formtarget="_blank" style="float: right"> <i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
        <br>
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
                            <th>Energi</th>
                            <th>Protein</th>
                            <th>Lemak</th>
                            <th>Karbohidrat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php

                        ?>
                        <?php foreach ($kecukupan as $a) { ?>
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

                                <td class="text-center">
                                    <!-- <a class="text-info" data-toggle="modal" data-target="#staticBackdrop<?= $a['tgl']; ?>"><i class="fas fa-info" data-toggle="tooltip" title="Rekomendasi"></i></a> -->
                                    <a href="<?= base_url('User/detailgizi/' . $a['tgl']); ?>" data-toggle="tooltip" title="Lihat" class="text-success"><i class="far fa-eye"></i></a>
                                    <a class="hapus_tgl text-danger" data-toggle="tooltip" data-placement="top" title="Hapus" id="<?= $a['tgl']; ?>" href="#"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php foreach ($kecukupan as $a) { ?>
        <div class="modal fade" id="staticBackdrop<?= $a['tgl']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <?php } ?>

</div>
<!-- /.container-fluid -->