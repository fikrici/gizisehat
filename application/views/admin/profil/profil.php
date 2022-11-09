<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb col-sm-4">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profilku</li>
        </ol>
    </nav>
    <div class="col-4"><?= $this->session->flashdata('info'); ?></div>
    <div class="card" style="width: 21rem;">
        <br>
        <?php
        if ($user['jeniskelamin'] == 'laki-laki') {
            // echo '<img src="assets/img/man.png" class="card-img">';
            echo '<img src="' . base_url('assets/img/man.png') . '" class="card-img-top" alt="Card image cap"/>';
        } else {
            echo '<img src="' . base_url('assets/img/person.png') . '" class="card-img-top" alt="Card image cap"/>';
        }
        ?>
        <div class="card-body">
            <h5 class="card-title"><?= $user['nama']; ?></h5>
            <h6 class="card-text"><?= $user['alamat']; ?></h6>
            <h6 class="card-text"><?= $user['jeniskelamin']; ?></h6>
            <h6 class="card-text"><?= $user['tanggallahir']; ?></h6>
            <h6 class="card-text"><?= $user['email']; ?></h6>
            <a href="<?= base_url('admin/edit') ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->