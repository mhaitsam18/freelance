    <div class="content-header">
        <!-- <section class=""> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Riwayat Lamar</h1>

                </div>
                <div class="col-sm-6 mb-2 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Freelance') ?>  ">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <?= $this->session->flashdata('message'); ?>
        <div class="row">

            <!-- <nav class="navbar navbar-light bg-light"> -->
            <div class="container-fluid">
                <div class="col-6 mb-3 mt-4">
                    <form class="d-flex">
                        <input class="form-control me-2" type="date" aria-label="Search" id="tanggal">
                        <!-- <button class="btn btn-outline-info" type="submit">Search</button> -->
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg ">
                <div id="ctn">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Registrasi</th>
                                <th scope="col">Tanggal melamar</th>
                                <th scope="col">Nama Lowongan</th>
                                <th scope="col">Nama Perusahaan</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tracking</th>
                                <th scope="col">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($permintaan_lowongan as $pl) :  ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $pl['no_registrasi']; ?></td>
                                    <td><?= cari_tanggal($pl['waktu_melamar']); ?></td>
                                    <td><?= $pl['judul']; ?></td>
                                    <td><?= $pl['nama_perusahaan']; ?></td>
                                    <td><?= $pl['deskripsi']; ?></td>
                                    <td><a href="#" class="badge rounded-pill bg-indigo disabled"><?= $pl['status'] ?></a> </td>
                                    <td>
                                        <a href="" class="badge rounded-pill bg-info" data-toggle="modal" data-target="#detailModal<?= $pl['id_permintaan'] ?>">Detail</a>
                                        <a href="" class="badge badge-info" data-toggle="modal" data-target="#kirimPesanModal<?= $pl['idup'] ?>">Kirim Pesan</a>
                                        <!-- <a href="<?= base_url('Freelance/detail_tracking/' . $pl['id_permintaan']) ?>" class="badge rounded-pill bg-info">Detail</a> -->

                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Modal -->
    <?php foreach ($permintaan_lowongan as $pl) : ?>
        <div class="modal fade" id="detailModal<?= $pl['id_permintaan'] ?>" tabindex="-1" aria-labelledby="detailModalLabel<?= $pl['id_permintaan'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?= $pl['id_permintaan'] ?>">No. Registrasi: <?= $pl['no_registrasi']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title">Detail Perusahaan</h4>
                        <div class="row">
                            <div class="col-md-4">
                                Nama Perusahaan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['nama_perusahaan'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Email Perusahaan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['email_perusahaan'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Telepon
                            </div>
                            <div class="col-md-8">
                                <?= $pl['no_tlp'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Deskripsi Perusahaan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['deskripsi_perusahaan'] ?>
                            </div>
                        </div>
                        <h4>Detail Lowongan</h4>
                        <div class="row">
                            <div class="col-md-4">
                                Tingkat Lowongan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['judul'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Lokasi Lowongan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['kota'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Deskripsi Lowongan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['deskripsi'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Persyaratan
                            </div>
                            <div class="col-md-8">
                                <?= $pl['persyaratan'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Batas Tanggal
                            </div>
                            <div class="col-md-8">
                                <?= $pl['batas_tgl'] ?>
                            </div>
                        </div>

                        <h4>Tracking Status</h4>
                        <?php
                        $tracking = $this->db->get_where('tracking', ['id_permintaan_lowongan' => $pl['id_permintaan']])->result_array();
                        foreach ($tracking as $t) : ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><?= date('j F Y H:i:s', strtotime($t['waktu'])) ?>:</label>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text"><?= $t['status'] ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text"><?= $t['keterangan'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('Freelance/lihat_perusahaan/' . $pl['id_profil']) ?>" class="btn btn-primary">Lihat Perusahaan</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php foreach ($permintaan_lowongan as $per) : ?>
        <div class="modal fade" id="kirimPesanModal<?= $per['idup'] ?>" tabindex="-1" aria-labelledby="kirimPesanModalLabel<?= $per['idup'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kirimPesanModalLabel<?= $per['idup'] ?>">Kirim Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Freelance/kirimPesan') ?>" method="post">
                        <div class="modal-body">
                            <h5 class="modal-title">To: <?= $per['nama_perusahaan'] ?></h5>
                            <input type="hidden" name="id_user_to" id="id_user_to" value="<?= $per['idup'] ?>">
                            <div class="form-group">
                                <label for="message">Pesan</label>
                                <select class="form-control" name="pertanyaan" id="pertanyaan">
                                    <option value="" selected disabled>Pilih Pertanyaan</option>
                                    <?php foreach ($pertanyaan as $p): ?>
                                        <option value="<?= $p['pertanyaan'] ?>"><?= $p['pertanyaan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group" id="ctn2">
                                <textarea class="form-control" name="message" id="message"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <script type="text/javascript">
        // ambil elements yg di buutuhkan
        var keyword = document.getElementById('tanggal');
        var keyword2 = document.getElementById('pertanyaan');

        var container = document.getElementById('ctn');
        
        var container2 = document.getElementById('ctn2');
        // var btn = document.getElementById('button-addon2');

        // tambahkan event ketika keyword ditulis

        keyword.addEventListener('change', function() {


            //buat objek ajax
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    container.innerHTML = xhr.responseText;
                }
            }

            xhr.open('GET', '<?= base_url('Freelance/lowonganByTanggal/') ?>' + keyword.value, true);
            xhr.send();


        })

        keyword2.addEventListener('change', function() {


            //buat objek ajax
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    container2.innerHTML = xhr.responseText;
                }
            }

            xhr.open('GET', '<?= base_url('Freelance/templatePesan/') ?>' + keyword2.value, true);
            xhr.send();


        })
    </script>