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
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_user'); ?>">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </nav>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/edit_user'); ?>">
                <div class="form-group" hidden>
                    <label for="id">id</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $e_user['id']; ?> ">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $e_user['nama']; ?> <?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $e_user['alamat']; ?> <?= set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?= $e_user['tanggallahir']; ?><?= set_value('tanggallahir'); ?>">
                    <?= form_error('tanggallahir', '<small class="text-danger">', '</small>'); ?>
                </div>
                <?php if ($e_user['jeniskelamin'] == 'laki-laki') { ?>
                    <div class="form-group custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jeniskelamin1" name="jeniskelamin" class="custom-control-input" value="laki-laki" checked>
                        <label class="custom-control-label" for="jeniskelamin1">Laki-Laki</label>
                    </div>
                    <div class="form-group custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jeniskelamin2" name="jeniskelamin" class="custom-control-input" value="perempuan">
                        <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
                        <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                <?php } else { ?>
                    <div class="form-group custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jeniskelamin1" name="jeniskelamin" class="custom-control-input" value="laki-laki">
                        <label class="custom-control-label" for="jeniskelamin1">Laki-Laki</label>
                    </div>
                    <div class="form-group custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jeniskelamin2" name="jeniskelamin" class="custom-control-input" value="perempuan" checked>
                        <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
                        <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="tinggibadan">Tingi Badan</label>
                    <input type="number" class="form-control" id="tinggibadan" name="tinggibadan" value="<?= $e_user['tb']; ?><?= set_value('tb'); ?>">
                    <?= form_error('tinggibadan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="beratbadan">Berat Badan</label>
                    <input type="number" class="form-control" id="beratbadan" name="beratbadan" value="<?= $e_user['bb']; ?><?= set_value('bb'); ?>">
                    <?= form_error('beratbadan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $e_user['email']; ?><?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password<small style="color:red">*</small></label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password1">Ulangi Password<small style="color:red">*</small></label>
                    <input type="password" class="form-control" id="password1" name="password1">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->