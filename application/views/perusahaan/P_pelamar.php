<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><b>List Pelamar <?= $lowongan->judul; ?></b></h1>
    </div>
    <div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
    <div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
    <!-- Earnings (Monthly) Card Example -->
        <?= $this->session->flashdata('message'); ?>
        <div class="card border-left-primary shadow h-100 py-2" style="color: black">
            <div class="card-body">
                <div class="row">
                    <a href="<?= base_url('Perusahaan/export_pelamar/'.$lowongan_id) ?>" target="_blank" class="btn btn-outline-danger float-right mb-3 ml-1"><i class="fas fa-file-pdf"></i> Export PDF</a>
                    <a href="<?= base_url('Perusahaan/export_pelamar2/'.$lowongan_id) ?>" target="_blank" class="btn btn-outline-success float-right mb-3 ml-1"><i class="fas fa-file-excel"></i> Export Excel</a>
                    <a href="<?= base_url('Perusahaan/rekrut_freelance/'.$lowongan_id) ?>" class="btn btn-outline-primary float-right mb-3 ml-1"><i class="fas fa-file-excel"></i> Rekrut Freelance</a>
                </div>
                <h4 class="card-title">
                    List Pelamar
                </h4>
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($permintaan_lowongan as $key) { ?>
                            <tr>
                                <td><img style="width: 50px;" src="<?= base_url('assets/img/profil/') . $key->image; ?>"></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->email; ?></td>
                                <td>
                                    <?php 
                                    if ($key->status_lamaran == 'Pending') {
                                        echo anchor('Perusahaan/Terima/'.$key->id_permintaan,' Terima ', ['class' => 'badge badge-primary']),'||',anchor('Perusahaan/Tolak/'.$key->id_permintaan,' Tolak ', ['class' => 'badge badge-danger']);
                                    } else { ?> 
                                        <span class="badge badge-secondary"><?php echo $key->status_lamaran; ?></span>
                                    <?php } ?>
                                    || 
                                    <a class="badge badge-info" href="<?= base_url('Perusahaan/lihatCV/'.$key->id_user_pengirim); ?>">Lihat CV</a> || 
                                    <a href="" class="badge badge-info"  data-toggle="modal" data-target="#kirimPesanModal<?= $key->uid ?>">Kirim Pesan</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4 class="card-title">
                    List Rekruitasi
                </h4>
                <table class="table table-striped" id="dataTable2">
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($rekruitasi as $rek) { ?>
                    <tr>
                        <td><img style="width: 50px;" src="<?= base_url('assets/img/profil/') . $rek->image; ?>"></td>
                        <td><?php echo $rek->nama; ?></td>
                        <td><?php echo $rek->email; ?></td>
                        <td><?php echo $rek->status_rekruitasi; ?></td>
                        <td>
                            <a class="badge badge-info" href="<?= base_url('Perusahaan/lihatCV/'.$rek->id_user_penerima); ?>">Lihat CV</a> || 
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#kirimPesanModal<?= $rek->uid ?>">Kirim Pesan</a>
                            <?php if ($rek->status_rekruitasi != 'dibatalkan'): ?>
                                <a href="<?= base_url('Perusahaan/batalkan_rekruitasi/'.$rek->id_rekruitasi) ?>" class="badge badge-danger">Batalkan Rekruitasi</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php foreach ($data_user as $per): ?>
    <div class="modal fade" id="kirimPesanModal<?= $per->id ?>" tabindex="-1" aria-labelledby="kirimPesanModalLabel<?= $per->id ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kirimPesanModalLabel<?= $per->id ?>">Kirim Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Perusahaan/kirimPesan') ?>" method="post">
                    <div class="modal-body">
                        <h5 class="modal-title">To: <?= $per->nama ?></h5>
                        <input type="hidden" name="id_user_to" id="id_user_to" value="<?= $per->id ?>">
                        <div class="form-group">
                            <label for="message">Pesan</label>
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