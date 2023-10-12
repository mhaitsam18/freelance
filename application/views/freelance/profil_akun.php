    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="card mb-2" style="max-width: 50%;">
            <div class="row g-2">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/profil/default.png')  ?>" width="100%" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong> Akun Freelance</strong></h5>
                        <h6 class="card-text">Username : <b><?= $user['username']; ?></b></h6>
                        <h6 class="card-text">Email : <?= $user['email']; ?></h6>
                        <h6 class="card-text">Akun Freelance Sejak : <?= date('j F Y', $user['date_created']); ?></h6>
                        <!-- <button type="submit" class="btn btn-primary">Edit</button> -->
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>