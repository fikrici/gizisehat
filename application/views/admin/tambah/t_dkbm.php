<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Gizi</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_dkbm'); ?>">Data DKBM</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $title; ?></h5>
            <br>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/tambah_dkbm'); ?>">
                <div class="form-group">
                    <label for="foodgroup">Grup Makanan</label>
                    <input type="text" class="form-control" id="foodgroup" name="foodgroup" placeholder="Masukan Nama Lengkap" autocomplete="off">
                    <?= form_error('foodgroup', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="foodname">Nama Makanan</label>
                    <input type="text" class="form-control" id="foodname" name="foodname" placeholder="Masukan Nama Lengkap" autocomplete="off">
                    <?= form_error('foodname', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="energy">Energi</label>
                    <input type="text" class="form-control" id="energy" name="energy" placeholder="Masukan Energi (gr)">
                </div>
                <div class="form-group">
                    <label for="protein">Protein</label>
                    <input type="text" class="form-control" id="protein" name="protein" placeholder="Masukan Protein (gr)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="fats">Lemak</label>
                    <input type="text" class="form-control" id="fats" name="fats" placeholder="Masukan Lemak (gr)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="carbhdrt">Karbohidrat</label>
                    <input type="text" class="form-control" id="carbhdrt" name="carbhdrt" placeholder="Masukan Karbohidrat (gr)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="f_edible">Makanan Dapat Dimakan</label>
                    <input type="text" class="form-control" id="f_edible" name="f_edible" placeholder="Masukan BDD (gr)" autocomplete="off">
                    <?= form_error('f_edible', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->