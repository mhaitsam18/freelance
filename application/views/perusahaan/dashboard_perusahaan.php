<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/dashboard.css">

</head>
<body>
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
	<div class="jdl"><h1 class="h3 mb-4 text-gray-800"><b><?= $judul . $user['username']; ?></b></h1></div>
	<div class="scroll">
		<div class="apalu">
			<?php 
			foreach ($lowongan as $k) { 
				date_default_timezone_set('Asia/Jakarta');
				if ($k->batas_tgl >= date('Y-m-d')) {
					$id_perusahaan = $k->id_perusahaan;
					$kota = $k->kota;
					$tanggal = date('j F Y',strtotime($k->batas_tgl)); ?>
					<a href="<?php echo base_url().'Perusahaan/Rincian_lowongan/'.$k->id_lowongan ?>">
						<div class="list">
							<div class="warna">
								<ul>
									<li>
										<img class="foto" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
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
				<?php 
				}
			}?>
		</div>
	</div>
	<div class="detail">
		<img src="<?= base_url('assets/')?>img/profil/rocket.png">
		<h3>~Silahkan Pilih Lowongan Pekerjaan~</h3>
	</div>
</body>
</html>