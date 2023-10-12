<table class="table table-hover" id="dataTable">
    <thead>
        <tr>
            <th scope="col">No</th>
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
                <td><?= $pl['judul']; ?></td>
                <td><?= $pl['nama_perusahaan']; ?></td>
                <td><?= $pl['deskripsi']; ?></td>
                <td><a href="#" class="badge rounded-pill bg-indigo disabled"><?= $pl['status'] ?></a> </td>
                <td>
                    <a href="" class="badge rounded-pill bg-info" data-toggle="modal" data-target="#detailModal<?= $pl['id_permintaan'] ?>">Detail</a>
                    <!-- <a href="<?= base_url('Freelance/detail_tracking/'.$pl['id_permintaan']) ?>" class="badge rounded-pill bg-info">Detail</a> -->

                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>