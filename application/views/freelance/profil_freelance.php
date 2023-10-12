<div class="content-header">
    <!-- <section class=""> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>CV</h1>

            </div>
            <div class="col-sm-6 mb-2 ">
                <a href="<?= base_url('Freelance/print_cv') ?>" target="_blank" class="btn btn-outline-danger float-sm-right"><i class="fas fa-fw fa-print"></i>Export PDF</a>
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
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>" alt="User profile picture">
                            </div>
                            <!-- <button class="badge badge-primary"><i class="fas fa-pencil-alt"></i></button> -->
                            <h3 class="profile-username text-center"><?= $cv['nama']; ?></h3>

                            <p class="text-muted text-center"><?= $user['email']; ?></p>
                            <p class="text-muted ">Tempat Kelahiran : <?= $cv['tempat_lahir']; ?></p>
                            <p class="text-muted ">Tanggal lahir : <?= date('j F Y', strtotime($cv['tgl_lahir'])); ?></p>
                            <p class="text-muted ">Jenis Kelamin : <?= $cv['jenis_kelamin']; ?></p>
                            <p class="text-muted ">Status : <?= $cv['status']; ?></p>
                            <p class="text-muted ">Agama : <?= $cv['agama']; ?></p>
                            <p class="text-muted ">Golongan Darah : <?= $cv['gol_darah']; ?></p>
                            <p class="text-muted ">Tinggi Badan : <?= $cv['tinggi']; ?> cm</p>
                            <p class="text-muted ">Berat Badan : <?= $cv['berat']; ?> kg</p>




                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#CVModal"><b>EDIT</b></button>
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

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-muted">
                                            <?= $cv['sd'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <?php if (substr($cv['ijazah_sd'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['ijazah_sd']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['ijazah_sd']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php endif ?>

                                        <?php if (substr($cv['transkip_sd'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['transkip_sd']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['transkip_sd']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-muted ">
                                            <?= $cv['smp'] ?>
                                        </p>
                                    </div>
                                    <div class="col ">
                                        <?php if (substr($cv['ijazah_smp'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['ijazah_smp']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['ijazah_smp']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php endif ?>

                                        <?php if (substr($cv['transkip_smp'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['transkip_smp']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['transkip_smp']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-muted">
                                            <?= $cv['sma'] ?>
                                        </p>
                                    </div>
                                    <div class="col ">
                                        <?php if (substr($cv['ijazah_sma'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['ijazah_sma']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['ijazah_sma']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php endif ?>

                                        <?php if (substr($cv['transkip_sma'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['transkip_sma']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['transkip_sma']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php endif ?>

                                        
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col">
                                        <p class="text-muted ">
                                            <?= $cv['universitas'] ?> <?= $cv['jurusan'] ?>
                                        </p>
                                    </div>
                                    <div class="col ">
                                        <?php if (substr($cv['ijazah_universitas'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['ijazah_universitas']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['ijazah_universitas']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Ijazah</a>
                                        <?php endif ?>

                                        <?php if (substr($cv['transkip_kuliah'], -3) == 'pdf'): ?>
                                            <a href="<?= base_url('assets/doc/ijazah/'.$cv['transkip_kuliah']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('Freelance/print_ijazah/'.$cv['transkip_kuliah']) ?>" target="_blank" class="btn btn-link float-sm-right"><i class="fas fa-fw fa-download"></i>Transkip Nilai</a>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                            </div> -->

                            <hr>
                            <strong><i class="fas fa-graduation-cap mr-1"></i> Universitas</strong>
                            <br>
                            <button class="btn btn-sm btn-outline-primary mb-2" data-toggle="modal" data-target="#kuliahModal"><i class="fas fa-pencil-alt"></i> Tambah Riwayat Kuliah</button>

                            <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenjang Pendidikan</th>
                                            <th scope="col">Universitas</th>
                                            <th scope="col">Fakultas</th>
                                            <th scope="col">Prodi</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Ijazah & Transkip</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kuliah as $row): ?>
                                            <tr>
                                                <td><?= str_replace('Tamat ', '', $row->pendidikan) ?></td>
                                                <td><?= $row->universitas ?></td>
                                                <td><?= $row->fakultas ?></td>
                                                <td><?= $row->prodi ?></td>
                                                <td><?= $row->tahun_lulusan ?></td>
                                                <td>
                                                    <a href="<?= base_url("assets/doc/ijazah/$row->ijazah") ?>" class="btn btn-link" title="Ijazah"><i class="fas fa-download"></i> Ijazah</a> <a href="<?= base_url("assets/doc/ijazah/$row->transkip_nilai") ?>" class="btn btn-link" title="Transkip Nilai"><i class="fas fa-download"></i> Transkip</a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('Freelance/hapus_kuliah/'.$row->id_kuliah) ?>" class="btn btn-link tombol-hapus" title="Hapus" data-hapus="Kuliah"><i class="fas fa-trash text-danger"></i></a>
                                                    <a href="#" class="btn btn-link updateKuliahModal" title="Edit" data-toggle="modal" data-target="#kuliahModal" data-id_kuliah="<?= $row->id_kuliah ?>"><i class="fas fa-edit text-success"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <strong><i class="fas fa-file-alt mr-1"></i> Documents</strong>

                            <div class="container">
                                <form method="post" action="<?= base_url('Freelance/upload_ijazah/') ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id_cv" value="<?= $cv['id_cv'] ?>">
                                    <div class="row mb-3">
                                        <h6>Upload Ijazah SD</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ijazah_sd" name="ijazah_sd" aria-describedby="submit_fijazah_sd">
                                                <label class="custom-file-label" for="ijazah_sd">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_ijazah_sd" name="submit_ijazah_sd" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['ijazah_sd'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Transkip Nilai / SKHUN SD</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="transkip_sd" name="transkip_sd" aria-describedby="submit_ftranskip_sd">
                                                <label class="custom-file-label" for="transkip_sd">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_transkip_sd" name="submit_transkip_sd" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['transkip_sd'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Ijazah SMP</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ijazah_smp" name="ijazah_smp" aria-describedby="submit_fijazah_smp">
                                                <label class="custom-file-label" for="ijazah_smp">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_ijazah_smp" name="submit_ijazah_smp" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['ijazah_smp'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Transkip Nilai / SKHUN SMP</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="transkip_smp" name="transkip_smp" aria-describedby="submit_ftranskip_smp">
                                                <label class="custom-file-label" for="transkip_smp">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_transkip_smp" name="submit_transkip_smp" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['transkip_smp'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Ijazah SMA</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ijazah_sma" name="ijazah_sma" aria-describedby="submit_fijazah_sma">
                                                <label class="custom-file-label" for="ijazah_sma">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_ijazah_sma" name="submit_ijazah_sma" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['ijazah_sma'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Ijazah SMA</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="transkip_sma" name="transkip_sma" aria-describedby="submit_ftranskip_sma">
                                                <label class="custom-file-label" for="transkip_sma">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_transkip_sma" name="submit_transkip_sma" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['transkip_sma'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-3">
                                        <h6>Upload Ijazah Kuliah</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ijazah_universitas" name="ijazah_universitas" aria-describedby="submit_fijazah_universitas">
                                                <label class="custom-file-label" for="ijazah_universitas">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_ijazah_universitas" name="submit_ijazah_universitas" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['ijazah_universitas'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Upload Transkip Nilai/Akademi Kuliah</h6>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="transkip_kuliah" name="transkip_kuliah" aria-describedby="submit_fijazah_universitas">
                                                <label class="custom-file-label" for="transkip_kuliah">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit" id="submit_transkip_kuliah" name="submit_transkip_kuliah" value="Submit">Submit</button>
                                            </div>
                                            <?php if ($cv['transkip_kuliah'] == ''): ?>
                                                <i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
                                            <?php else: ?>
                                                <i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
                                            <?php endif ?>
                                        </div>
                                    </div> -->
                                    
                                </form>
                            </div>
                                
                            
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?= $cv['alamat'] ?></p>
                            <p class="text-muted"><?= $cv['kota'] ?>,<?= $cv['provinsi'] ?></p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Keahlian</strong>

                            <!-- <p class="text-muted">
                                <?= $cv['keahlian'] ?>
                            </p> -->
                            <br>
                            <button class="btn btn-sm btn-outline-primary mb-2" data-toggle="modal" data-target="#keahlianFreelanceModal"><i class="fas fa-edit"></i> Tambah Keahlian</button>
                            <table class="table" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Keahlian</th>
                                        <th scope="col">Sertifikat</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($keahlian_freelance as $kf): ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $kf->keahlian ?></td>
                                            <td>
                                                <?php if (!empty($kf->sertifikat)): ?>
                                                    <a href="<?= base_url('assets/doc/sertifikat/'.$kf->sertifikat) ?>" class="badge badge-info">Lihat Sertifikat</a>
                                                <?php endif ?>
                                            </td>
                                            <td><?= $kf->tahun ?></td>
                                            <td><?= $kf->keterangan ?></td>
                                            <td>
                                                <a href="<?= base_url('Freelance/hapus_keahlian_freelance/'.$kf->id_keahlian_freelance) ?>" class="badge badge-danger"><i class="fas fa-times"></i></a>
                                                <!-- <a href="" class="badge badge-danger" onclick="hapus_keahlian_freelance(<?= $kf->id_keahlian_freelance ?>)"><i class="fas fa-times"></i></a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Portofolio</strong>
                            <?php foreach ($portof as $row) : ?>
                                <p class="text-muted">
                                    <?= $row['tahun'] ?> - <?= $row['pengalaman'] ?>
                                        
                                    <?php if (substr($row['paklaring'], -3) == 'pdf'): ?>
                                        <a href="<?= base_url('assets/doc/paklaring/'.$row['paklaring']) ?>" target="_blank" class="badge badge-danger float-sm-right">Surat Paklaring</a>
                                    <?php else: ?>
                                        <a href="<?= base_url('Freelance/print_surat_paklaring/'.$row['id_portofolio']) ?>" target="_blank" class="badge badge-danger float-sm-right">Surat Paklaring</a>
                                    <?php endif ?>
                                </p>
                            <?php endforeach ?>
                            <a href="<?= base_url('Freelance/portofolio') ?>" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i> Edit Portofolio</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>


    </section>

</div>

<!-- Modal -->
<div class="modal fade" id="CVModal" tabindex="-1" aria-labelledby="CVModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CVModalLabel">Edit CV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Freelance/profil') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_cv" id="id_cv1" value="<?= $cv['id_cv'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $cv['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $cv['tempat_lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $cv['tgl_lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-control" style="border: none;">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="jenis_kelamin" id="laki_laki" class="custom-control-input" value="Laki-laki" <?php if ($cv['jenis_kelamin'] == "Laki-laki") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="jenis_kelamin" id="perempuan" class="custom-control-input" value="Perempuan" <?php if ($cv['jenis_kelamin'] == "Perempuan") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <!-- <input type="radio" class="form-control"  value="<?= $cv['jenis_kelamin'] ?>"> -->
                    </div>
                    <div class="form-group">
                        <label for="id_agama">Agama</label>
                        <select class="form-control" name="id_agama" id="id_agama">
                            <option value="" selected disabled>Pilih Agama</option>
                            <?php foreach ($agama as $key) : ?>
                                <option value="<?= $key['id_agama'] ?>" <?php if ($key['id_agama'] == $cv['id_agama']) : echo "selected"; endif ?>><?= $key['agama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gol_darah">Golongan Darah</label>
                        <div class="form-control" style="border: none;">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gol_darah" id="gol_a" class="custom-control-input" value="A" <?php if ($cv['gol_darah'] == "A") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="gol_a">A</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gol_darah" id="gol_b" class="custom-control-input" value="B" <?php if ($cv['gol_darah'] == "B") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="gol_b">B</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gol_darah" id="gol_ab" class="custom-control-input" value="AB" <?php if ($cv['gol_darah'] == "AB") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="gol_ab">AB</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gol_darah" id="gol_o" class="custom-control-input" value="O" <?php if ($cv['gol_darah'] == "O") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="gol_o">O</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tinggi">Tinggi Badan</label>
                        <input type="number" class="form-control" name="tinggi" id="tinggi" value="<?= $cv['tinggi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Badan</label>
                        <input type="number" class="form-control" name="berat" id="berat" value="<?= $cv['berat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $cv['no_telp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_provinsi">Provinsi</label>
                        <select class="form-control" id="id_provinsi" name="id_provinsi">
                            <option value="" selected disabled>Pilih Provinsi</option>
                            <?php foreach ($provinsi as $item): ?>
                                <?php if ($item->id_provinsi == $cv['id_provinsi']): ?>
                                    <option value="<?= $item->id_provinsi ?>" selected><?= $item->provinsi ?></option>
                                <?php else: ?>
                                    <option value="<?= $item->id_provinsi ?>"><?= $item->provinsi ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group" id="ctn">
                        <label for="kota">Kota</label>
                        <?php $kota = $this->db->get_where('kota', ['id_provinsi' => $cv['id_provinsi']])->result(); ?>
                        <select class="form-control" id="id_kota" name="id_kota">
                            <option value="" selected disabled>Pilih Kota</option>
                            <?php foreach ($kota as $kt): ?>
                                <?php if ($kt->id_kota ==  $cv['id_kota']): ?>
                                    <option value="<?= $kt->id_kota ?>" selected><?= $kt->kota ?></option>
                                <?php else: ?>
                                    <option value="<?= $kt->id_kota ?>"><?= $kt->kota ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" id="alamat"><?= $cv['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-control" style="border: none;">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status" id="kawin" class="custom-control-input" value="Kawin" <?php if ($cv['status'] == "Kawin") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="kawin">Kawin</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status" id="belum_kawin" class="custom-control-input" value="Belum Kawin" <?php if ($cv['status'] == "Belum Kawin") : echo "checked"; endif ?>>
                                <label class="custom-control-label" for="belum_kawin">Belum Kawin</label>
                            </div>

                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="keahlian">Keahlian</label>
                        <input type="text" class="form-control" name="keahlian" id="keahlian" value="<?= $cv['keahlian'] ?>">
                    </div> -->
                    <div class="form-group">
                        <label for="sd">SD</label>
                        <input type="text" class="form-control" name="sd" id="sd" value="<?= $cv['sd'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="smp">SMP</label>
                        <input type="text" class="form-control" name="smp" id="smp" value="<?= $cv['smp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="sma">SMA</label>
                        <input type="text" class="form-control" name="sma" id="sma" value="<?= $cv['sma'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="universitas">Universitas</label>
                        <input type="text" class="form-control" name="universitas" id="universitas" value="<?= $cv['universitas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $cv['jurusan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="keahlianFreelanceModal" tabindex="-1" aria-labelledby="keahlianFreelanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keahlianFreelanceModalLabel">Tambah Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Freelance/insert_keahlian_freelance') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_cv" id="id_cv2" value="<?= $cv['id_cv'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_keahlian">Keahlian</label>
                        <select class="form-control" name="id_keahlian" id="id_keahlian">
                            <option value="" disabled selected>Pilih Keahlian</option>
                            <?php foreach ($keahlian as $item): ?>
                                <option value="<?= $item['id_keahlian'] ?>"><?= $item['keahlian'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <!-- <?php foreach ($keahlian as $item): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?= $item['id_keahlian'] ?>" id="id_keahlian_<?= $item['id_keahlian'] ?>" name="id_keahlian[]">
                                <label class="form-check-label" for="id_keahlian_<?= $item['id_keahlian'] ?>">
                                    <?= $item['keahlian'] ?>
                                </label>
                            </div>
                        <?php endforeach ?> -->
                        <div class="form-group">
                            <label for="sertifikat">Upload Sertifikat (Jika ada)</label>
                            <input type="file" class="form-control" name="sertifikat" id="sertifikat">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" name="tahun" id="tahun">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                        <!-- <div class="form-control">
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="kuliahModal" tabindex="-1" aria-labelledby="kuliahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kuliahModalLabel">Tambah Riwayat Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Freelance/insert_kuliah') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id_kuliah" id="id_kuliah">
                <input type="hidden" name="id_cv" id="id_cv3" value="<?= $cv['id_cv'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_jenjang_pendidikan">Jenjang Pendidikan</label>
                        <select class="form-control" name="id_jenjang_pendidikan" id="id_jenjang_pendidikan" required>
                            <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                            <?php foreach ($jenjang_pendidikan as $item): ?>
                                <option value="<?= $item->id_pendidikan ?>"><?= $item->pendidikan ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="form-group">
                            <label for="universitas">Universitas</label>
                            <input type="text" class="form-control" name="universitas" id="kuliah_universitas">
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" class="form-control" name="fakultas" id="fakultas">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Program Studi / Jurusan</label>
                            <input type="text" class="form-control" name="prodi" id="prodi">
                        </div>
                        <div class="form-group">
                            <label for="tahun_lulusan">Tahun Lulusan</label>
                            <input type="number" class="form-control" name="tahun_lulusan" id="tahun_lulusan">
                        </div>
                        <div class="form-group">
                            <label for="ijazah">Upload Ijazah</label>
                            <input type="file" class="form-control" name="ijazah" id="ijazah">
                        </div>
                        <div class="form-group">
                            <label for="transkip_nilai">Upload Transkip Nilai</label>
                            <input type="file" class="form-control" name="transkip_nilai" id="transkip_nilai">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    // ambil elements yg di buutuhkan
    var keyword = document.getElementById('id_provinsi');

    var container = document.getElementById('ctn');
    // var btn = document.getElementById('button-addon2');

    // tambahkan event ketika keyword ditulis

    keyword.addEventListener('change', function () {


        //buat objek ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= base_url('Freelance/cariKota/') ?>' + keyword.value, true);
        xhr.send();


    })
</script>