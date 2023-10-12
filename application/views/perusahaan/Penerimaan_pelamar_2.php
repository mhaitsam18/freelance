<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/dashboard2.css">

</head>
<body>
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
	
	<div class="atas"><h1 class="h3 mb-4 text-gray-800"><b><?= $judul . $user['username']; ?></b></h1>
</div>
<div class="scroll">
<div class="apalu">
	<?php foreach ($lowongan as $k) { 
		date_default_timezone_set('Asia/Jakarta');
		$kota = $k->kota;
		$tanggal = $k->tgl_buat;
			
			$nama_perus = $user['username'];
			$image = $user['image'];
	
		
		?>
	<a href="<?php echo base_url().'Perusahaan/Rincian_lowongan/'.$k->id_lowongan ?>">
<div class="list">
<div class="warna">
<ul>
	<li>
		<img class="foto" src="<?php echo base_url('assets/img/profil/') . $image; ?>">
		<?php
		if (strlen($k->judul) > 10) {
			echo "<b>",substr($k->judul, 0, 15),"....</b>";
		} else {
			echo "<b>", $k->judul,"</b>";
		}
		echo "<div class='n_perusahaan'>",$nama_perus,"</div>";
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
<div class="detail">
	
	<?php 
		$jdl = $cur_lowongan->judul;
		$lks = $cur_lowongan->kota;
		$dks = $cur_lowongan->deskripsi;
		$prt = $cur_lowongan->persyaratan;
		$tgl = $cur_lowongan->tgl_buat;
	?>
	<div class="jdl"><?php echo $jdl; ?></div><br><br>
	<img class="foto" src="<?php echo base_url('assets/img/profil/') . $image ?>"><br><br>
	<div class="nm_perusahaan"><?php echo $nama_perus; ?></div><br>
	<div class="lks">
		<h5><b>kota : </b></h5>
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
<a href="<?php echo base_url().'Perusahaan/Penerimaan_pelamar/'.$cur_lowongan->id_lowongan ?>" style="float: right;">List Pelamar</a>
</div>
</body>
</html>