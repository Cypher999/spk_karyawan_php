<?php
require_once 'control/main.php';
$kri=new custom_db();
$kri->setTableName("kriteria");
$penilaian=array(
array("Hasil Kerja","Absensi Kehadiran","Perilaku Kerja","Efisiensi Kerja","Waktu Kerja"),
array("k-01","k-02","k-03","k-04","k-05"),
array("Sangat Baik","Baik","Cukup","Kurang","Sangat Kurang"),
array("1","2","3","4","5")
);
?>
<div class="col-md-12">
<h2>Tambah Data Penilaian</h2>
<div class="row">
	<div class="col">
<form action="process.php?p=penilaian&&b=new" method="post" enctype="multipart/form-data">
	<label>Kode Karyawan</label>
	<input type="text" name="kd" id="kd" class="form-control" required="" onkeyup="cari_nama()" onkeydown="cari_nama()">
	<label>Nama Karyawan</label>
	<input type="text" id="nm" class="form-control" readonly="" required=""><br>
	<div class="bg-warning" style="display: none" id="alert">nama tidak ada</div><br>
	<?php $i=0;while($i<5):?>
	<label><?php echo $penilaian[0][$i] ?></label>
	<select name="<?php echo $penilaian[1][$i] ?>" class="form-control">
		<?php $j=0; while($j<5):?>
		<option value="<?php 
		$id_set=array(
		"var"=>array("kd_kriteria"),
		"val"=>array($penilaian[1][$i])
		);
		$kri->setidentifier($id_set["var"],$id_set["val"]);
		$sql=$kri->search_data();
		$isi=mysqli_fetch_assoc($sql);
		if($isi["tipe"]=="B"){
			echo $penilaian[3][(4-$j)];
		}
		else if($isi["tipe"]=="C"){
			echo $penilaian[3][($j)];
		}
		?>"><?php echo $penilaian[2][$j];?></option>
		<?php $j=$j+1;endwhile;?>
	</select>

	<?php $i=$i+1;endwhile;?>
	<br>
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
		<input type="button" onclick="window.location.href='index.php?p=penilaian'" class="btn btn-success" title="kembali" value="&#8666; &#8666; &#8666;">
	</div>
</div>
</form>
</div>
<div class="col">
		<img src="image/empty.jpeg" width="300" height="300" id="gambar">
	</div></div>
</div>
<script src="assets/js/cari_nama.js"></script>