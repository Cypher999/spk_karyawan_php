<div class="col-md-8">
<h2>Tambah Data Cabang</h2>
<form action="process.php?p=cabang&&b=new" method="post" enctype="multipart/form-data">
	<label>Kode Cabang</label>
	<input type="text" name="kd" class="form-control">
	<label>Nama Cabang</label>
	<input type="text" name="nm" class="form-control"><br>
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
		<input type="button" onclick="window.location.href='index.php?p=cabang'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>