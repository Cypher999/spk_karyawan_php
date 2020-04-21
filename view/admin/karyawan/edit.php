<?php
		require_once 'control/main.php';
		$kar=new custom_db();
		$kar->setTableName("karyawan");
		$id_set=array(
		"var"=>array("kd_karyawan"),
		"val"=>array($_GET["kd_karyawan"])
		);
		$kar->setidentifier($id_set["var"],$id_set["val"]);
		$sql_k=$kar->search_data();
		$isi_k=mysqli_fetch_assoc($sql_k);
		?>
<div class="col-md-8">
<h2>Edit Data Karyawan</h2>
<form action="process.php?p=karyawan&&b=edit" method="post" enctype="multipart/form-data">
	<label>Kode Karyawan</label>
	<input type="text" name="kd" class="form-control" value="<?php echo $isi_k["kd_karyawan"];?>" readonly>
	<label>Nama Karyawan</label>
	<input type="text" name="nm" class="form-control" value="<?php echo $isi_k["nm_karyawan"];?>">
	<label>Alamat</label>
	<input type="text" name="alt" class="form-control" value="<?php echo $isi_k["alt"];?>">
	<label>Cabang</label>
	<select name="cbg" class="form-control">
		<?php
		require_once 'control/main.php';
		$cb=new custom_db();
		$cb->setTableName("cabang");
		$sql=$cb->search_all("kd_cabang");
		while($isi=mysqli_fetch_assoc($sql)):
		?>
		<option value='<?php echo $isi["kd_cabang"];?>'
			<?php
			if($isi["kd_cabang"]==$isi_k["kd_cabang"]){
				echo "selected";
			}
			?>
			><?php echo $isi["nm_cabang"];?></option>
	<?php endwhile;?>
</select><br>
<label>Shift</label>
	<select name="shift" class="form-control">
		<option value="1" <?php if($isi["shift"]=="1"){echo "selected";}?>>Siang </option>
		<option value="0" <?php if($isi["shift"]=="0"){echo "selected";}?>>Malam </option>
	</select><br>
<label>Foto</label><br>
<img src="
<?php
$file="image/".$_GET["kd_karyawan"].".jpg";
$cek=file_exists($file);
if(!$cek){
	$file="image/empty.jpeg";
}
echo $file;
?>"
 width="300" height="300" id="gambar"><br>
<input type="file" name="gambar" onchange="preview()"><br>
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