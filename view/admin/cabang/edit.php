<?php
		require_once 'control/main.php';
		$cab=new custom_db();
		$cab->setTableName("cabang");
		$id_set=array(
		"var"=>array("kd_cabang"),
		"val"=>array($_GET["kd_cabang"])
		);
		$cab->setidentifier($id_set["var"],$id_set["val"]);
		$sql_k=$cab->search_data();
		$isi_k=mysqli_fetch_assoc($sql_k);
		?>
<div class="col-md-8">
<h2>Edit Data Cabang</h2>
<form action="process.php?p=cabang&&b=edit" method="post" enctype="multipart/form-data">
	<label>Kode Cabang</label>
	<input type="text" name="kd" class="form-control" value="<?php echo $isi_k["kd_cabang"];?>" readonly>
	<label>Nama Cabang</label>
	<input type="text" name="nm" class="form-control" value="<?php echo $isi_k["nm_cabang"];?>"><br>
<div class="row">
	<div class="col">
		<input type="submit" class="button_save" title="simpan perubahan">
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
