<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/dashboard2.css">

</head>
<body>
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
	
	<div class="atas"><h1 class="h3 mb-4 text-gray-800"><b><?= $judul . $user['username']; ?></b></h1></div>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Lowongan"></div>
    <?= $this->session->flashdata('message') ?>
    
	<div class="scroll">
		<div class="apalu">
			<?php foreach ($lowongan as $k) { 
				date_default_timezone_set('Asia/Jakarta');
				$kota = $k->kota;
				$tanggal = date('j F Y',strtotime($k->tgl_buat)); ;
				?>
				<a href="<?php echo base_url().'Perusahaan/Rincian_lowongan/'.$k->id_lowongan ?>">
					<div class="list">
						<div class="warna">
							<ul>
								<li>
									<img class="foto" src="<?php echo base_url('assets/img/profil/') . $user['image']; ?>">
									<?php
									if (strlen($k->judul) > 10) {
										echo "<b>",substr($k->judul, 0, 15),"....</b>";
									} else {
										echo "<b>", $k->judul,"</b>";
									}
									echo "<div class='n_perusahaan'>",$user['username'],"</div>";
									echo "<div class='kota'>",$kota,"</div>";
									echo "<div class='tanggal'>",$tanggal,"</div>";
									 ?>
								</li>
							</ul>
						</div>
					</div>
				</a>
			<?php }?>
		</div>
	</div>
	<a style="float: right;margin-right: 100px; margin-top: 100px;" href="http://www.facebook.com/sharer.php?u=https://0d0f79e5d1e3.ngrok.io/freelance/Auth/jobs" target="_blank" target="_blank"><img src="<?php echo base_url('assets/img/profil/facebook.png') ?>"></a>
	<a style="float: right; margin-right: 20px; margin-top: 100px;" href="http://twitter.com/share?url=0d0f79e5d1e3.ngrok.io/freelance/Auth/jobs" target="_blank"><img src="<?php echo base_url('assets/img/profil/twitter.png') ?>"></a>
	<div class="detail">
		<?php 
			$jdl = $cur_lowongan->judul;
			$lks = $cur_lowongan->kota;
			$dks = $cur_lowongan->deskripsi;
			$prt = $cur_lowongan->persyaratan;
			$tgl = $cur_lowongan->tgl_buat;
		?>
		<div class="jdl"><?php echo $jdl; ?></div><br><br>
		<img class="foto" src="<?php echo base_url('assets/img/profil/') . $user['image'] ?>"><br><br>
		<div class="nm_perusahaan"><?php echo $user['username']; ?></div><br>
		<div class="lks">
			<h5><b>Lokasi : </b></h5>
			<?php echo $lks; ?>
		</div>
		<div class="tgl"><?php echo $tgl; ?></div>
		<div class="dks">
			<h5><b>Deskripsi Pekerjaan : </b></h5>
			<?php echo $dks; ?>
		</div>
		<div class="prt"><br><br>
			<h5><b>Persyaratan Pekerjaan : </b></h5>
			<?php echo $prt; ?>
		</div>

		<br><br>
		<a href="<?php echo base_url().'Perusahaan/Edit_lowongan/'.$cur_lowongan->id_lowongan ?>">Edit Lowongan</a>
		<hr>
		<h4><i class="fas fa-comments"></i> Komentar</h4>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2">
						<img src="<?= base_url('assets/img/profil/'.$user['image']) ?>" class="img-thumbnail">
					</div>
					<div class="col-md-10">
						<h5 class="card-title mb-0 mt-0"><a href=""><?= $user['username'] ?></a></h5>
						<form action="<?= base_url('Perusahaan/kirimKomentar/') ?>" method="post">
							<input type="hidden" name="id_lowongan" id="id_lowongan" value="<?= $cur_lowongan->id_lowongan ?>">
							<input type="hidden" name="id_user" id="id_user" value="<?= $user['id'] ?>">
							<div class="form-group">
								<textarea class="form-control" name="komentar" id="komentar" placeholder="Tulis Komentar"><?= set_value('komentar') ?></textarea>
							</div>
							<button type="submit" class="btn btn-sm btn-primary float-right">Kirim</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php foreach ($komentar_lowongan as $kl): ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
							<img src="<?= base_url('assets/img/profil/'.$kl->image) ?>" class="img-thumbnail" style="width: 60px; height: 60px;">
						</div>
						<div class="col-md-10">
							<h5 class="card-title mb-0 mt-0"><a href=""><?= $kl->username ?></a></h5>
							<p class="card-text mb-0"><?= $kl->komentar ?></p>
							<small class="mt-0">dipost : <?= date('d/m/Y H:i:s', strtotime($kl->waktu_post)) ?></small>
							<br>
							<?php if ($kl->id_user == $user['id']): ?>
								<small class="mt-0"><a href="<?= base_url('Perusahaan/hapusKomentar/'.$kl->id_komentar) ?>">hapus</a></small>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		<!-- <div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2">
						<img src="<?= base_url('assets/img/profil/default.png') ?>" class="img-thumbnail">
					</div>
					<div class="col-md-10">
						<h5 class="card-title mb-0 mt-0"><a href="">Haitsam</a></h5>
						<p class="card-text">isinya</p>
					</div>
				</div>
			</div>
		</div> -->
		
	</div>
</body>
</html>