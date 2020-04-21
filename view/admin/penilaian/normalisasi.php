<?php
require_once "control/main.php";
$k_01_max=0;$k_02_max=0;$k_03_max=0;$k_04_max=0;$k_05_max=0;
$nil=new custom_db();
$nil->setTableName("penilaian");
$sql=$nil->search_all("kd_karyawan");


$kri=new custom_db();
$kri->setTableName("kriteria");
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

$nil_nor=new custom_db();
$nil_nor->setTableName("penilaian");
$sql_nor=$nil_nor->search_all("kd_karyawan");
while($isi_nor=mysqli_fetch_assoc($sql_nor)){
	if($isi_1["tipe"]=="B"){
		if(($isi_nor["k_01"])>$k_01_max){
			$k_01_max=$isi_nor["k_01"];
		}
	}
	else{
		if($k_01_max==0){
			$k_01_max=$isi_nor["k_01"];	
		}
		else if(($k_01_max!=0)&&(($isi_nor["k_01"])<$k_01_max)){
			$k_01_max=$isi_nor["k_01"];		
		}
	}

	if($isi_2["tipe"]=="B"){
		if(($isi_nor["k_02"])>$k_02_max){
			$k_02_max=$isi_nor["k_02"];
		}
	}
	else{
		if($k_02_max==0){
			$k_02_max=$isi_nor["k_02"];	
		}
		else if(($k_02_max!=0)&&(($isi_nor["k_02"])<$k_02_max)){
			$k_02_max=$isi_nor["k_02"];		
		}
	}

	if($isi_3["tipe"]=="B"){
		if(($isi_nor["k_03"])>$k_03_max){
			$k_03_max=$isi_nor["k_03"];
		}
	}
	else{
		if($k_03_max==0){
			$k_03_max=$isi_nor["k_03"];	
		}
		else if(($k_03_max!=0)&&(($isi_nor["k_03"])<$k_03_max)){
			$k_03_max=$isi_nor["k_03"];		
		}
	}

	if($isi_4["tipe"]=="B"){
		if(($isi_nor["k_04"])>$k_04_max){
			$k_04_max=$isi_nor["k_04"];
		}
	}
	else{
		if($k_04_max==0){
			$k_04_max=$isi_nor["k_04"];	
		}
		else if(($k_04_max!=0)&&(($isi_nor["k_04"])<$k_04_max)){
			$k_04_max=$isi_nor["k_04"];		
		}
	}

	if($isi_5["tipe"]=="B"){
		if(($isi_nor["k_05"])>$k_05_max){
			$k_05_max=$isi_nor["k_05"];
		}
	}
	else{
		if($k_05_max==0){
			$k_05_max=$isi_nor["k_05"];	
		}
		else if(($k_05_max!=0)&&(($isi_nor["k_05"])<$k_05_max)){
			$k_05_max=$isi_nor["k_05"];		
		}
	}

}

?>
<tr align="center"><th rowspan="2">Nama Karyawan</th><th colspan="5">Nilai</th></tr>
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
		echo number_format(($isi["k_01"]/$k_01_max),2);
	}
	else{echo number_format(($k_01_max/$isi["k_01"]),2);}?></td>
	<td><?php 
	if($isi_2["tipe"]=="B"){
		echo number_format(($isi["k_02"]/$k_02_max),2);
	}
	else{echo number_format(($k_02_max/$isi["k_02"]),2);}?></td>
	<td><?php 
	if($isi_3["tipe"]=="B"){
		echo number_format(($isi["k_03"]/$k_03_max),2);
	}
	else{echo number_format(($k_03_max/$isi["k_03"]),2);}?></td>
	<td><?php 
	if($isi_4["tipe"]=="B"){
		echo number_format(($isi["k_04"]/$k_04_max),2);
	}
	else{echo number_format(($k_04_max/$isi["k_04"]),2);}?></td>
	<td><?php 
	if($isi_5["tipe"]=="B"){
		echo number_format(($isi["k_05"]/$k_05_max),2);
	}
	else{echo number_format(($k_05_max/$isi["k_05"]),2);}?></td>
</tr>
<?php endwhile;endif;?>
