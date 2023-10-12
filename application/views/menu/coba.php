<div class="container-fluid">

    <!-- PAGE HEADING -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">TAMBAH MENU BARU</h1>
                </div>
                <form class="user" method="POST" action="<?= base_url('Menu/tambahmenu') ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="Nama_freelance" placeholder="Masukkan Nama Menu" name="menu" value="<?= set_value('menu'); ?>">
                        <?= form_error('menu', '<small class= "text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        TAMBAH
                    </button>


            </div>
        </div>
    </div>