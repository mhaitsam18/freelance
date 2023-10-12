<div class="container-fluid">

    <!-- PAGE HEADING -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Tambah SubMenu Baru</h1>
                </div>
                <form class="user" method="POST" action="<?= base_url('Menu/tambahsubmenu') ?>">

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="Nama_freelance" placeholder="Masukkan Judul" name="judul" value="<?= set_value('judul'); ?>">
                        <?= form_error('judul', '<small class= "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="Nama_freelance" placeholder="Masukkan url" name="url" value="<?= set_value('url'); ?>">
                        <?= form_error('url', '<small class= "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="Nama_freelance" placeholder="Masukkan Nama icon" name="icon" value="<?= set_value('icon'); ?>">
                        <?= form_error('icon', '<small class= "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        TAMBAH
                    </button>


            </div>
        </div>
    </div>