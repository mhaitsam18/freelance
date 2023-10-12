<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Freelance</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('Auth/daftar_freelance') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control " id="username" placeholder="Masukkan Username" name="username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control " id="Nama_freelance" placeholder="Masukkan Nama" name="nama_freelance" value="<?= set_value('nama_freelance'); ?>">
                                <?= form_error('nama_freelance', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <!-- <div class="controls">
                                <input type="text" id="txtTglPengiriman" class="datepicker" name="txtTglPengiriman" placeholder="YYYY-MM-DD">
                            </div> -->
                            <div class="form-group">
                                <input type="email" class="form-control " id="EmailFreelance" placeholder="Masukkan Email" name="email_freelance" value="<?= set_value('email_freelance'); ?>">
                                <?= form_error('email_freelance', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control " id="Password1" placeholder="Masukkan Password" name="password1" value="<?= set_value('password1'); ?>">
                                    <?= form_error('password1', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control " id="Password2" placeholder="Masukkan Ulang Password" name="password2">
                                    <?= form_error('password2', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>">
                                    <?= form_error('tempat_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control " id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>">
                                    <?= form_error('tgl_lahir', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-control " style="border: none;">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jenis_kelamin" id="laki_laki" class="custom-control-input" value="Laki-laki" <?php if (set_value('jenis_kelamin')== 'Laki-laki'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="laki_laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jenis_kelamin" id="perempuan" class="custom-control-input" value="Perempuan" <?php if (set_value('jenis_kelamin')== 'Perempuan'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                                    </div>
                                    <?= form_error('jenis_kelamin', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!-- <input type="radio" class="form-control  "  value="<?= $cv['jenis_kelamin'] ?>"> -->
                            </div>
                            <div class="form-group">
                                <label for="id_agama">Agama</label>
                                <select class="form-control " name="id_agama" id="id_agama">
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <?php foreach ($agama as $a): ?>
                                        <?php if ($a->id_agama == set_value('id_agama')): ?>
                                            <option value="<?= $a->id_agama ?>" selected><?= $a->agama ?></option>
                                        <?php else: ?>
                                            <option value="<?= $a->id_agama ?>"><?= $a->agama ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('id_agama', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="gol_darah">Golongan Darah</label>
                                <div class="form-control" style="border: none;">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gol_darah" id="gol_a" class="custom-control-input" value="A" <?php if (set_value('gol_darah')== 'A'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="gol_a">A</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gol_darah" id="gol_b" class="custom-control-input" value="B" <?php if (set_value('gol_darah')== 'B'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="gol_b">B</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gol_darah" id="gol_ab" class="custom-control-input" value="AB" <?php if (set_value('gol_darah')== 'AB'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="gol_ab">AB</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="gol_darah" id="gol_o" class="custom-control-input" value="O" <?php if (set_value('gol_darah')== 'O'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="gol_o">O</label>
                                    </div>
                                </div>
                                <?= form_error('gol_darah', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-control " style="border: none;">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="status" id="kawin" class="custom-control-input" value="Kawin" <?php if (set_value('status')== 'Kawin'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="kawin">Kawin</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="status" id="belum_kawin" class="custom-control-input" value="Belum Kawin" <?php if (set_value('status') == 'Belum Kawin'): ?> checked <?php endif ?>>
                                        <label class="custom-control-label" for="belum_kawin">Belum Kawin</label>
                                    </div>
                                    <?= form_error('status', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control " id="tinggi" placeholder="Masukkan Tinggi Badan" name="tinggi" value="<?= set_value('tinggi') ?>">
                                    <?= form_error('tinggi', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control " id="berat" placeholder="Masukkan Berat Badan" name="berat" value="<?= set_value('berat') ?>">
                                    <?= form_error('berat', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <select class="form-control " id="id_provinsi" name="id_provinsi">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $prov): ?>
                                            <?php if ($prov->id_provinsi == set_value('id_provinsi')): ?>
                                                <option value="<?= $prov->id_provinsi ?>" selected><?= $prov->provinsi ?></option>
                                            <?php else: ?>
                                                <option value="<?= $prov->id_provinsi ?>"><?= $prov->provinsi ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('id_provinsi', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0" id="ctn">
                                    <select class="form-control " id="id_kota" name="id_kota">
                                        <option value="" selected disabled>Pilih Kota</option>
                                        <?php if (set_value('id_kota') != ''): ?>
                                            <?php $kota = $this->db->get_where('kota', ['id_kota' => set_value('id_kota')])->row(); ?>
                                            <option value="<?= set_value('id_kota') ?>" selected><?= $kota->kota ?></option>
                                        <?php endif ?>
                                    </select>
                                    <?= form_error('id_kota', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control " name="no_telp" id="no_telp" placeholder="Masukkan Nomor HP" value="" value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control " name="alamat" placeholder="Masukkan alamat anda" id="alamat"><?= set_value('alamat') ?></textarea>
                                <?= form_error('alamat', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control " name="keahlian" id="keahlian" placeholder="Masukkan keahlian" value="<?= set_value('keahlian') ?>">
                                <?= form_error('keahlian', '<small class= "text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="sd" placeholder="Masukkan SD" name="sd" value="<?= set_value('sd') ?>">
                                    <?= form_error('sd', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control " id="ijazah_sd" placeholder="Masukkan berkas ijazah SD" name="ijazah_sd" value="<?= set_value('ijazah_sd') ?>">
                                    <?= form_error('ijazah_sd', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="smp" placeholder="Masukkan SMP" name="smp" value="<?= set_value('smp') ?>">
                                    <?= form_error('smp', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control " id="ijazah_smp" placeholder="Masukkan berkas ijazah SMP" name="ijazah_smp" value="<?= set_value('ijazah_smp') ?>">
                                    <?= form_error('ijazah_smp', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="sma" placeholder="Masukkan SMA" name="sma" value="<?= set_value('sma') ?>">
                                    <?= form_error('sma', '<small class= "text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control " id="ijazah_sma" placeholder="Masukkan berkas ijazah SMA" name="ijazah_sma" value="<?= set_value('ijazah_sma') ?>">
                                    <?= form_error('ijazah_sma', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="universitas" placeholder="Masukkan Nama Universitas" name="universitas" value="<?= set_value('universitas') ?>">
                                    <?= form_error('universitas', '<small class= "text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control " id="jurusan" placeholder="Masukkan Nama Jurusan kuliah" name="jurusan" value="<?= set_value('jurusan') ?>">
                                    <?= form_error('jurusan', '<small class= "text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <select class="form-control " name="jenjang_pendidikan" id="jenjang_pendidikan" >
                                        <option value="" selected disabled>Pilih Jenjang Pendidikan</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="ijazah_universitas">ijazah Universitas</label>
                                    <input type="file" class="form-control  " id="ijazah_universitas" placeholder="Masukkan berkas ijazah Universitas" name="ijazah_universitas" value="<?= set_value('ijazah_universitas') ?>">
                                    <?= form_error('ijazah_universitas', '<small class= "text-danger pl-3">', '</small>'); ?>
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
                            <a class="small" href="<?= base_url('Auth/daftar_perusahaan'); ?>">Buat Akun Perusahaan</a>
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
<script type="text/javascript">
    // ambil elements yg di buutuhkan
    var keyword = document.getElementById('id_provinsi');

    var container = document.getElementById('ctn');
    // var btn = document.getElementById('button-addon2');

    // tambahkan event ketika keyword ditulis

    keyword.addEventListener('change', function () {


        //buat objek ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= base_url('Auth/cariKota/') ?>' + keyword.value, true);
        xhr.send();


    })
</script>