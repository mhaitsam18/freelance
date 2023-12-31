<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Perusahaan</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('Auth/daftar_perusahaan') ?>">
                            <!-- <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" placeholder="Masukkan Username" name="username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="Namaperusahaan" placeholder="Masukkan Nama Perusahaan" name="nama_perusahan" value="<?= set_value('nama_perusahan'); ?>">
                                <?= form_error('nama_perusahan', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="EmailPerusahaan" placeholder="Masukkan Email Perusahaan" name="email_perusahaan" value="<?= set_value('email_perusahaan'); ?>">
                                <?= form_error('email_perusahaan', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="Password1" placeholder="Masukkan Password" name="password1">
                                    <?= form_error('password1', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="Password2" placeholder="Masukkan Ulang Password" name="password2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                DAFTAR
                            </button>
                            <hr>
                            <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth/daftar_freelance'); ?>">Daftar Freelance</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth'); ?>">Sudah Punya Akun? Silahkan Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>