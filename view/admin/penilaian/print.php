<?php
require_once 'control/main.php';
$cab=new custom_db();
$cab->setTableName("cabang");
$sql=$cab->search_all("kd_cabang");
?>
<div class="col-md-8">
<h1>Cetak Hasil Penilaian</h1>
<form action="process.php?p=penilaian&&b=print" method="post" enctype="multipart/form-data">
<label>Masukkan Cabang</label>
<select name="cbg">
	<option value="all">Semua</option>
<?php while ($isi=mysqli_fetch_assoc($sql)):?>
<option value="<?php echo $isi["kd_cabang"];?>"><?php echo $isi["nm_cabang"];?></option>
<?php endwhile;?>
</select>
<div class="row">
<div class="col"><input type="submit" class="button_print" title="Cetak Laporan"></div>
</div>
</form>
</div>
