<div class="container-fluid">
	
	<!-- <form action="<?= base_url('perusahaan/hasil_cari_freelance') ?>" method="post">
		<div class="row">
			<input type="text" class="form-control" name="keyword" placeholder="search" style="width: 20%;">
			<input type="submit" class="btn btn-outline-primary ml-3" name="search_submit" value="Cari">
		</div>
	</form> -->
	<?= $this->session->flashdata('message'); ?>
	<div class="pin" data-pin="<?= $this->session->flashdata('pin'); ?>"></div>
	<div class="sesi" data-sesi="<?= $this->session->flashdata('sesi'); ?>"></div>
        
	<div class="card border-left-primary shadow h-100 py-2" style="color: black; margin-top: 10px;">
		<div class="card-body">
			<div class="isi">
				<table class="table table-striped" id="dataTable">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Pengalaman</th>
							<th>Tahun</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($freelance as $fr): ?>
							<?php
							$rekruitasi = $this->db->get_where('rekruitasi', [
								'id_user_penerima' => $fr->id_user,
								'id_lowongan' => $id_lowongan,
								'status' => 'Belum dikonfirmasi'
							]);
							?>
							<tr>
								<td><?php echo $fr->nama ?></td>
								<td>
									<?php 
									$portofolio = $this->db->get_where('portofolio', ['id_user' => $fr->id_user]);
									 ?>
									 <?php if ($portofolio->num_rows() < 1): ?>
									 	Pengalaman tidak tersedia
									 <?php else: ?>
										<?php foreach ($portofolio->result() as $por): ?>
											<div class="row">
													<?= $por->pengalaman ?>
												<!-- <div class="col-sm-5">
												</div>
												<div class="col-sm-2">
													-
												</div>
												<div class="col-sm-5">
													<?= $por->tahun ?>
												</div> -->
											</div>
										<?php endforeach ?>
									 <?php endif ?>
								</td>
								<td>
									<?php 
									$portofolio = $this->db->get_where('portofolio', ['id_user' => $fr->id_user]);
									 ?>
									 <?php if ($portofolio->num_rows() > 0): ?>
									 	<?php foreach ($portofolio->result() as $por): ?>
											<div class="row">
												<!-- <div class="col-sm-5">
													<?= $por->pengalaman ?>
												</div>
												<div class="col-sm-2">
													-
												</div>
												<div class="col-sm-5">
												</div> -->
												<?= $por->tahun ?>
											</div>
										<?php endforeach ?>
									 <?php endif ?>
								</td>
								<td>
									 <?php if ($rekruitasi->num_rows() > 0): ?>
									 	Rekruitasi Terkirim
									 <?php endif ?>
								</td>
								<td>
									<a href="<?= base_url('Perusahaan/lihatCV/'.$fr->id_cv) ?>" class="badge badge-info">Lihat CV</a>
									<?php if ($rekruitasi->num_rows() < 1): ?>
										<a href="<?= base_url("Perusahaan/rekrut/$fr->id_user/$id_lowongan") ?>" class="badge badge-success">Rekrut</a>
									 <?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>