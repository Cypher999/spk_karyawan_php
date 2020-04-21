<?php
require_once 'control/main.php';
$user=new custom_db();
$user->setTableName("user");
$var_set=array(
"var"=>array("id_user"),
"val"=>array($_SESSION["id_user_spk"])
);
$user->setidentifier($var_set["var"],$var_set["val"]);
$sql_user=$user->search_data();
$isi_user=mysqli_fetch_assoc($sql_user);
$nama_user=$isi_user["nm_user"];

$class_call=array();
$sql_data=array();

$class_call[0]=new custom_db();
$class_call[0]->setTableName("karyawan");
$sql_data[0]=$class_call[0]->search_all("kd_karyawan");

$class_call[1]=new custom_db();
$class_call[1]->setTableName("kriteria");
$sql_data[1]=$class_call[1]->search_all("kd_kriteria");

$class_call[2]=new custom_db();
$class_call[2]->setTableName("penilaian");
$sql_data[2]=$class_call[2]->search_all("kd_karyawan");

$class_call[3]=new custom_db();
$class_call[3]->setTableName("cabang");
$sql_data[3]=$class_call[3]->search_all("kd_cabang");
?>
<h1>Welcome <?php echo $nama_user;?></h1>
<div class="col-md-8">
	<div class="card-deck">
		<div class="card bg-primary">
			<div class="card-body text-center">
				<h2 class="card-text">Data Karyawan</h2>
				<p class="card-text"><?php echo mysqli_num_rows($sql_data[0]);?></p>
				<button class="btn btn-warning" onclick="window.location.href='index.php?p=karyawan'">Lihat selengkapnya--></button>
			</div>
		</div>
		<div class="card bg-secondary">
			<div class="card-body text-center">
				<h2 class="card-text">Kriteria</h2>
				<p class="card-text"><?php echo mysqli_num_rows($sql_data[1]);?></p>
				<button class="btn btn-warning" onclick="window.location.href='index.php?p=kriteria'">Lihat selengkapnya--></button>
			</div>
		</div>
	</div><br>
	<div class="card-deck">
		<div class="card bg-danger">
			<div class="card-body text-center">
				<h2 class="card-text">Data Penilaian</h2>
				<p class="card-text"><?php echo mysqli_num_rows($sql_data[2]);?></p>
				<button class="btn btn-warning" onclick="window.location.href='index.php?p=penilaian'">Lihat selengkapnya--></button>
			</div>
		</div>
		<div class="card bg-info">
			<div class="card-body text-center">
				<h2 class="card-text">Data Cabang</h2>
				<p class="card-text"><?php echo mysqli_num_rows($sql_data[3]);?></p>
				<button class="btn btn-warning" onclick="window.location.href='index.php?p=cabang'">Lihat selengkapnya--></button>
			</div>
		</div>
	</div>
</div>