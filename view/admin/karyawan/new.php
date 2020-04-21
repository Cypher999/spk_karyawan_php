<div class="col-md-8">
<h2>Tambah Data Karyawan</h2>
<form action="process.php?p=karyawan&&b=new" method="post" enctype="multipart/form-data">
	<label>Kode Karyawan</label>
	<input type="text" name="kd" class="form-control">
	<label>Nama Karyawan</label>
	<input type="text" name="nm" class="form-control">
	<label>Alamat</label>
	<input type="text" name="alt" class="form-control">
	<label>Cabang</label>
	<select name="cbg" class="form-control">
		<?php
		require_once 'control/main.php';
		$cb=new custom_db();
		$cb->setTableName("cabang");
		$sql=$cb->search_all("kd_cabang");
		while($isi=mysqli_fetch_assoc($sql)):
		?>
		<option value='<?php echo $isi["kd_cabang"];?>'><?php echo $isi["nm_cabang"];?></option>
	<?php endwhile;?>
</select><br>
	<label>Shift</label>
	<select name="shift" class="form-control">
		<option value="1">Siang </option>
		<option value="0">Malam </option>
	</select><br>
<label>Foto</label><br>
<img src="image/empty.jpeg" width="300" height="300" id="gambar"><br>
<input type="file" name="gambar" onchange="preview()"><br>
<div class="row">
	<div class="col">
		<input type="submit" class="button_save" title="simpan data">
	</div>
	<div class="col">
		<input type="reset" class="button_reset" title="reset">
	</div>
</div><br>
<div class="row">
	<div class="col">
		<input type="button" onclick="window.location.href='index.php?p=karyawan'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>
<script>
	function preview(){
		var gbr=document.getElementById('gambar');
		gbr.src=URL.createObjectURL(event.target.files[0]);
	}
</script>