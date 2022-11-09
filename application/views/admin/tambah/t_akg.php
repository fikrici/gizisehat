<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Gizi</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_akg'); ?>">Data AKG</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/tambah_akg'); ?>">
                <div class="form-group">
                    <label for="id_kelompok">ID Kelompok</label>
                    <input type="text" class="form-control" id="id_kelompok" name="id_kelompok" placeholder="Masukan kelompok " autocomplete="off">
                    <?= form_error('id_kelompok', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kelompok">Kelompok</label>
                    <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Masukan kelompok " autocomplete="off">
                    <?= form_error('kelompok', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukan Umur" autocomplete="off">
                    <?= form_error('umur', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tb">Tingi Badan</label>
                    <input type="number" class="form-control" id="tb" name="tb" placeholder="Masukan Tinggi Badan">
                    <?= form_error('tb', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="bb">Berat Badan</label>
                    <input type="number" class="form-control" id="bb" name="bb" placeholder="Masukan Tinggi Badan">
                    <?= form_error('bb', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="energi">Energi</label>
                    <input type="text" class="form-control" id="energi" name="energi" placeholder="Masukan Energi">
                    <?= form_error('energi', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="protein">Protein</label>
                    <input type="text" class="form-control" id="protein" name="protein" placeholder="Masukan Protein">
                    <?= form_error('protein', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="lemak">Lemak</label>
                    <input type="text" class="form-control" id="lemak" name="lemak" placeholder="Masukan Lemak">
                    <?= form_error('lemak', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="karbohidrat">Karbohidrat</label>
                    <input type="text" class="form-control" id="karbohidrat" name="karbohidrat" placeholder="Masukan Karbohidrat">
                    <?= form_error('karbohidrat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="serat">Serat</label>
                    <input type="text" class="form-control" id="serat" name="serat" placeholder="Masukan Serat">
                    <?= form_error('serat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="air">Air</label>
                    <input type="text" class="form-control" id="air" name="air" placeholder="Masukan Air">
                    <?= form_error('air', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->