<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Data pribadi</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('Auth/daftar_lanjut_freelance') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                <?= form_error('nama_lengkap', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="example" class="form-label ">Tempat</label>
                                    <input type="text" class="form-control form-control-user" id="Password1" placeholder="Kota" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>">
                                    <?= form_error('tempat_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-3">
                                    <label for="example" class="form-label">Tanggal</label>
                                    <input type="number" class="form-control form-control-user" id="tgl_lahir" placeholder="1" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>"><?= form_error('tgl_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-3">
                                    <label for="example" class="form-label ">Bulan</label>
                                    <input type="text" class="form-control form-control-user" id="tgl_lahir" placeholder="bulan" name="bln_lahir" value="<?= set_value('bln_lahir') ?> "><?= form_error('bln_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-3">
                                    <label for="example" class="form-label ">Tahun</label>
                                    <input type="text" class="form-control form-control-user" id="tgl_lahir" placeholder="tahun" name="thn_lahir" value="<?= set_value('thn_lahir') ?>"><?= form_error('thn_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="agama" placeholder="Masukkan Agama" name="agama" value="<?= set_value('agama'); ?>">
                                    <?= form_error('agama', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="jeniskelamin" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>"> <?= form_error('jenis_kelamin', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="status" placeholder="Masukkan Status" name="status" value="<?= set_value('status'); ?>">
                                    <?= form_error('status', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="gol_darah" placeholder="Masukkan Golongan Darah" name="gol_darah" value="<?= set_value('gol_darah') ?>"><?= form_error('gol_darah', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="tinggi" placeholder="Masukkan Tinggi Badan" name="tinggi" value="<?= set_value('tinggi'); ?>">
                                    <?= form_error('tinggi', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="berat" placeholder="Masukkan Berat Badan" name="berat" value="<?= set_value('berat') ?>"><?= form_error('berat', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="no_hp" placeholder="Masukkan Nomor Handphone" name="no_hp" value="<?= set_value('no_hp'); ?>">
                                <?= form_error('no_hp', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="kota" placeholder="Masukkan Kota / Kabupaten" name="kota" value="<?= set_value('kota'); ?>">
                                <?= form_error('kota', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="provinsi" placeholder="Masukkan Provinsi" name="provinsi" value="<?= set_value('provinsi'); ?>">
                                <?= form_error('provinsi', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukkan alamat" id="floatingTextarea2" name="alamat" style="height: 100px" value="<?= set_value('alamat'); ?>"></textarea><?= form_error('alamat', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <hr>
                            <button type=" submit" class="btn btn-primary btn-user btn-block">
                                SUBMIT
                            </button>
                            <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                        <!-- <hr> -->
                        <!-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth/daftar_perusahaan'); ?>">Buat Akun Perusahaan</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth'); ?>">Sudah Punya Akun? Silahkan Masuk!</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>