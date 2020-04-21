<?php
require_once "control/main.php";
$k_01_max=0;$k_02_max=0;$k_03_max=0;$k_04_max=0;$k_05_max=0;
$nil=new custom_db();
$nil->setTableName("penilaian");
$sql=$nil->search_all("kd_karyawan");
$abc=array();
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
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="7">Data Kosong</td></tr>
<?php else:
	$index=0;
	while ($isi=mysqli_fetch_assoc($sql)):?><?php 
array_push($abc, array(
"nm"=>"",
"cb"=>"",
"k_01"=>"",
"k_02"=>"",
"k_03"=>"",
"k_04"=>"",
"k_05"=>"",
"total"=>""
));
$kar=new custom_db();
$id_kar=array(
"var"=>array("kd_karyawan"),
"val"=>array($isi["kd_karyawan"])
);
$kar->setidentifier($id_kar["var"],$id_kar["val"]);
$kar->setTableName("karyawan");
$sql_kar=$kar->search_data();
$isi_kar=mysqli_fetch_assoc($sql_kar);
$abc[$index]["nm"]=$isi_kar["nm_karyawan"];
$abc[$index]["cb"]=$isi_kar["kd_cabang"];
?><?php 
	if($isi_1["tipe"]=="B"){
		$hasil_pen_1=($isi["k_01"]/$k_01_max)*$isi_1["bobot"];
		$abc[$index]["k_01"]=number_format(($hasil_pen_1),2);
	}
	else{
		$hasil_pen_1=($k_01_max/$isi["k_01"])*$isi_1["bobot"];
		$abc[$index]["k_01"]=number_format(($hasil_pen_1),2);
	}?><?php 
	if($isi_2["tipe"]=="B"){
		$hasil_pen_2=($isi["k_02"]/$k_02_max)*$isi_2["bobot"];
		$abc[$index]["k_02"]=number_format(($hasil_pen_2),2);
	}
	else{
		$hasil_pen_2=($k_02_max/$isi["k_02"])*$isi_2["bobot"];
		$abc[$index]["k_02"]=number_format(($hasil_pen_2),2);}?><?php 
	if($isi_3["tipe"]=="B"){
		$hasil_pen_3=($isi["k_03"]/$k_03_max)*$isi_3["bobot"];
		$abc[$index]["k_03"]=number_format(($hasil_pen_3),2);
	}
	else{
		$hasil_pen_3=($k_03_max/$isi["k_03"])*$isi_3["bobot"];
		$abc[$index]["k_03"]=number_format(($hasil_pen_3),2);}?><?php 
	if($isi_4["tipe"]=="B"){
		$hasil_pen_4=($isi["k_04"]/$k_04_max)*$isi_4["bobot"];
		$abc[$index]["k_04"]=number_format(($hasil_pen_4),2);
	}
	else{
		$hasil_pen_4=($k_04_max/$isi["k_04"])*$isi_4["bobot"];
		$abc[$index]["k_04"]=number_format(($hasil_pen_4),2);}?><?php 
	if($isi_5["tipe"]=="B"){
		$hasil_pen_5=($isi["k_05"]/$k_05_max)*$isi_5["bobot"];
		$abc[$index]["k_05"]=number_format(($hasil_pen_5),2);
	}
	else{
		$hasil_pen_5=($k_05_max/$isi["k_05"])*$isi_5["bobot"];		
		$abc[$index]["k_05"]=number_format(($hasil_pen_5),2);}?>
		<?php
		$total=$hasil_pen_1+$hasil_pen_2+$hasil_pen_3+$hasil_pen_4+$hasil_pen_5;
	    $abc[$index]["total"]=number_format($total,2);?>
<?php $index=$index+1; endwhile;endif;?>
<?php //proses perankingan
$wadah="";
for($i=0;$i<count($abc);$i++){
	for($j=($i+1);$j<count($abc);$j++){
		if($abc[$j]["total"]>$abc[$i]["total"]){
			$wadah=$abc[$j];
			$abc[$j]=$abc[$i];
			$abc[$i]=$wadah;
		}
	}
}
?>

<tr align="center"><th rowspan="2">Ranking</th><th rowspan="2">Nama Karyawan</th><th colspan="5">Nilai</th><th rowspan="2">Total</th></tr>
<tr><th>Hasil Kerja</th><th>Absensi Kehadiran</th><th>Perilaku Kerja</th><th>Efisiensi Kerja</th><th>Waktu Kerja</th></tr>
<?php
$index=0;
$rank=1;
while($index<count($abc)):
if(($_POST["cb"]=="")||($_POST["cb"]==$abc["$index"]["cb"])):
	?>
<tr><td><?php echo $rank;?></td>
	<td><?php echo $abc[$index]["nm"];?></td>
	<td><?php echo $abc[$index]["k_01"];?></td>
	<td><?php echo $abc[$index]["k_02"];?></td>
	<td><?php echo $abc[$index]["k_03"];?></td>
	<td><?php echo $abc[$index]["k_04"];?></td>
	<td><?php echo $abc[$index]["k_05"];?></td>
	<td><?php echo $abc[$index]["total"];?></td></tr>
<?php $rank=$rank+1;endif;$index=$index+1;endwhile;?>