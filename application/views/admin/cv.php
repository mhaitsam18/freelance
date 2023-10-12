<div class="content-header">
    <div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
    <div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
    <!-- <section class=""> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>CV</h1>

            </div>
            <div class="col-sm-6 mb-2 ">
                <a href="<?= base_url('Perusahaan/print_cv/'.$user_pengirim['id']) ?>" target="_blank" class="btn btn-outline-danger float-sm-right"><i class="fas fa-fw fa-print"></i>Print PDF</a>
                <!-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Freelance') ?>  ">Home</a></li> / 
                    <li><a href="<?= base_url('Freelance/edit_cv') ?>">edit_cv</a></li>
                </ol> -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="CV"></div>
            <?= $this->session->flashdata('message'); ?>
        
            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profil/') . $user_pengirim['image']; ?>" alt="User profile picture">
                            </div>
                            <!-- <button class="badge badge-primary"><i class="fas fa-pencil-alt"></i></button> -->
                            <h3 class="profile-username text-center"><?= $cv['nama']; ?></h3>

                            <p class="text-muted text-center"><?= $user_pengirim['email']; ?></p>
                            <p class="text-muted ">Tempat Kelahiran : <?= $cv['tempat_lahir']; ?></p>
                            <p class="text-muted ">Tanggal lahir : <?= date('j F Y', strtotime($cv['tgl_lahir'])); ?></p>
                            <p class="text-muted ">Jenis Kelamin : <?= $cv['jenis_kelamin']; ?></p>
                            <p class="text-muted ">Agama : <?= $cv['agama']; ?></p>
                            <p class="text-muted ">Golongan Darah : <?= $cv['gol_darah']; ?></p>
                            <p class="text-muted ">Tinggi Badan : <?= $cv['tinggi']; ?> cm</p>
                            <p class="text-muted ">Berat Badan : <?= $cv['berat']; ?> kg</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-sm-8 float-right">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                <?= $cv['sd'] ?>
                            </p>
                            <p class="text-muted">
                                <?= $cv['smp'] ?>
                            </p>
                            <p class="text-muted">
                                <?= $cv['sma'] ?>
                            </p>
                            <p class="text-muted">
                                <?= $cv['universitas'] ?> Jurusan <?= $cv['jurusan'] ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?= $cv['alamat'] ?></p>
                            <p class="text-muted"><?= $cv['kota'] ?>,<?= $cv['provinsi'] ?></p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Keahlian</strong>

                            <p class="text-muted">
                                <?= $cv['keahlian'] ?>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Portofolio</strong>
                            <?php foreach ($portof as $row): ?>
                                <p class="text-muted"><?= $row['tahun'] ?> - <?= $row['pengalaman'] ?></p>
                            <?php endforeach ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>


    </section>

</div>
</div>