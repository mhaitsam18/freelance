<?php
//index.php
$minimum_range = 3000;
$maximum_range = 5000;
?>
<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<div class="content-header">
    <!-- <section class=""> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Cari Lowongan</h1>

            </div>
            <div class="col-sm-6 mb-2 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Freelance') ?>">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <div class="row">
        <div class="col-md-4">
            <form action="<?= base_url('Freelance/pencarian') ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian" name="keyword" autocomplete="off" autofocus>
                    <input class=" btn btn-outline-primary" type="submit" name="cari"></input>
                </div>
            </form>
        </div>
        <div class="col-md-8"></div>
    </div>

    <div class="row">
        <!-- <nav class="navbar navbar-light bg-light"> -->
        <div class="col-md-4">
            <div class="card shadow py-2" style="border-top-color: #1F8BFF; border-top-width: 4px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="sidebar-heading text-bold">Pilih Provinsi</div>
                    </div>
                    <div class="form-group gaji">
                        <label for="gaji">Gaji</label>
                        <input type="text" id="range" value="">
                    </div>
                    <div class="form-group provinsi">
                        <label for="id_provinsi">Provinsi</label>
                        <select class="form-control" name="id_provinsi" id="id_provinsi_filter" >
                            <option value="">Pilih Semua</option>
                            <?php foreach ($provinsi->result() as $pr): ?>
                                <?php if ($pr->id_provinsi == $id_provinsi): ?>
                                    <option  value="<?= $pr->id_provinsi ?>" selected><?= $pr->provinsi ?></option>
                                <?php else: ?>
                                    <option  value="<?= $pr->id_provinsi ?>"><?= $pr->provinsi ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group" id="kota">
                        <label for="id_kota">Kota</label>
                        <select class="form-control" name="id_kota" id="id_kota_filter">
                            <option value="">Pilih Semua</option>
                            <?php if ($kota): ?>
                                <?php foreach ($kota->result() as $k): ?>
                                    <?php if ($k->id_kota == $id_kota): ?>
                                        <option  value="<?= $k->id_kota ?>" selected><?= $k->kota ?></option>
                                    <?php else: ?>
                                        <option value="<?= $k->id_kota ?>"><?= $k->kota ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                        <div class="form-check kota_terdekat float-right">
                            <input class="form-check-input select-grid" type="checkbox" name="kota_terdekat" value=".kot_<?= $cv->id_kota ?>" id="kota_terdekat">
                            <label class="form-check-label" for="kota_terdekat">
                                Pilih Lowongan di Kotamu
                            </label>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="sidebar-heading text-bold">Pilih Pendidikan</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                            $setengah_pendidikan = $pendidikan->num_rows()/2;
                            $n = 1;
                            ?>
                            <?php foreach ($pendidikan->result() as $pend): ?>
                                <div class="form-check pendidikan">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_pendidikan" value=".ip_<?= $pend->id_pendidikan ?>" id="id_pendidikan<?= $pend->id_pendidikan  ?>">
                                    <label class="form-check-label" for="id_pendidikan<?= $pend->id_pendidikan  ?>">
                                        <?= $pend->pendidikan ?>
                                    </label>
                                </div>
                                <?php if ($n == $setengah_pendidikan || ($n+0.5) == $setengah_pendidikan): ?>
                                    </div>
                                    <div class="col-sm-6">
                                <?php endif ?>
                                <?php $n++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="sidebar-heading text-bold">Pilih Pengalaman</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                            $setengah_pengalaman = $pengalaman->num_rows()/2;
                            $n = 1;
                            ?>
                            <?php foreach ($pengalaman->result() as $peng): ?>
                                <div class="form-check pengalaman">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_pengalaman" value=".ipeng_<?= $peng->id_pengalaman ?>" id="id_pengalaman<?= $peng->id_pengalaman  ?>">
                                    <label class="form-check-label" for="id_pengalaman<?= $peng->id_pengalaman  ?>">
                                        <?= $peng->pengalaman ?>
                                    </label>
                                </div>
                                <?php if ($n == $setengah_pengalaman || ($n+0.5) == $setengah_pengalaman): ?>
                                    </div>
                                    <div class="col-sm-6">
                                <?php endif ?>
                                <?php $n++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="sidebar-heading text-bold">Pilih Jenis Pekerjaan</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                            $setengah_jenis_pekerjaan = $jenis_pekerjaan->num_rows()/2;
                            $n = 1;
                            ?>
                            <?php foreach ($jenis_pekerjaan->result() as $jp): ?>
                                <div class="form-check jenis_pekerjaan">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_jenis_pekerjaan" value=".ijp_<?= $jp->id_jenis_pekerjaan ?>" id="id_jenis_pekerjaan_<?= $jp->id_jenis_pekerjaan  ?>">
                                    <label class="form-check-label" for="id_jenis_pekerjaan_<?= $jp->id_jenis_pekerjaan  ?>">
                                        <?= $jp->jenis_pekerjaan ?>
                                    </label>
                                </div>
                                <?php if ($n == $setengah_jenis_pekerjaan || ($n+0.5) == $setengah_jenis_pekerjaan): ?>
                                    </div>
                                    <div class="col-sm-6">
                                <?php endif ?>
                                <?php $n++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="sidebar-heading text-bold">Pilih Keahlian</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                            $setengah_keahlian = $keahlian->num_rows()/2;
                            $n = 1;
                            ?>
                            <?php foreach ($keahlian->result() as $k): ?>
                                <div class="form-check keahlian">
                                    <input class="form-check-input select-grid" type="checkbox" name="id_keahlian" value=".ik_<?= $k->id_keahlian ?>" id="id_keahlian<?= $k->id_keahlian  ?>">
                                    <label class="form-check-label" for="id_keahlian<?= $k->id_keahlian  ?>">
                                        <?= $k->keahlian ?>
                                    </label>
                                </div>
                                <?php if ($n == $setengah_keahlian || ($n+0.5) == $setengah_keahlian): ?>
                                    </div>
                                    <div class="col-sm-6">
                                <?php endif ?>
                                <?php $n++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- <div class="row"> -->
        <div class="col-md-8 gridd">
            <?php foreach ($lowongan as $low) :  ?>
                <?php $kategori_keahlian = $this->db->get_where('kategori_keahlian', ['id_kategori' => $low['id_kategori']])->result_array(); ?>
                <div class="card grid-item 
                    ijp_<?= $low['id_jenis_pekerjaan'] ?> 
                    ip_<?= $low['id_pendidikan'] ?> 
                    ipeng_<?= $low['id_pengalaman'] ?> 
                    kot_<?= $low['id_kota'] ?> 
                    <?php foreach ($kategori_keahlian as $key): ?>
                        ik_<?= $key['id_keahlian'] ?> 
                    <?php endforeach ?>
                    gaji_min_<?= $low['gaji_minimal'] ?> 
                    gaji_max_<?= $low['gaji_maksimal'] ?> 
                ">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $low['judul']; ?></strong></h5>
                        <p><span class="badge bg-info mr-2"> Tanggal dibuat : <?= cari_tanggal($low['tgl_buat']); ?> <span class="badge bg-warning ml-4"> Tanggal berakhir : <?= cari_tanggal($low['batas_tgl']); ?></p></span></p></span>
                        <p class="card-text"><?= $low['kota']; ?></p>
                        <p class="card-text"><?= $low['deskripsi']; ?></p>
                        <p class="card-text gaji_min" data-min="<?= $low['gaji_minimal'] ?>">Gaji Minimal : Rp. <?= number_format($low['gaji_minimal'],2,',','.') ?></p>
                        <p class="card-text gaji_max" data-max="<?= $low['gaji_maksimal'] ?>">Gaji Maksimal : Rp. <?= number_format($low['gaji_maksimal'],2,',','.') ?></p>
                        <a href="<?= base_url('Freelance/detail_lowongan/') . $low['id_lowongan'] ?>" class="badge badge-primary">Detail</a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<script>  
// $(document).ready(function(){

//     $('#price_range').slider({
//         range:true,
//         min:1000,
//         max:20000,
//         values:[<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>],
//         slide:function(event, ui){
//             $("#minimum_range").val(ui.values[0]);
//             $('#maximum_range').val(ui.values[1]);
//             load_product(ui.values[0], ui.values[1]);
//         }
//     });

//     load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>)  ;
    
//     function load_product(minimum_range, maximum_range)
//     {
//         $.ajax({
//             url:"fetch.php",
//             method:"POST",
//             data:{minimum_range:minimum_range, maximum_range:maximum_range},
//             success:function(data)
//             {
//                 $('#load_product').html(data);
//             }
//         });
//     }
    
    
// });  
</script>