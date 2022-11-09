<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Gizi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cek Gizi</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $title; ?></h5>
            <br>
            <div id="hasil"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url('user/inputgizi'); ?>">
                <div class="form-group">
                    <div class="table-responsive">
                        <table id="cekgizi" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Makanan</th>
                                    <th>URT</th>
                                    <th>Berat (gr)</th>
                                    <th>Energi</th>
                                    <th>Lemak</th>
                                    <th>Protein</th>
                                    <th>Karbohidrat</th>
                                    <th>BDD</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php
                                // tanggal lahir
                                $umr = $user['tanggallahir'];
                                $tanggal = new DateTime($umr);
                                // tanggal hari ini
                                $today = new DateTime('today');
                                // tahun
                                $umur = $today->diff($tanggal)->y;
                                ?>
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <tr id="row_1">
                                    <td class="text-center"><?= $nomor++; ?></td>
                                    <td><input type="text" data-type="id_user" class="form-control" id="id_user[]" name="id_user[]" value="<?= $user['id']; ?>"></td>
                                    <td><input type="text" data-type="tgl" class="form-control" id="tgl[]" name="tgl[]" value="<?= date('Y-m-d'); ?>"></td>
                                    <td hidden><input type="text" data-type="jeniskelamin" class="form-control" id="jeniskelamin[]" name="jeniskelamin[]" value="<?= $user['jeniskelamin']; ?>"></td>
                                    <td hidden><input type="text" data-type="umur" class="form-control" id="umur[]" name="umur[]" value="<?= $umur; ?>"></td>
                                    <td hidden><input type="text" data-type="tinggibadan" class="form-control" id="tinggibadan[]" name="tinggibadan[]" value="<?= $user['tb']; ?>"></td>
                                    <td><input type="text" data-type="beratbadan" class="form-control" id="beratbadan[]" name="beratbadan[]" value="<?= $user['bb']; ?>"></td>
                                    <td><input type="text" data-field-name="foodname" class="form-control autocomplete_txt" id="bahanmakanan_1" name="bahanmakanan[]" placeholder="Masukan Bahan Makanan" required></td>
                                    <td><input type="text" data-type="urt" class="form-control" id="urt" name="urt[]" placeholder="Cth.Piring " required></td>
                                    <td><input type="number" data-type="berat" class="form-control" id="berat_1" name="berat[]" placeholder="Masukan Berat (gr)" required></td>
                                    <td><input type="text" data-field-name="energy" class="form-control autocomplete_txt" id="energi_1" name="energi[]" readonly></td>
                                    <!-- <td><input type="text" data-field-name="energy" class="form-control autocomplete_txt" id="h_energi_1" name="energi[]" readonly></td> -->
                                    <td><input type="text" data-field-name="fats" class="form-control autocomplete_txt" id="lemak_1" name="lemak[]" readonly></td>
                                    <td><input type="text" data-field-name="protein" class="form-control autocomplete_txt" id="protein_1" name="protein[]" readonly></td>
                                    <td><input type="text" data-field-name="carbhdrt" class="form-control autocomplete_txt" id="karbohidrat_1" name="karbohidrat[]" readonly></td>
                                    <td><input type="text" data-field-name="f_edible" class="form-control autocomplete_txt" id="f_edible_1" name="f_edible[]" readonly></td>
                                    <td class="delete_row text-center" id="delete_1"><a id="hapusbaris" class="text-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="right">
                            <button type="button" id="add" name="add" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Cek Gizi</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->