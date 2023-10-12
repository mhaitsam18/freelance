<div class="container-fluid">
    <!-- Earnings (Monthly) Card Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card border-left-primary shadow h-100 py-2" style="color: black">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title">
                    List Undangan
                </h4>
            </div>
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Judul Undangan</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Lokasi</th>
                        <th>Email / Nomor Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rekruitasi as $rek) { ?>
                        <tr>
                            <td><?= $rek->nama_perusahaan; ?></td>
                            <td><?= $rek->judul; ?></td>
                            <td><?= $rek->jenis_pekerjaan; ?></td>
                            <td><?= $rek->kota.', '.$rek->provinsi; ?></td>
                            <td><?= $rek->email_perusahaan.', '.$rek->no_tlp; ?></td>
                            <td>Undangan <?= $rek->status_rekruitasi ?></td>
                            <td>
                                <a class="badge badge-info" href="<?= base_url('Freelance/detail_rekruitasi/'.$rek->id_lowongan.'/'.$rek->id_rekruitasi); ?>">Detail</a> || 
                                <?php if ($rek->status_rekruitasi == 'Belum dikonfirmasi'): ?>
                                    <a href="<?= base_url('Freelance/update_status_undangan/ditolak/'.$rek->id_rekruitasi) ?>" class="badge badge-danger">Tolak Undangan</a>
                                    <a href="<?= base_url('Freelance/update_status_undangan/diterima/'.$rek->id_rekruitasi.'/'.$rek->id_lowongan) ?>" class="badge badge-success">Terima Undangan</a>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Undangan <?= $rek->status_rekruitasi ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>