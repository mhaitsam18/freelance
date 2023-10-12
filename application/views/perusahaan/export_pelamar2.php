<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=List Pelamar.xls");
?>                      <table class="table table-striped">
	                        <tr>
	                            <th>No</th>
	                            <th>Nama</th>
	                            <th>Email</th>
	                        </tr>
	                        <?php $no = 1; ?>
	                        <?php foreach ($permintaan_lowongan as $key) { ?>
	                        <tr>
	                            <th scope="row"><?=$no ?></th>
	                            <td><?php echo $key->nama; ?></td>
	                            <td><?php echo $key->email; ?></td>
	                        </tr>
	                        <?php $no++;} ?>
	                    </table>

	  