<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/Ganti_password.css">
</head>
<body>
<form action="<?= base_url('Perusahaan/Ganti_password_eksekusi/') ?>" enctype="multipart/form-data" method="post">
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
	
		<div class="bg" style="background-image: url(<?php echo base_url('assets/img/profil/mini-profile-bg-01.jpg'); ?>);">
		<div class="tengah">
		<div class="isi">
			<h5><?= $this->session->flashdata('notif') ?></h5>
				<div class="nama">
					<table>
						<tr>
							<td><h5>Password Lama</h5></td>
						</tr>
						<tr>
							<td><input required type="password" name="pass_lama"></td>
						</tr>
					</table>
				</div>
				<br>
				<br>
				<div class="password">
					<h5>Password Baru</h5>
					<input required type="password" name="pass_baru">
				</div>
				<br><br>
				<div class="password">
					<h5>Ulangi Password Baru</h5>
					<input required type="password" name="pass_baru_ulang">
				</div>
				<br><br>
				<div class="tombol">
					<button>Simpan</button>
				</div>
		</div>
		</div>
	</div>
</form>

</body>
</html>


