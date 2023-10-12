	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('pertanyaan','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						Pertanyaan
					</div>
					<div class="card-body">
						<!-- <h5 class="card-title">Pertanyaan 1</h5> -->
						<a href="" class="btn btn-primary mb-3 newPertanyaanModalButton" data-toggle="modal" data-target="#newPertanyaanModal">Tambah Pertanyaan Umum</a>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Pertanyaan</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($pertanyaan as $key): ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $key['pertanyaan'] ?></td>
										<td>
											<a href="<?= base_url("DataMaster/updatePertanyaan/$key[id_pertanyaan]"); ?>" class="badge badge-success updatePertanyaanModalButton" data-toggle="modal" data-target="#newPertanyaanModal" data-id_pertanyaan="<?=$key['id_pertanyaan']?>">Edit</a>
											<a href="<?= base_url("DataMaster/deletePertanyaan/$key[id_pertanyaan]"); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<!-- Modal -->
<div class="modal fade" id="newPertanyaanModal" tabindex="-1" aria-labelledby="newPertanyaanModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPertanyaanModalLabel">Tambah Pertanyaan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/pertanyaan/') ?>" method="post">
				<input type="hidden" name="id_pertanyaan" id="id_pertanyaan">
				<div class="modal-body">
					<div class="form-group">
						<label for="pertanyaan">Pertanyaan</label>
						<input type="text" class="form-control" id="pertanyaan" name="pertanyaan">
						<?= form_error('pertanyaan','<small class="text-danger pl-3">','</small>'); ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>