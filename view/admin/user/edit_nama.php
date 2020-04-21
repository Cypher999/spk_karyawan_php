<?php
		require_once 'control/main.php';
		$cab=new custom_db();
		$cab->setTableName("user");
		$id_set=array(
		"var"=>array("id_user"),
		"val"=>array($_GET["id"])
		);
		$cab->setidentifier($id_set["var"],$id_set["val"]);
		$sql_k=$cab->search_data();
		$isi_k=mysqli_fetch_assoc($sql_k);
		?>
<div class="col-md-8">
<h2>Edit Nama</h2>
<form action="process.php?p=user&&b=edit_nama" method="post" enctype="multipart/form-data">
	<label>User</label><br>
	<label><?php echo $isi_k["nm_user"];?></label><br>
	<label>Nama Baru</label>
	<input type="text" name="nm" class="form-control">
	
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
		<input type="button" onclick="window.location.href='index.php?p=user'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>
