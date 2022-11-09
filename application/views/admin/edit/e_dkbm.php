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
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_dkbm'); ?>">Data DKBM</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/edit_dkbm'); ?>">
                <div class="form-group" hidden>
                    <label for="id">id</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $e_dkbm['id']; ?>">
                    <?= form_error('foodgroup', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="foodgroup">Grup Makanan</label>
                    <input type="text" class="form-control" id="foodgroup" name="foodgroup" value="<?= $e_dkbm['foodgroup']; ?>">
                    <?= form_error('foodgroup', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="foodname">Nama Makanan</label>
                    <input type="text" class="form-control" id="foodname" name="foodname" value="<?= $e_dkbm['foodname']; ?>">
                    <?= form_error('foodname', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="energy">Energi</label>
                    <input type="text" class="form-control" id="energy" name="energy" value="<?= $e_dkbm['energy']; ?>">
                </div>
                <div class="form-group">
                    <label for="protein">Protein</label>
                    <input type="text" class="form-control" id="protein" name="protein" value="<?= $e_dkbm['protein']; ?>">
                </div>
                <div class="form-group">
                    <label for="fats">Lemak</label>
                    <input type="text" class="form-control" id="fats" name="fats" value="<?= $e_dkbm['fats']; ?>">
                </div>
                <div class="form-group">
                    <label for="carbhdrt">Karbohidrat</label>
                    <input type="text" class="form-control" id="carbhdrt" name="carbhdrt" value="<?= $e_dkbm['carbhdrt']; ?>">
                </div>
                <div class="form-group">
                    <label for="f_edible">Makanan Bisa Dimakan</label>
                    <input type="text" class="form-control" id="f_edible" name="f_edible" value="<?= $e_dkbm['f_edible']; ?>">
                    <?= form_error('f_edible', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->