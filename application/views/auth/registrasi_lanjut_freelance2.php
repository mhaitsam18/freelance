<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Data pribadi Pendidikan</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('Auth/daftar_lanjut_freelance2') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="sd" placeholder="Masukkan Nama Sekolah SD" name="sd" value="<?= set_value('sd'); ?>">
                                <?= form_error('sd', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="smp" placeholder="Masukkan Nama Sekolah SMP / MTs" name="smp" value="<?= set_value('smp'); ?>">
                                <?= form_error('smp', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="sma" placeholder="Masukkan Nama Sekolah SMA / SMK / MA " name="sma" value="<?= set_value('sma'); ?>">
                                <?= form_error('sma', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="universitas" placeholder="Masukkan Nama Universitas " name="universitas" value="<?= set_value('universitas'); ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jurusan" placeholder="Masukkan Nama Jurusan " name="jurusan" value="<?= set_value('jurusan'); ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jurusan" placeholder="Masukkan Gelar " name="jurusan" value="<?= set_value('gelar'); ?>">

                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                DAFTAR
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>