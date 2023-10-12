<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul . $user['username']; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-2" style="max-width: 50%;">
        <div class="row g-2">
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/profil/') . $user['image'];  ?>" width="100%" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-text">Nama : </h6><?= $user['username']; ?><br>
                    <h6 class="card-text">Email : </h6><?= $user['email']; ?><br>
                    <h6 class="card-text">Akun Admin Sejak : </h6><?= date('d F Y', $user['date_created']); ?>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->