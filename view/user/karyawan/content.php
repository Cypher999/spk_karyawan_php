<?php
require_once "control/main.php";
$kar=new custom_db();
$kar->setTableName("karyawan");
$sql=$kar->search_all("kd_karyawan");
?>
<tr><th>Kode Karyawan</th><th>Nama Karyawan</th><th>Alamat</th><th>Cabang</th><th>Foto</th></tr>
<?php
if(mysqli_num_rows($sql)<=0):
?>
<tr><td colspan="5">Data Kosong</td></tr>
<?php else:
	while ($isi=mysqli_fetch_assoc($sql)):?>
<tr><td><?php echo $isi["kd_karyawan"];?></td>
	<td><?php echo $isi["nm_karyawan"];?></td>
	<td><?php echo $isi["alt"];?></td>
	<td><?php 
	$cbg=new custom_db();
	$cbg->setTableName("cabang");
	$id_set=array(
	"var"=>array("kd_cabang"),
	"val"=>array($isi["kd_cabang"])
	);
	$cbg->setidentifier($id_set["var"],$id_set["val"]);
	$sql_cbg=$cbg->search_data();
	$isi_cbg=mysqli_fetch_assoc($sql_cbg);
	echo $isi_cbg["nm_cabang"];?></td>
	<td><?php if($isi["shift"]==1){echo "Siang";}
	else if($isi["shift"]==0){echo "Malam";}?></td>
	
	<td>
		<?php
		$nm_file="image/".$isi["kd_karyawan"].".jpg";
		$cek_file=file_exists($nm_file);
		if(!$cek_file){
			$nm_file="image/empty.jpeg";
		}
		?>
		<img src="<?php echo $nm_file?>" width=150 height=150>
	</td>
	</tr>
<?php endwhile;endif;?>
