<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Lowongan"></div>
    <?= $this->session->flashdata('message') ?>
    <div class="row mt-3">
    
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3><strong><?= $lowongan['judul'] ?></strong></h3>
                </div>
                <div class="card-body col-md">
                    <h5 class="card-title"><?= $lowongan['judul'] ?> | <?= $lowongan['kota'] ?> | <?= $lowongan['max_calon_pegawai'] ?></h5>
                    <p class="card-text">
                        <span class="badge bg-info mr-2"> Tanggal dibuat : <?= cari_tanggal($lowongan['tgl_buat']); ?><span class="badge bg-warning ml-4"> Tanggal berakhir : <?= cari_tanggal($lowongan['batas_tgl']); ?></span></span>
                    </p>
                    <p class="card-text">
                    <h4><strong>Deskripsi</strong></h4>
                    </p>
                    <p class="card-text"><?= $lowongan['deskripsi'] ?></p>

                    <p class="card-text">
                    <h4><strong>Persyaratan</strong></h4>
                    </p>
                    <p class="card-text"><?= $lowongan['persyaratan'] ?></p>
                    <h4><strong>Gaji</strong></h4>
                    <p class="card-text">
                        <?= 'Rp.'.number_format($lowongan['gaji_minimal'], 2, ',', '.'). ' - Rp.'.number_format($lowongan['gaji_maksimal'], 2, ',', '.') ?>
                    </p>
                    <?php if ($permintaan_lowongan->num_rows() != 0) : ?>
                        <?php if ($permintaan_lowongan->row()->status == "Jalur undangan"): ?>
                            <span class="btn btn-secondary btn-block">Cancel</span>
                        <?php else: ?>
                            <a href="<?= base_url('Freelance/hapusPermintaanLowongan/' . $permintaan_lowongan->row()->id_permintaan) ?>" class="btn btn-danger btn-block">Cancel</a>
                        <?php endif ?>
                    <?php else : ?>
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#CVModal"><b>Lamar</b></button>
                        <!-- <a href="<?= base_url('Freelance/melamar/' . $lowongan['id_lowongan']) ?>" class="badge badge-success float-right">Lamar</a> -->
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4><i class="fas fa-comments"></i> Komentar</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/img/profil/'.$user['image']) ?>" class="img-thumbnail">
                        </div>
                        <div class="col-md-10">
                            <h5 class="card-title mb-0 mt-0"><a href=""><?= $user['username'] ?></a></h5>
                            <form action="<?= base_url('Freelance/kirimKomentar/') ?>" method="post">
                                <input type="hidden" name="id_lowongan" id="id_lowongan" value="<?= $lowongan['id_lowongan'] ?>">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $user['id'] ?>">
                                <div class="form-group">
                                    <textarea class="form-control" name="komentar" id="komentar" placeholder="Tulis Komentar"><?= set_value('komentar') ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($komentar_lowongan as $kl): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= base_url('assets/img/profil/'.$kl->image) ?>" class="img-thumbnail" style="width: 60px; height: 60px;">
                            </div>
                            <div class="col-md-10">
                                <h5 class="card-title mb-0 mt-0"><a href=""><?= $kl->username ?></a></h5>
                                <p class="card-text mb-0"><?= $kl->komentar ?></p>
                                <small class="mt-0">dipost : <?= date('d/m/Y H:i:s', strtotime($kl->waktu_post)) ?></small>
                                <br>
                                <?php if ($kl->id_user == $user['id']): ?>
                                    <small class="mt-0"><a href="<?= base_url('Freelance/hapusKomentar/'.$kl->id_komentar) ?>">hapus</a></small>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        
        </div>
    </div>
</div>
<div class="modal fade" id="CVModal" tabindex="-1" aria-labelledby="CVModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CVModalLabel">Data Diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form method="post" action="<?= base_url('Freelance/profil') ?>" enctype="multipart/form-data"> -->
                <input type="hidden" name="id_cv" id="id_cv" value="<?= $cv['id_cv'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <?php 
                        $kode  = "P-";
                        $query     = "SELECT MAX(TRIM(REPLACE(no_registrasi,'P-', ''))) as no_regis
                                 FROM permintaan_lowongan WHERE no_registrasi LIKE '$kode%'";
                        $baris = $this->db->query($query);
                        $akhir = $baris->row()->no_regis;
                        $akhir++;
                        $id    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
                        $id    = "P-".$id;
                         ?>
                        <label for="no_registrasi">No. Registrasi Lowongan</label>
                        <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" value="<?= $id ?>" readonly>
                    </div>
                    <!-- <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $cv['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $cv['tempat_lahir'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $cv['tgl_lahir'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $cv['jenis_kelamin'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tinggi">Tinggi Badan</label>
                        <input type="number" class="form-control" name="tinggi" id="tinggi" value="<?= $cv['tinggi'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Badan</label>
                        <input type="number" class="form-control" name="berat" id="berat" value="<?= $cv['berat'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $cv['no_telp'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota" value="<?= $cv['kota'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $cv['provinsi'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" id="alamat" readonly><?= $cv['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-control" style="border: none;">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input readonly type="radio" name="status" id="kawin" class="custom-control-input" value="Kawin" <?php if ($cv['status'] == "Kawin") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="kawin">Kawin</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input readonly type="radio disable" name="status" id="belum_kawin" class="custom-control-input" value="Belum Kawin" <?php if ($cv['status'] == "Belum Kawin") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="belum_kawin">Belum Kawin</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keahlian">Keahlian</label>
                        <input readonly type="text" class="form-control" name="keahlian" id="keahlian" value="<?= $cv['keahlian'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="sd">SD</label>
                        <input readonly type="text" class="form-control" name="sd" id="sd" value="<?= $cv['sd'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="smp">SMP</label>
                        <input readonly type="text" class="form-control" name="smp" id="smp" value="<?= $cv['smp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="sma">SMA</label>
                        <input readonly type="text" class="form-control" name="sma" id="sma" value="<?= $cv['sma'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="universitas">Universitas</label>
                        <input readonly type="text" class="form-control" name="universitas" id="universitas" value="<?= $cv['universitas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input readonly type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $cv['jurusan'] ?>">
                    </div> -->
                    <div class="form-group">
                        <label for="surat_lamaran">Surat Lamaran</label>
                        <!-- <input readonly type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $cv['jurusan'] ?>">
                     -->
                        <a href="<?= base_url('Freelance/print_surat_lamar/') . $cv['id_cv'] ?>" target="_blank">
                            <p><i class="fas fa-print"></i> Cetak</p>
                        </a>
                    </div>
                    <img src="<?= base_url('assets/img/profil/') . $porlowongan['surat_lamar']; ?>" alt="User profile picture" style="width: 440px;">
                    <!-- <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input readonly type="file" class="form-control" name="image" id="image">
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <?php if ($permintaan_lowongan->num_rows() != 0) : ?>
                        <?php if ($permintaan_lowongan->row()->status == "Jalur undangan"): ?>
                            <span class="btn btn-secondary float-right">Cancel</span>
                        <?php else: ?>
                            <a href="<?= base_url('Freelance/hapusPermintaanLowongan/' . $permintaan_lowongan->row()->id_permintaan) ?>" class="btn btn-danger float-right">Cancel</a>
                            
                        <?php endif ?>
                    <?php else : ?>
                        <a href="<?= base_url('Freelance/melamar/' . $lowongan['id_lowongan']) ?>" class="btn btn-success float-right">Lamar</a>
                    <?php endif ?>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<script type="text/javascript">
    var css = '@page { size: potrait; }',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    // window.print();
</script>