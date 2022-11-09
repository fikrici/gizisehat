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
            <li class="breadcrumb-item active" aria-current="page">Cek Gizi</li>
        </ol>
    </nav>
    <?= $this->session->flashdata('info'); ?>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- <form>
                <div class="form-group row">
                    <label for="tb" class="col-sm-2 col-form-label">Tinggi Badan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tb" name="tb" placeholder="Opsional Tinggi Badan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bb" class="col-sm-2 col-form-label">Berat Badan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="bb" name="bb" placeholder="Opsional Berat Badan">
                    </div>
                </div>
            </form>
            <br>
            <br> -->
            <form method="POST" action="<?= base_url('user/inputgizi'); ?>">
                <div class="form-group">
                    <div class="table-responsive">
                        <table id="cekgizi" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Makanan<small style="color:red">*</small></th>
                                    <th>Qty<small style="color:red">*</small></th>
                                    <th>Berat (gr)<small style="color:red">*</small></th>
                                    <th>Energi</th>
                                    <th>Protein</th>
                                    <th>Lemak</th>
                                    <th>Karbohidrat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php
                                // tanggal lahir
                                $umr = $user['tanggallahir'];
                                $tanggal = strtotime($umr);
                                $sekarang = strtotime(date('y-m-d'));
                                $diff = $sekarang - $tanggal;
                                // tanggal hari ini
                                // tahun
                                $bulan = floor($diff / (60 * 60 * 24 * 30));
                                $tahun = floor($diff / (60 * 60 * 24 * 365));

                                ?>

                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <th colspan="4">Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot> -->
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