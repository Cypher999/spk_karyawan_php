<?php
		require_once 'control/main.php';
		$kri=new custom_db();
		$kri->setTableName("kriteria");
		$id_set=array(
		"var"=>array("kd_kriteria"),
		"val"=>array($_GET["kd_kriteria"])
		);
		$kri->setidentifier($id_set["var"],$id_set["val"]);
		$sql_k=$kri->search_data();
		$isi_k=mysqli_fetch_assoc($sql_k);
		?>
<div class="col-md-8">
<h2>Edit Data Cabang</h2>
<form action="process.php?p=kriteria&&b=edit" method="post" enctype="multipart/form-data">
	<label>Kode Kriteria</label>
	<input type="text" name="kd" class="form-control" value="<?php echo $isi_k["kd_kriteria"];?>" readonly>
	<label>Nama Kriteria</label>
	<input type="text" name="nm" class="form-control" value="<?php echo $isi_k["nm_kriteria"];?>" readonly>
	<label>Tipe</label>
	<select name="tipe" class="form-control">
		<option value="B" <?php if($isi_k["tipe"]=="B"){echo "selected";} ?>>Benefit</option>
		<option value="C" <?php if($isi_k["tipe"]=="C"){echo "selected";} ?>>Cost</option>
	</select><br>
	<label>Bobot</label>
	<input type="text" name="bobot" class="form-control" value="<?php echo $isi_k["bobot"];?>">
	<br>
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
		<input type="button" onclick="window.location.href='index.php?p=kriteria'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>
