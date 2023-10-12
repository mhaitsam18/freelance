<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>
                                <?= $this->session->flashdata('message') ?>
                                <form class="user" method="POST" action="<?= base_url('Auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" placeholder="Masukkan Email Anda" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class= "text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password Anda" name="password" ">
                                        <?= form_error('password', '<small class= "text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class=" form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/home') ?>">Halaman Depan</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/daftar_freelance') ?>">Buat Akun Freelance</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/daftar_perusahaan') ?>">Buat Akun Perusahaan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>