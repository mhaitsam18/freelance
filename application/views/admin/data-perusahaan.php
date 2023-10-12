	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>
		<?php if (validation_errors()): ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
			</div>
		<?php endif ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Perusahaan"></div>
		<?= $this->session->flashdata('message'); ?>
		<!-- Content Row -->
        <div class="row">
        	<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Perusahaan Yang Belum divalidasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan_unconfirmed ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Perusahaan Tidak Valid</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan_invalid ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perusahaan Valid</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $perusahaan_valid ?></div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: <?= $perusahaan_valid/$perusahaan_total*100 ?>%" aria-valuenow="50" aria-valuemin="<?= $perusahaan_valid/$perusahaan_total*100 ?>"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total perusahaan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan_total ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
		<div class="row">
			<div class="col-lg">
				<div class="card">
					<div class="card-header"><i class="fas fa-table mr-1"></i>Data Perusahaan</div>
					<div class="card-body">
						<table class="table table-hover table-responsive" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Perusahaan</th>
									<th scope="col">Email Perusahaan</th>
									<th scope="col">Nomor Telepon</th>
									<th scope="col">Deskripsi Perusahaan</th>
									<th scope="col">Akte Pendirian Usaha</th>
									<th scope="col">NPWP</th>
									<th scope="col">Surat Izin Usaha Perdagangan</th>
									<th scope="col">Validasi</th>
									<th scope="col">Catatan</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($perusahaan as $key): ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $key['nama_perusahaan'] ?></td>
										<td><?= $key['email_perusahaan'] ?></td>
										<td><?= $key['no_tlp'] ?></td>
										<td><?= $key['deskripsi_perusahaan'] ?></td>
										<td>
											<a href="<?= base_url('assets/img/profil/'.$key['akte_pendirian_usaha']) ?>">
												<i class="fas fa-file-pdf text-danger"></i>
												<!-- <img src="<?= base_url('assets/img/profil/'.$key['akte_pendirian_usaha']) ?>" class="img-thumbnail"> -->
											</a>
										</td>
										<td><a href="<?= base_url('assets/img/profil/'.$key['npwp']) ?>"><img src="<?= base_url('assets/img/profil/'.$key['npwp']) ?>" class="img-thumbnail"></a></td>
										<td><a href="<?= base_url('assets/img/profil/'.$key['surat_izin_usaha_perdagangan']) ?>"><img src="<?= base_url('assets/img/profil/'.$key['surat_izin_usaha_perdagangan']) ?>" class="img-thumbnail"></a></td>
										<td>
											<?php
											if ($key['is_valid']==0) {
												echo "Belum divalidasi";
											} elseif($key['is_valid']==1){
												echo "Valid";
											} else{
												echo "Tidak Valid";
											}
											?>     
										</td>
										<td><?= $key['catatan'] ?></td>
										<td>
											<?php if ($key['is_valid'] == 0): ?>
												<a href="<?= base_url("Admin/validasiPerusahaan/$key[id_profil]/1") ?>" class="badge badge-success tombol-yakin">Valid</a>
												<a href="<?= base_url("Admin/validasiPerusahaan/$key[id_profil]/2") ?>" class="badge badge-danger tombol-yakin">Tidak Valid</a>
											<?php elseif ($key['is_valid'] == 1): ?>
												<span class="badge badge-secondary">Valid</span>
											<?php elseif ($key['is_valid'] == 2): ?>
												<span class="badge badge-secondary">Tidak Valid</span>
											<?php endif ?>
												<a href="#" class="badge badge-info" data-toggle="modal" data-target="#catatanModal<?= $key['id_profil'] ?>"><i class="fas fa-plus"></i> Catatan</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Button trigger modal -->

<?php foreach ($perusahaan as $key): ?>
<!-- Modal -->
<div class="modal fade" id="catatanModal<?= $key['id_profil']  ?>" tabindex="-1" aria-labelledby="catatanModalLabel<?= $key['id_profil']  ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="catatanModalLabel<?= $key['id_profil']  ?>">Tambahkan Catatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/inputCatatan') ?>" method="post">
				<input type="hidden" name="id_profil" id="id_profil" value="<?= $key['id_profil']  ?>"">
				<div class="modal-body">
					<div class="form-group">
						<label for="catatan">Catatan</label>
						<textarea class="form-control" name="catatan" id="Catatan"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>