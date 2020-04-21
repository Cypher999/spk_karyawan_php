<?php
require_once 'control/main.php';
$mod_m=new custom_db();
$mod_m->setTableName("user");
$var_set=array(
"var"=>array("nm_user"),
"val"=>array($_POST["username"])
);
$mod_m->setidentifier($var_set["var"],$var_set["val"]);
$sql=$mod_m->search_data();
if(mysqli_num_rows($sql)>0){
	$isi=mysqli_fetch_assoc($sql);
	if($_POST["pass"]==$isi["password"]){
		$_SESSION["id_user_spk"]=$isi["id_user"];
		echo "<script>window.location.href='index.php';</script>";
	}
	else{
		echo "<script>alert('Password salah');window.location.href='index.php';</script>";	
	}
}
else{
	echo "<script>alert('Nama Tidak Ditemukan');window.location.href='index.php';</script>";	
}
?>