	<div class="container-fluid">
		<?= $this->session->flashdata('message') ?>
		<?= $this->session->flashdata('notif') ?>
		<?= $this->session->flashdata('notif_ganti_profil') ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Profil Perusahaan"></div>
		<div class="flash-gagal" data-gagalpin="<?= $this->session->flashdata('gagal_pin'); ?>"></div>
		<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
		<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ?>
		<div class="card mb-3">
			<h4 class="card-header">Catatan Admin</h4>
			<div class="card-body">
				<?php if ($perusahaan->catatan == ''): ?>
					<h5>Catatan Tidak Tersedia</h5>
				<?php endif ?>
				<h5><?= $perusahaan->catatan ?></h5>
			</div>
		</div>
		<div class="card mb-3">
			<h4 class="card-header">Profil Perusahaan 
				<?php if ($perusahaan->is_valid == 0): ?>
					<span class="badge badge-secondary">Belum divalidasi</span>
				<?php elseif ($perusahaan->is_valid == 1): ?>
					<span class="badge badge-success">Valid</span>
				<?php elseif ($perusahaan->is_valid == 2): ?>
					<span class="badge badge-danger">Tidak Valid</span>
				<?php endif ?>
			</h4>
			<div class="card-body">
				<form action="<?= base_url('perusahaan/update_profil') ?>" method="post" class="form_pin">
					<input type="hidden" name="id_profil" id="" value="<?= $perusahaan->id_profil ?>">
					<input type="hidden" name="id_user" id="id_user" value="<?= $perusahaan->id_user ?>">
					<input type="hidden" name="pin_validasi" id="pin_validasi" value="">
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="nama_perusahaan">Nama Perusahaan</label>
							<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $perusahaan->nama_perusahaan ?>">
							<?= form_error('nama_perusahaan', '<small class= "text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-6 mb-3">
							<label for="email_perusahaan">Email Perusahaan</label>
							<input type="text" class="form-control" id="email_perusahaan" name="email_perusahaan" value="<?= $perusahaan->email_perusahaan ?>">
							<?= form_error('email_perusahaan', '<small class= "text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="no_tlp">Nomor Telepon Perusahaan</label>
							<input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $perusahaan->no_tlp ?>">
							<?= form_error('no_tlp', '<small class= "text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-md-6 mb-3">
							<label for="deskripsi_perusahaan">Deskripsi Perusahaan</label>
							<textarea class="form-control" name="deskripsi_perusahaan" id="deskripsi_perusahaan"><?= $perusahaan->deskripsi_perusahaan ?></textarea>
							<?= form_error('deskripsi_perusahaan', '<small class= "text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
						<?php if ($perusahaan->pin != ''){
							$judul_pin = 'Edit Pin';
						} else{
							$judul_pin = 'Buat Pin';
						} ?>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#pinModal">
						<?= $judul_pin; ?>
					</button>
					<button class="btn btn-primary float-right " type="submit">Simpan</button> <!-- minta-pin -->
				</form>
			</div>
		</div>
		<script type="text/javascript">
			function validasi(e) {
				var nama_perusahaan = document.getElementById("nama_perusahaan").value;
				if (nama_perusahaan != "") {
					return true;
				}else{
					alert('Anda harus mengisi data dengan lengkap !');
					return false;
				}
			}
		</script>
		<form action="<?= base_url('perusahaan/set_gambar/') ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_profil" id="id_profil" value="<?= $perusahaan->id_profil ?>">
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Upload Akte Perusahaan</h5>
					<?php if ($perusahaan->akte_pendirian_usaha != ''): ?>
						<a href="<?= base_url('assets/img/profil/'.$perusahaan->akte_pendirian_usaha) ?>">
							<i class="fas fa-file-pdf text-danger"></i>
						</a>
					<?php endif ?>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="akte_pendirian_usaha" name="akte_pendirian_usaha" aria-describedby="submit_fakte_pendirian_usaha">
							<label class="custom-file-label" for="akte_pendirian_usaha">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_akte_pendirian_usaha" name="submit_akte_pendirian_usaha" value="Submit">Submit</button>
						</div>
						<?php if ($perusahaan->akte_pendirian_usaha == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Upload NPWP</h5>
					<?php if ($perusahaan->npwp != ''): ?>
						<img src="<?= base_url('assets/img/profil/'.$perusahaan->npwp) ?>" class="img-thumbnail" style="height: 250px;">
					<?php endif ?>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="npwp" name="npwp" aria-describedby="submit_fnpwp">
							<label class="custom-file-label" for="npwp">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_npwp" name="submit_npwp" value="Submit">Submit</button>
						</div>
						<?php if ($perusahaan->npwp == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Upload Surat Izin Usaha</h5>
					<?php if ($perusahaan->surat_izin_usaha_perdagangan != ''): ?>
						<img src="<?= base_url('assets/img/profil/'.$perusahaan->surat_izin_usaha_perdagangan) ?>" class="img-thumbnail" style="height: 250px;">
					<?php endif ?>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="surat_izin_usaha_perdagangan" name="surat_izin_usaha_perdagangan" aria-describedby="submit_fsurat_izin_usaha_perdagangan">
							<label class="custom-file-label" for="surat_izin_usaha_perdagangan">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_surat_izin_usaha_perdagangan" name="submit_surat_izin_usaha_perdagangan" value="Submit">Submit</button>
						</div>
						<?php if ($perusahaan->surat_izin_usaha_perdagangan == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>
<!-- Modal -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#masukkanPin">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="masukkanPin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="masukkanPinLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="masukkanPinLabel">Masukkan PIN</h5>
			</div>
			<form action="<?= base_url('Perusahaan/lihat_profile') ?>" method="post">
				<div class="modal-body">
						<input type="hidden" name="id_perusahaan" value="<?= $perusahaan->id_profil ?>">
						<div class="modal-body">
							<div class="form-group">
								<label for="password">Masukkan PIN</label>
								<input class="form-control" type="password" name="pin" id="pin" maxlength="6" minlength="6" placeholder="******">
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<button type="button" class="btn btn-primary" id="oke">Understood</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pinModalLabel"><?= $judul_pin ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Perusahaan/insertPin') ?>" method="post">
				<input type="hidden" name="id_perusahaan" value="<?= $perusahaan->id_profil ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="password">Masukkan Password</label>
						<input class="form-control" type="password" name="password" id="password" value="">
					</div>
					<div class="form-group">
						<label for="password">Masukkan PIN</label>
						<input class="form-control" type="password" name="pin" id="pin" maxlength="6" minlength="6" placeholder="******">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

	var modal = document.getElementById("masukkanPin");
	const modal_pin = $('.modalPin').data('modal_pin');
	if (modal_pin = 'block') {
		$('#masukkanPin').modal('show');
	}
</script>