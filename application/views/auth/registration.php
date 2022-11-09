<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat Lengkap" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tanggallahir" name="tanggallahir" placeholder="Masukan Tanggal Lahir" value="<?= set_value('tanggallahir'); ?>">
                                <?= form_error('tanggallahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="jeniskelamin1" name="jeniskelamin" class="custom-control-input" value="laki-laki">
                                <label class="custom-control-label" for="jeniskelamin1">Laki-Laki</label>
                            </div>
                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="jeniskelamin2" name="jeniskelamin" class="custom-control-input" value="perempuan">
                                <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
                                <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="tinggibadan" name="tinggibadan" placeholder="Tinggi Badan" value="<?= set_value('tinggibadan'); ?>">
                                    <?= form_error('tinggibadan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="beratbadan" name="beratbadan" placeholder="Berat Badan" value="<?= set_value('beratbadan'); ?>">
                                    <?= form_error('beratbadan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Kata sandi">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Ulang kata sandi">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>
                        </form>
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="#">Lupa Password?</a>
                        </div> -->
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>">Sudah Punya akun? Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>