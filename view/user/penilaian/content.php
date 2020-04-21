<?php
require_once "control/main.php";
$nilai=array("Sangat baik","Baik","Cukup","Kurang","Sangat kurang");
$kri=new custom_db();
$kri->setTableName("kriteria");
$nil=new custom_db();

$id_set=array(
"var"=>array("kd_kriteria"),
"val1"=>array("k-01"),
"val2"=>array("k-02"),
"val3"=>array("k-03"),
"val4"=>array("k-04"),
"val5"=>array("k-05"),
);

$kri->setidentifier($id_set["var"],$id_set["val1"]);
$sql_1=$kri->search_data();
$isi_1=mysqli_fetch_assoc($sql_1);

$kri->setidentifier($id_set["var"],$id_set["val2"]);
$sql_2=$kri->search_data();
$isi_2=mysqli_fetch_assoc($sql_2);

$kri->setidentifier($id_set["var"],$id_set["val3"]);
$sql_3=$kri->search_data();
$isi_3=mysqli_fetch_assoc($sql_3);

$kri->setidentifier($id_set["var"],$id_set["val4"]);
$sql_4=$kri->search_data();
$isi_4=mysqli_fetch_assoc($sql_4);

$kri->setidentifier($id_set["var"],$id_set["val5"]);
$sql_5=$kri->search_data();
$isi_5=mysqli_fetch_assoc($sql_5);



$nil->setTableName("penilaian");
$sql=$nil->search_all("kd_karyawan");
?>
<tr align="center"><th rowspan="2">Nama Karyawan</th><th colspan="5">Nilai</th><th rowspan="2">Control</th></tr>
<tr><th>Hasil Kerja</th><th>Absensi Kehadiran</th><th>Perilaku Kerja</th><th>Efisiensi Kerja</th><th>Waktu Kerja</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="7">Data Kosong</td></tr>
<?php else:
	while ($isi=mysqli_fetch_assoc($sql)):?>
<tr><td><?php 
$kar=new custom_db();
$id_kar=array(
"var"=>array("kd_karyawan"),
"val"=>array($isi["kd_karyawan"])
);
$kar->setidentifier($id_kar["var"],$id_kar["val"]);
$kar->setTableName("karyawan");
$sql_kar=$kar->search_data();
$isi_kar=mysqli_fetch_assoc($sql_kar);
echo $isi_kar["nm_karyawan"]
?></td>
	<td><?php
	if($isi_1["tipe"]=="B"){
	 echo $nilai[5-($isi["k_01"])];
	}
 else if($isi_1["tipe"]=="C"){
	 echo $nilai[($isi["k_01"])];
	}
	?></td>
	
	<td><?php
	if($isi_1["tipe"]=="B"){
	 echo $nilai[5-($isi["k_02"])];
	}
 else if($isi_1["tipe"]=="C"){
	 echo $nilai[($isi["k_02"])];
	}
	?></td>
	<td><?php
	if($isi_1["tipe"]=="B"){
	 echo $nilai[5-($isi["k_03"])];
	}
 else if($isi_1["tipe"]=="C"){
	 echo $nilai[($isi["k_03"])];
	}
	?></td>

	<td><?php
	if($isi_1["tipe"]=="B"){
	 echo $nilai[5-($isi["k_04"])];
	}
 else if($isi_1["tipe"]=="C"){
	 echo $nilai[($isi["k_04"])];
	}
	?></td>
	<td><?php
	if($isi_1["tipe"]=="B"){
	 echo $nilai[5-($isi["k_05"])];
	}
 else if($isi_1["tipe"]=="C"){
	 echo $nilai[($isi["k_05"])];
	}
	?></td>
	<?php if($isi["id_user"]==$_SESSION["id_user_spk"]): ?>
	<td><input type="button" class="button_edit" title="edit data" onclick="window.location.href='index.php?p=penilaian&&b=edit&&kd_karyawan=<?php echo $isi["kd_karyawan"];?>'">
		<input type="button" class="button_del" title="hapus data" onclick="my_function.delete_data('kd','<?php echo $isi["kd_karyawan"];?>')">
		</td></tr>
<?php endif;endwhile;endif;?>
