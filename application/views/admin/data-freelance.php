<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif ?>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data freelance"></div>
	<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-lg">
			<div class="card">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Data Freelance</div>
				<div class="card-body">
					<table class="table table-hover" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Email</th>
								<th scope="col">Foto</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php foreach ($freelance as $key): ?>
								<tr>
									<th scope="row"><?= $no ?></th>
									<td><?= $key['nama'] ?></td>
									<td><?= $key['email'] ?></td>
									<td><a href="<?= base_url('assets/img/profil/'.$key['image']) ?>"><img src="<?= base_url('assets/img/profil/'.$key['image']) ?>" class="img-thumbnail" style="width: 220px;"></a></td>
									<td>
										<?php
										if ($key['is_active']==0) {
											echo "Tidak Aktif";
										} elseif($key['is_active']==1){
											echo "Aktif";
										} else{
											echo "Blok";
										}
										?>     
									</td>
									<td>
										<a href="<?= base_url("Admin/lihat_cv/$key[id]") ?>" class="badge badge-info">Lihat CV</a>
										<?php if ($key['is_active'] == 0): ?>
											<a href="<?= base_url("Admin/ubah_status_freelance/$key[id]/1") ?>" class="badge badge-primary">Aktivasi</a>
											<a href="<?= base_url("Admin/ubah_status_freelance/$key[id]/2") ?>" class="badge badge-danger">Blok</a>
										<?php elseif ($key['is_active'] == 1): ?>
											<a href="<?= base_url("Admin/ubah_status_freelance/$key[id]/2") ?>" class="badge badge-danger">Blok</a>
										<?php elseif ($key['is_active'] == 2): ?>
											<a href="<?= base_url("Admin/ubah_status_freelance/$key[id]/1") ?>" class="badge badge-success">Buka Blokir</a>
										<?php endif ?>
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