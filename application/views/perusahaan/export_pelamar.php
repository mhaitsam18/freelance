<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/p_pelamar.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
	<div class="container-fluid">
		<?php foreach ($lowongan as $key) {
			$judul1 = $key->judul; ?>
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-4 text-gray-800"><b>List Pelamar <?php echo $judul1; ?></b></h1>
			</div>
		<?php } ?>
	        <!-- Earnings (Monthly) Card Example -->
	            <div class="card border-left-primary shadow h-100 py-2" style="color: black">
	                <div class="card-body">
	                    <div class="isi">
	                        <table class="table table-striped">
	                        <tr>
	                            <th>Foto</th>
	                            <th>Nama</th>
	                            <th>Email</th>
	                        </tr>
	                        <?php foreach ($permintaan_lowongan as $key) { ?>
	                        <tr>
	                            <td><img style="width: 50px;" src="<?= base_url('assets/img/profil/') . $key->image; ?>"></td>
	                            <td><?php echo $key->nama; ?></td>
	                            <td><?php echo $key->email; ?></td>
	                        </tr>
	                        <?php } ?>
	                    </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Bootstrap core JavaScript-->
	    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <!-- Core plugin JavaScript-->
	    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
	    <!-- Custom scripts for all pages-->
	    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
	    <script type="text/javascript">
	    	window.print();
	    </script>
	</body>
</html>
