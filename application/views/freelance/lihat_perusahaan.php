	<div class="container-fluid">
		<?= $this->session->flashdata('message') ?>
		<?= $this->session->flashdata('notif') ?>
		<?= $this->session->flashdata('notif_ganti_profil') ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Profil Perusahaan"></div>
		<div class="flash-gagal" data-gagalpin="<?= $this->session->flashdata('gagal_pin'); ?>"></div>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ?>
		<div class="card mb-3">
			<h4 class="card-header">Profil Perusahaan</h4>
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
				</form>
				<a href="javascript:window.history.go(-1);" class="btn btn-link float-right">Kembali</a>
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
					<h5 class="card-title">Akte Perusahaan</h5> <br>
					<?php if ($perusahaan->akte_pendirian_usaha != ''): ?>
						<img src="<?= base_url('assets/img/profil/'.$perusahaan->akte_pendirian_usaha) ?>" class="img-thumbnail" style="height: 250px;">					
					<?php endif ?>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">NPWP</h5> <br>
					<?php if ($perusahaan->npwp != ''): ?>
						<img src="<?= base_url('assets/img/profil/'.$perusahaan->npwp) ?>" class="img-thumbnail" style="height: 250px;">
					<?php endif ?>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Surat Izin Usaha</h5> <br>
					<?php if ($perusahaan->surat_izin_usaha_perdagangan != ''): ?>
						<img src="<?= base_url('assets/img/profil/'.$perusahaan->surat_izin_usaha_perdagangan) ?>" class="img-thumbnail" style="height: 250px;">
					<?php endif ?>
				</div>
			</div>
			
		</form>
	</div>
</div>