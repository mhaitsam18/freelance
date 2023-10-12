<select class="form-control" name="id_kota" id="id_kota">
	<option value="" selected disabled>Pilih Kota</option>
	<?php foreach ($kota as $k): ?>
		<option value="<?= $k->id_kota ?>"><?= $k->kota ?></option>
	<?php endforeach ?>
</select>