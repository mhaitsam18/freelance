<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo form_open('product/search') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="search_submit" value="Cari">
	<?php echo form_close() ?>
 
	<table>
 
			<?php foreach($pengalaman as $product) { ?>
				<tr>
					<td><?php echo $product->nama ?></td>
					<td><?php echo $product->pengalaman ?></td>
					<td><?php echo $product->tahun ?></td>
				</tr>
			<?php } ?>
 
 
	</table>
</body>
</html>