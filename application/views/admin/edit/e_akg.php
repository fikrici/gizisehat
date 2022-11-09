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
            <form method="POST" action="<?= base_url('admin/edit_akg'); ?>">
                <div class="form-group" hidden>
                    <label for="id">ID Kelompok</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $e_akg['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="id_kelompok">ID Kelompok</label>
                    <input type="text" class="form-control" id="id_kelompok" name="id_kelompok" value="<?= $e_akg['id_kelompok'] ?>">
                </div>
                <div class="form-group">
                    <label for="kelompok">Kelompok</label>
                    <input type="text" class="form-control" id="kelompok" name="kelompok" value="<?= $e_akg['kelompok'] ?>">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" value="<?= $e_akg['umur'] ?>">
                </div>
                <div class="form-group">
                    <label for="tb">Tingi Badan</label>
                    <input type="number" class="form-control" id="tb" name="tb" value="<?= $e_akg['tb'] ?>">
                </div>
                <div class="form-group">
                    <label for="bb">Berat Badan</label>
                    <input type="number" class="form-control" id="bb" name="bb" value="<?= $e_akg['bb'] ?>">
                </div>
                <div class="form-group">
                    <label for="energi">Energi</label>
                    <input type="text" class="form-control" id="energi" name="energi" value="<?= $e_akg['energi'] ?>">
                </div>
                <div class="form-group">
                    <label for="protein">Protein</label>
                    <input type="text" class="form-control" id="protein" name="protein" value="<?= $e_akg['protein'] ?>">
                </div>
                <div class="form-group">
                    <label for="lemak">Lemak</label>
                    <input type="text" class="form-control" id="lemak" name="lemak" value="<?= $e_akg['lemak'] ?>">
                </div>
                <div class="form-group">
                    <label for="karbohidrat">Karbohidrat</label>
                    <input type="text" class="form-control" id="karbohidrat" name="karbohidrat" value="<?= $e_akg['karbohidrat'] ?>">
                </div>
                <div class="form-group">
                    <label for="serat">Serat</label>
                    <input type="text" class="form-control" id="serat" name="serat" value="<?= $e_akg['serat'] ?>">
                </div>
                <div class="form-group">
                    <label for="air">Air</label>
                    <input type="text" class="form-control" id="air" name="air" value="<?= $e_akg['air'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->