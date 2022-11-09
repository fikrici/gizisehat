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
            <li class="breadcrumb-item"><a href="<?= base_url('user/profil'); ?>">Profilku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
        </ol>
    </nav>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="card-header text-center font-weight-bold text-uppercase"><?= $title; ?></h5>
            <br>
        </div>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('admin/edit'); ?>">
                            <div class="form-group row" hidden>
                                <label for="id" class="col-sm-3 col-form-label">id<small style="color:red">*</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama<small style="color:red">*</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat<small style="color:red">*</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jeniskelamin" class="col-sm-3 col-form-label">Jenis kelamin</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $user['jeniskelamin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggallahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="<?= $user['tanggallahir']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tb" class="col-sm-3 col-form-label">Tinggi Badan<small style="color:red">*</small></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="tb" name="tb" value="<?= $user['tb']; ?>">
                                    <?= form_error('tb', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="beratbadan" class="col-sm-3 col-form-label">Berat Badan<small style="color:red">*</small></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="beratbadan" name="bb" value="<?= $user['bb']; ?>">
                                    <?= form_error('beratbadan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> edit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->