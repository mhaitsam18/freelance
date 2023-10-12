<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/profile.css">
</head>
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
<body>
<?php foreach ($b as $key) { ?>
<form action="<?= base_url('Perusahaan/Edit_profil_eksekusi/').$key->id?>" enctype="multipart/form-data" method="post">
	
		<div class="bg" style="background-image: url(<?php echo base_url('assets/img/profil/mini-profile-bg-01.jpg'); ?>);">
		<div class="tengah">
		<div class="isi">
				<div class="nama">
					<table>
						<tr>
							<td><h5>Username</h5></td>
							<td><h5>Nama Perusahaan</h5></td>
							<td><h5>Email</h5></td>
						</tr>
						<tr>
							<td><input type="text" name="username" required value="<?php echo $key->username ?>"></td>
							<td><input type="text" name="nama_perusahaan" required value="<?php echo $key->nama_perusahaan ?>"></td>
							<td><input type="email" name="email" value="<?php echo $key->email ?>" required></td>
						</tr>
					</table>
				</div>
				<br>
				<br>
				<div class="deskripsi">
					<h5>Deskripsi Perusahaan</h5>
					<textarea name="deskripsi" required ><?php echo $key->deskripsi_perusahaan ?></textarea>
				</div>
				<br><br>
				<div class="tlp">
					<h5>Nomor Telpon</h5>
					<input type="text" name="notlp" required value="<?php echo $key->no_tlp ?>">
				</div>
				<br><br>
				<div class="akta">
					<h5>Akta Pendirian Usaha</h5>
					<img src="<?php echo base_url('assets/img/profil/').$key->akta_pendirian_usaha ?>">
					<input type="file" name="akta">
				</div>
				<br><br>
				<div class="npwp">
					<h5>Nomor Pokok Wajib Pajak</h5>
					<img src="<?php echo base_url('assets/img/profil/').$key->npwp ?>">
					<input type="file" name="npwp">
				</div>
				<br><br>
				<div class="siup">
					<h5>Surat Izin Usaha Perdagangan</h5>
					<img src="<?php echo base_url('assets/img/profil/').$key->surat_izin_usaha_perdagangan ?>">
					<input type="file" name="siup">
				</div>
				<br><br>
				<div class="tombol">
					<button>Simpan</button>
				</div>
		</div>
		</div>
	</div>
	<?php } ?>
</form>

</body>
</html>


