<form action="<?php echo base_url().'/Perusahaan/Input_lowongan' ?>" method="post">
    
<div class="container-fluid">
    <div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
    <div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><b>Buat Lowongan Pekerjaan Baru</b></h1>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Lowongan"></div>
    <?= $this->session->flashdata('message') ?>
        <!-- Earnings (Monthly) Card Example -->
            <div class="card border-left-primary shadow h-100 py-2" style="color: black">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul">
                    </div>

                    <div class="form-group">
                        <label for="max_calon_pegawai">Max Pegawai</label>
                        <input type="text" class="form-control" name="max_calon_pegawai" id="max_calon_pegawai">
                    </div>

                    <!-- <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <select class="form-control" name="lokasi" id="lokasi">
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Lampung">Lampung</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Banten">Banten</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="DI Yogyakarta">DI Yogyakarta</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <label for="persyaratan">Persyaratan</label>
                        <textarea class="form-control" name="persyaratan" id="persyaratan"></textarea>
                    </div> -->
                    <div class="form-group">
                        <label for="gaji_minimal">Gaji Minimal</label>
                        <input type="number" class="form-control" name="gaji_minimal" id="gaji_minimal">
                    </div>
                    <div class="form-group">
                        <label for="gaji_maksimal">Gaji Maksimal</label>
                        <input type="number" class="form-control" name="gaji_maksimal" id="gaji_maksimal">
                    </div>
                    <div class="form-group">
                        <label for="bts">Batas Tanggal</label>
                        <input type="date" class="form-control" name="batas_tgl" id="batas_tgl">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="bts">Keahlian</label>
                        <div class="">
                        <?php foreach ($keahlian as $k): ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="keahlian_<?= $k->id_keahlian ?>" value="<?= $k->id_keahlian ?>" name="keahlian[]">
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
                                <option value="<?= $jp->id_jenis_pekerjaan ?>"><?= $jp->jenis_pekerjaan ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pendidikan">Minimal Pendidikan</label>
                        <select class="form-control" name="id_pendidikan" id="id_pendidikan">
                            <option value="" selected disabled>Pilih Pendidikan</option>
                            <?php foreach ($pendidikan as $p): ?>
                                <option value="<?= $p->id_pendidikan ?>"><?= $p->pendidikan ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="id_pengalaman">Minimal Pengalmaan</label>
                        <select class="form-control" name="id_pengalaman" id="id_pengalaman">
                            <option value="" selected disabled>Pilih Pengalaman</option>
                            <?php foreach ($pengalaman as $pe): ?>
                                <option value="<?= $pe->id_pengalaman ?>"><?= $pe->pengalaman ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="id_provinsi">Provinsi</label>
                        <select class="form-control" name="id_provinsi" id="id_provinsi">
                            <option value="" selected disabled>Pilih Provinsi</option>
                            <?php foreach ($provinsi as $pr): ?>
                                <option value="<?= $pr->id_provinsi ?>"><?= $pr->provinsi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
            
                    <div class="form-group" id="ctn">
                        <label for="id_kota">Kota</label>
                        <select class="form-control" name="id_kota" id="id_kota">
                            <option value="" selected disabled>Pilih Kota</option>
                            <!-- <?php foreach ($kota as $k): ?>
                                <option value="<?= $k->id_kota ?>"><?= $k->kota ?></option>
                            <?php endforeach ?> -->
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Buat Lowongan</button>
                </div>
            </div>
        </div>
</div>

</form>
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