<?php
require_once 'control/main.php';
$kri=new custom_db();
$kri->setTableName("kriteria");
$penilaian=array(
array("Hasil Kerja","Absensi Kehadiran","Perilaku Kerja","Efisiensi Kerja","Waktu Kerja"),
array("k-01","k-02","k-03","k-04","k-05"),
array("Sangat Baik","Baik","Cukup","Kurang","Sangat Kurang"),
array("1","2","3","4","5"),
array("k_01","k_02","k_03","k_04","k_05")
);

$kar=new custom_db();
$kar->setTableName("karyawan");
$id_set_kar=array(
"var"=>array("kd_karyawan"),
"val"=>array($_GET["kd_karyawan"])
);
$kar->setidentifier($id_set_kar["var"],$id_set_kar["val"]);
$sql_kar=$kar->search_data();
$isi_kar=mysqli_fetch_assoc($sql_kar);

$nil=new custom_db();
$nil->setTableName("penilaian");
$id_set_nil=array(
"var"=>array("kd_karyawan"),
"val"=>array($_GET["kd_karyawan"])
);
$nil->setidentifier($id_set_kar["var"],$id_set_kar["val"]);
$sql_nil=$nil->search_data();
$isi_nil=mysqli_fetch_assoc($sql_nil);
?>
<div class="col-md-12">
<h2>Edit Data Penilaian</h2>
<div class="row">
	<div class="col">
<form action="process.php?p=penilaian&&b=edit" method="post" enctype="multipart/form-data">
	<label>Kode Karyawan</label>
	<input type="text" name="kd" id="kd" class="form-control" value="<?php echo $isi_kar["kd_karyawan"];?>" readonly>
	<label>Nama Karyawan</label>
	<input type="text" id="nm" class="form-control" value="<?php echo $isi_kar["nm_karyawan"];?>" readonly><br>
	<div class="bg-warning" style="display: none" id="alert">nama tidak ada</div><br>
	<?php $i=0;while($i<5):?>
	<label><?php echo $penilaian[0][$i] ?></label>
	<select name="<?php echo $penilaian[1][$i] ?>" class="form-control">
		<?php $j=0; while($j<5):?>
		<option value="<?php 
		$nilai_krit="";
		$id_set=array(
		"var"=>array("kd_kriteria"),
		"val"=>array($penilaian[1][$i])
		);
		$kri->setidentifier($id_set["var"],$id_set["val"]);
		$sql=$kri->search_data();
		$isi=mysqli_fetch_assoc($sql);
		if($isi["tipe"]=="B"){
			$nilai_krit=$penilaian[3][(4-$j)];
			echo $nilai_krit;
		}
		else if($isi["tipe"]=="C"){
			$nilai_krit=$penilaian[3][$j];
			echo $nilai_krit;
		}
		?>"
		<?php
		if($nilai_krit==$isi_nil[$penilaian[4][$i]]){echo "selected";}
		?>
		><?php echo $penilaian[2][$j];?></option>
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
		<img src="image/<?php echo $isi_kar["kd_karyawan"];?>.jpg" width="300" height="300" id="gambar">
	</div></div>
</div>
