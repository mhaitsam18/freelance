<div class="container-fluid">
    <div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
    <div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><b>Edit Lowongan</b></h1>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Lowongan"></div>
    <?= $this->session->flashdata('message') ?>
        <!-- Earnings (Monthly) Card Example -->
            <div class="card border-left-primary shadow h-100 py-2" style="color: black">
                <div class="card-body">
                    <form action="<?php echo base_url().'/Perusahaan/Edit_lowongan_eksekusi/' ?>" method="post">
                        <input type="hidden" name="id_lowongan" id="id_lowongan" value="<?= $lowongan->id_lowongan ?>">
                        <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $lowongan->id_kategori ?>">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= $lowongan->judul ?>" id="judul">
                        </div>

                        <div class="form-group">
                            <label for="max_calon_pegawai">Max Pegawai</label>
                            <input type="text" class="form-control" name="max_calon_pegawai" value="<?= $lowongan->max_calon_pegawai ?>" id="max_calon_pegawai">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Pekerjaan</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi"><?= $lowongan->deskripsi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="persyaratan">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" id="persyaratan"><?= $lowongan->persyaratan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gaji_minimal">Gaji Minimal</label>
                            <input type="number" class="form-control" name="gaji_minimal" id="gaji_minimal" value="<?= $lowongan->gaji_minimal ?>">
                        </div>
                        <div class="form-group">
                            <label for="gaji_maksimal">Gaji Maksimal</label>
                            <input type="number" class="form-control" name="gaji_maksimal" id="gaji_maksimal" value="<?= $lowongan->gaji_maksimal ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="bts">Batas Tanggal</label>
                            <input type="date" class="form-control" name="batas_tgl" value="<?= $lowongan->batas_tgl ?>" id="batas_tgl">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="bts">Keahlian</label>
                            <div class="">
                            <?php foreach ($keahlian as $k): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="keahlian_<?= $k->id_keahlian ?>" value="<?= $k->id_keahlian ?>" name="keahlian[]" <?= cek_keahlian($k->id_keahlian, $lowongan->id_kategori) ?>>
                                    <label class="form-check-label" for="keahlian_<?= $k->id_keahlian ?>"><?= $k->keahlian ?></label>
                                </div>
                            <?php endforeach ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_pekerjaan">Jenis Pekerjaan</label>
                            <select class="form-control" name="id_jenis_pekerjaan" id="id_jenis_pekerjaan">
                                <option value="" selected disabled>Pilih Jenis Pekerjaan</option>
                                <?php foreach ($jenis_pekerjaan as $jp): ?>
                                    <option value="<?= $jp->id_jenis_pekerjaan ?>" <?php if ($jp->id_jenis_pekerjaan == $lowongan->id_jenis_pekerjaan): echo 'selected'; endif ?>><?= $jp->jenis_pekerjaan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pendidikan">Minimal Pendidikan</label>
                            <select class="form-control" name="id_pendidikan" id="id_pendidikan">
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <?php foreach ($pendidikan as $p): ?>
                                    <?php if ($p->id_pendidikan == $lowongan->id_pendidikan): ?>
                                        <option value="<?= $p->id_pendidikan ?>" selected><?= $p->pendidikan ?></option>
                                    <?php else: ?>
                                        <option value="<?= $p->id_pendidikan ?>"><?= $p->pendidikan ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="id_pengalaman">Minimal Pengalmaan</label>
                            <select class="form-control" name="id_pengalaman" id="id_pengalaman">
                                <option value="" selected disabled>Pilih Pengalaman</option>
                                <?php foreach ($pengalaman as $pe): ?>
                                    <?php if ($pe->id_pengalaman == $lowongan->id_pengalaman): ?>
                                        <option value="<?= $pe->id_pengalaman ?>" selected><?= $pe->pengalaman ?></option>
                                    <?php else: ?>
                                        <option value="<?= $pe->id_pengalaman ?>"><?= $pe->pengalaman ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="id_provinsi">Provinsi</label>
                            <select class="form-control" name="id_provinsi" id="id_provinsi">
                                <option value="" selected disabled>Pilih Provinsi</option>
                                <?php foreach ($provinsi as $pr): ?>
                                    <?php if ($pr->id_provinsi == $lowongan->id_provinsi): ?>
                                        <option value="<?= $pr->id_provinsi ?>" selected><?= $pr->provinsi ?></option>
                                    <?php else: ?>
                                        <option value="<?= $pr->id_provinsi ?>"><?= $pr->provinsi ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                
                        <div class="form-group" id="ctn">
                            <label for="id_kota">Kota</label>
                            <select class="form-control" name="id_kota" id="id_kota">
                                <option value="" selected disabled>Pilih Kota</option>
                                <?php $kota = $this->db->get_where('kota', ['id_provinsi' => $lowongan->id_provinsi])->result() ?>
                                <?php foreach ($kota as $k): ?>
                                    <?php if ($k->id_kota == $lowongan->id_kota): ?>
                                        <option value="<?= $k->id_kota ?>" selected><?= $k->kota ?></option>
                                    <?php else: ?>
                                        <option value="<?= $k->id_kota ?>"><?= $k->kota ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
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

        xhr.open('GET', '<?= base_url('Perusahaan/cariKota/') ?>' + keyword.value, true);
        xhr.send();


    })
</script>